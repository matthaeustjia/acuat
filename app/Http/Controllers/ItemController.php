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
        $items = Item::with('itemmasuks')->paginate(10);
        return view('item', compact('items'));
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
            'name'=> 'required',
            'description' => 'required'
        ]);

        Item::create([
            'id' => request('id'),
            'name' => request('name'),
            'description' => request('description')
        ]);

        return redirect()->action('ItemController@index')->withSuccess($request->id.' Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */

    public function searchApi(Request $request)
    {
        $value = $request->input('search');
        $items = Item::Search($value)->get();
        return response()->json($items);
    }

    
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
        $validate = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);
        
        $item->name = request('name');
        $item->description = request('description');
        $item->save();

        return redirect()->action('ItemController@index')->withSuccess($item->id . ' Berhasil diedit');
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
