<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InvoiceKeluar;
use App\Customer;

class InvoiceKeluarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::get();
        $invoicekeluars = InvoiceKeluar::with('customer')
        ->paginate(10);
        return view('invoicekeluar', compact('customers'), compact('invoicekeluars'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'customer_id' => 'required'
        ]);

        InvoiceKeluar::create([
            'customer_id' => request('customer_id')
        ]);

        return redirect()->action('InvoiceKeluarController@index')->withSuccess('Sukses menambah invoice keluar');
    }

    public function destroy(InvoiceKeluar $invoicekeluar)
    {
        $invoicekeluar->delete();
        return redirect()->action('InvoiceKeluarController@index')->withSuccess('Sukses Mendelete Invoice Keluar');
    }
}
