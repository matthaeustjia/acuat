<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemMasuk;

class ItemMasukController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($invoicemasuk)
    {
        $itemmasuks = ItemMasuk::where('invoiceMasuk_id', $invoicemasuk)->paginate(10);
        return view('itemmasuk', compact('itemmasuks'));
    }
    public function index()
    {
        $itemmasuks = ItemMasuk::with('invoicemasuk', 'item')->paginate(10);
        return view('itemmasuk', compact('itemmasuks'));
    }
}
