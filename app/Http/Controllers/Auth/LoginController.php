<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Invoice;

class LoginController extends Controller
{
    /**
     * Display the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   // Ensure that the correct namespace is imported

   public function login(Request $request)
   {
  
       $credentials = $request->validate([
           'email' => 'required|email',
           'password' => 'required',
       ]);
   
       if (Auth::attempt($credentials)) {

           $request->session()->regenerate();
           $invoices = Invoice::all();
   
           if (!$invoices->isEmpty()) {
          
               $request->session()->put('invoices', $invoices);
           } else {
          
               dd("No invoices found in the database.");
           }
   
           return redirect()->intended('/homepage');
       }
   
       return back()->withErrors([
           'email' => 'The provided credentials do not match our records.',
       ]);
   }
   

}
