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

    public function show($id)
    {
        $itemmasuks = ItemMasuk::where('invoiceMasuk_id', $id)->paginate(10);
        return view('itemmasuk', compact('itemmasuks'));
    }
    // public function index()
    // {
    //     $itemmasuks = ItemMasuk::paginate(10);
    //     return view('itemmasuk', compact('itemmasuks'));
    // }
}
