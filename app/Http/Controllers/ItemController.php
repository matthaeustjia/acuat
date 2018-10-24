<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
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
        $items = Item::paginate(10);
        if (!$items->isEmpty()) {
            return view('item', compact('items'));
        }
        return view('item', compact('items'))->withErrors('Data Tidak ditemukan');
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
           'id' => 'required|unique:items',
           'name'=> 'required'
        ]);

        $item = new Item;
        $item->id = request('id');
        $item->name = request('name');
        $item->description = request('description');
        $item->save();

        return redirect()->action('ItemController@index')->withSuccess($item->id.' Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //
        $value = $request->input('search');
        $items = Item::Search($value)->paginate(10)->appends(request()->except('page'));
        if (!$items->isEmpty()) {
            return view('item', compact('items'));
        }
        return view('item', compact('items'))->withErrors('Data Tidak ditemukan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
        $item->delete();
        return redirect()->action('ItemController@index')->withSuccess('Mendelete Item ' . $item->id . ' success');
    }
}
