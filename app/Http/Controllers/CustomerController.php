<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = Customer::paginate(10);
        return view('customer', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
           'name' => 'required',
           'phone' => 'required',
           'email' => 'required'
        ]);

        Customer::create([
            'name' => request('name'),
            'phone' => request('phone'),
            'email' => request('email')
        ]);

        return redirect()->action('CustomerController@index')->withSuccess($request->name.' Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
        $validate = $request->validate([
           'id' => 'required',
           'name' => 'required',
           'phone' => 'required',
           'email' => 'required'
        ]);
        
        $customer->name = request('name');
        $customer->phone = request('phone');
        $customer->email = request('email');
        $customer->save();

        return redirect()->action('CustomerController@index')->withSuccess($customer->name. ' Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
        $customer->delete();
        return redirect()->action('CustomerController@index')->withSuccess('Mendelete Customer ' .$customer->name. ' success');
    }

    public function search(Request $request)
    {
        $value = $request->input('search');
        $customers = Customer::search($value)->paginate(10)->appends(request()->except('page'));
        if (!$customers->isEmpty()) {
            return view('customer', compact('customers'));
        }

        return view('customer', compact('customers'))->withErrors('Data tidak ditemukan');
    }
}
