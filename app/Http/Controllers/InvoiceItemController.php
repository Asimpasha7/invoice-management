<?php

namespace App\Http\Controllers;

use App\Models\InvoiceItem;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller
{
    
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'quantity' => 'required|integer|min:1',
            'amount' => 'required|numeric|min:0',
            'invoice_id' => 'required|exists:invoices,id',
        ]);

        InvoiceItem::create($request->all());

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice item added successfully.');
    }

   
}
