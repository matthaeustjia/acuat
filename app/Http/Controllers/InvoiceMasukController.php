<?php

namespace App\Http\Controllers;

use App\InvoiceMasuk;
use Illuminate\Http\Request;
use App\Manufacturer;

class InvoiceMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        $manufacturers = Manufacturer::get();
        $invoicemasuks = InvoiceMasuk::with('manufacturer')->paginate(10);
        $totalprice = InvoiceMasuk::with('manufacturer')->paginate(10)->sum('price');
        return view('invoicemasuk', compact('manufacturers'), compact('invoicemasuks'), compact('totalprice'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'manufacturer_id' => 'required'
        ]);
    
        InvoiceMasuk::create([
            'manufacturer_id' => request('manufacturer_id')
        ]);

        return redirect()->action('InvoiceMasukController@index')->withSuccess('Sukses menambah invoice masuk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manufacturers = Manufacturer::get();
        $invoicemasuks = InvoiceMasuk::with('manufacturer')->where('id', $id)->paginate(10);
        return view('invoicemasuk', compact('manufacturers'), compact('invoicemasuks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoiceMasuk $invoicemasuk)
    {
        $validate = $request->validate([
            'manufacturer_id' => 'required'
       ]);

        $invoicemasuk->manufacturer_id = request('manufacturer_id');
        $invoicemasuk->save();
        return redirect()->action('InvoiceMasukController@index')->withSuccess('Sukses mengedit invoice masuk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceMasuk $invoicemasuk)
    {
        //
        $invoicemasuk->delete();
        return redirect()->action('InvoiceMasukController@index')->withSuccess('Sukses Mendelete Invoice');
    }
}
