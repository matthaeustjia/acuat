<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemKeluar;

class ItemKeluarController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $itemkeluars = ItemKeluar::with('item')->where('invoiceKeluar_id', $id)->paginate(10);
        return view('itemkeluar', compact('itemkeluars'));
    }

    public function store($id, Request $request)
    {
        $validate = $request->validate([
            'item-id-data' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ]);

        ItemKeluar::create([
            'invoiceKeluar_id' => $id,
            'item_id' => request('item-id-data'),
            'quantity' => request('quantity'),
            'price' => request('price')
        ]);

        return redirect()->action('ItemKeluarController@show', $id)->withSuccess('Sukses Menambah Item');
    }

    public function destroy(ItemKeluar $itemkeluar)
    {
        $itemkeluar->delete();
        return redirect()->back()->withSuccess('Mendelete Item Success');
    }
}
