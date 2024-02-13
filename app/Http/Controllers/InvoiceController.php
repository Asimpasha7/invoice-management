<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use League\Csv\Writer;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Carbon;

// use App\Http\Controllers\InvoiceController;


class InvoiceController extends Controller
{

    
    public function index()
    {

        
        $invoices = Invoice::all();
        return view('homepage', compact('invoices'));
    }

    public function create()
    {

        // dd('create');
        return view('invoice.add');

    }

    public function store(Request $request)
    {

        // Invoice::create($request->all());

        $validatedData  = $request->validate([
            'description' => 'required|string',
            'address' => 'required|string',
            'payment_status' => 'required|string',
            'payment_date' => 'nullable|date',
            'item_description.*' => 'required|string',
            'item_quantity.*' => 'required|integer',
            'item_amount.*' => 'required|numeric',
        ]);

        // dd('storrrrrrrrrrrrrrrre');
        $invoice = new Invoice();
        $invoice->user_id = Auth::id(); 
        $invoice->description = $validatedData['description'];
        $invoice->address = $validatedData['address'];
        $invoice->payment_status = $validatedData['payment_status'];
        $invoice->payment_date = $validatedData['payment_date'];
        $invoice->save();

  
        $items = [];
        foreach ($validatedData['item_description'] as $key => $description) {
            $items[] = new InvoiceItem([
                'description' => $description,
                'quantity' => $validatedData['item_quantity'][$key],
                'amount' => $validatedData['item_amount'][$key],
            ]);
        }
        $invoice->items()->saveMany($items);

        $invoices = Invoice::all();

        // return Redirect::route('homepage')->with('success', 'Invoice created successfully.');

        return Redirect::route('homepage')->with([
            'success' => 'Invoice created successfully.',
            'invoices' => $invoices
        ]);

        // return view('homepage')->with('invoices', $invoices);


    }

    public function edit($id)
    {
    
        $invoice = Invoice::findOrFail($id);
        $invoices = Invoice::all();

        
        // return view('invoice.add');
        return view('invoice.edit', compact('invoice', 'invoices'));
    }

    public function update(Request $request, $id)
    {

        // dd('welcome');
        $validatedData = $request->validate([
            'description' => 'required|string',
            'address' => 'required|string',
            'payment_status' => 'required|string',
            'payment_date' => 'nullable|date',
            'item_description.*' => 'required|string',
            'item_quantity.*' => 'required|integer',
            'item_amount.*' => 'required|numeric',
        ]);

 
        $invoice = Invoice::findOrFail($id);
     
        $invoice->description = $validatedData['description'];
        $invoice->address = $validatedData['address'];
        $invoice->payment_status = $validatedData['payment_status'];
        $invoice->payment_date = $validatedData['payment_date'];
        $invoice->save();

        // dd('here',$validatedData['item_description']);

        try {
            foreach ($invoice->items as $item) {
                $key = $item->id;
                if (isset($validatedData['item_description'][$key]) &&
                    isset($validatedData['item_quantity'][$key]) &&
                    isset($validatedData['item_amount'][$key])) {
                    $description = $validatedData['item_description'][$key];
                    // Update the item details
                    $item->description = $description;
                    $item->quantity = $validatedData['item_quantity'][$key];
                    $item->amount = $validatedData['item_amount'][$key];
                    $item->save();
                } else {
                   
                    info("Data for item with key $key not found in validated data array.");
                }
            }
        } catch (\Exception $e) {
            // Log the exception or handle it gracefully
            dd('Error occurred while updating invoice items: ' . $e->getMessage());
        }
        
        $invoices = Invoice::all();
        // dd($invoices);

        return Redirect::route('homepage')->with(['success', 'Invoice updated successfully.','invoices' => $invoices]);

        // return Redirect::route('homepage')->with(['success' => 'Invoice updated successfully.', 'invoices' => $invoices]);

    }

    public function destroy($id)
    {
       

        // dd('del');
        $invoice = Invoice::findOrFail($id);

        $invoice->delete();
        $invoices = Invoice::all();

        // dd($invoices);

        return redirect()->route('homepage')->with([
            'success' => 'Invoice deleted successfully.',
            'invoices' => $invoices
        ]);
    }


    public function exportInvoices()
    {
      
        $invoices = Invoice::all();

        // preadsheet object
        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID')
            ->setCellValue('B1', 'Description')
            ->setCellValue('C1', 'Address')
            ->setCellValue('D1', 'Payment Status')
            ->setCellValue('E1', 'Payment Date');


        $row = 2;
        foreach ($invoices as $invoice) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $row, $invoice->id)
                ->setCellValue('B' . $row, $invoice->description)
                ->setCellValue('C' . $row, $invoice->address)
                ->setCellValue('D' . $row, $invoice->payment_status)
                ->setCellValue('E' . $row, $invoice->payment_date);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="invoices.xlsx"');
        header('Cache-Control: max-age=0');

     
        $writer->save('php://output');
    }

    public function downloadReports($id)
    {
    
        $invoice = Invoice::findOrFail($id);
        $payment_date = Carbon::createFromFormat('Y-m-d', $invoice->payment_date);
       
        $data = [
            'invoice' => $invoice,
            'payment_date' => $payment_date
        ];

    
        $htmlContent = view('reports.invoice_report', $data)->render();

  
        $headers = [
            'Content-Type' => 'text/html',
            'Content-Disposition' => 'attachment; filename="invoice_' . $id . '.html"',
        ];

       
        return response()->make($htmlContent, 200, $headers);
    }


  
}
