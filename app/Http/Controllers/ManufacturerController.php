<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $manufacturers = Manufacturer::paginate(10);
        return view('manufacturer', compact('manufacturers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);

        Manufacturer::create([
            'name' => request('name'),
            'phone' => request('phone'),
            'email' => request('email')
        ]);

        return redirect()->action('ManufacturerController@index')->withSuccess($request->name . ' Berhasil Ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer)
    {
        //
    }

    public function search(Request $request)
    {
        $value = $request->input('search');
        $manufacturers = Manufacturer::search($value)->paginate(10)->appends(request()->except('page'));
        if (!$manufacturers->isEmpty()) {
            return view('manufacturer', compact('manufacturers'));
        }
        return view('manufacturer', compact('manufacturers'))->withErrors('Data tidak ditemukan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manufacturer $manufacturer)
    {
        //
        $validate = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);
        $manufacturer->name = request('name');
        $manufacturer->phone = request('phone');
        $manufacturer->email = request('email');
        $manufacturer->save();

        return redirect()->action('ManufacturerController@index')->withSuccess($manufacturer->name .' Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacturer $manufacturer)
    {
        //
        $manufacturer->delete();
        return redirect()->action('ManufacturerController@index')->withSuccess('Mendelete Supplier ' . $manufacturer->name . ' success');
    }
}
