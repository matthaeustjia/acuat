<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InvoiceKeluar;
use App\Customer;

class InvoiceKeluarController extends Controller
{
    public function index()
    {
        $customers = Customer::get();
        $invoicekeluars = InvoiceKeluar::with('customer')
        ->paginate(10);
        return view('invoicekeluar', compact('customers'), compact('invoicekeluars'));
    }
}
