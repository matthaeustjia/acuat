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
        $itemmasuks = ItemMasuk::with('item')->where('invoiceMasuk_id', $id)->paginate(10);
        return view('itemmasuk', compact('itemmasuks'));
    }


    public function destroy(ItemMasuk $itemmasuk)
    {
        $itemmasuk->delete();
        return redirect()->back()->withSuccess('Mendelete Item Success');
    }

    public function store($id, Request $request)
    {
        $validate = $request->validate([
            'id' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ]);

        ItemMasuk::create([
            'invoiceMasuk_id' => $id,
            'item_id' => request('id'),
            'quantity' => request('quantity'),
            'price' => request('price')
        ]);

        return redirect()->action('ItemMasukController@show', $id)->withSuccess('Success Menambah Item');
    }
    // public function index()
    // {
    //     $itemmasuks = ItemMasuk::paginate(10);
    //     return view('itemmasuk', compact('itemmasuks'));
    // }
}
