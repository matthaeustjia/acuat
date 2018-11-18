@extends('layouts.table')
@section('currentpage', 'invoicekeluar')

@section('tablehead')
    <tr>
        <th>ID</th>
        <th>Nama Supplier</th>
        <th>Telepon</th>
        <th>Email</th>
        <th>Total</th>
        <th>Date</th>
        <th></th>
    </tr>
@endsection

@section('tablebody')
    @foreach($invoicekeluars as $invoicekeluar)
    <tr>
        <th>{{$invoicekeluar->id}}</th>    
        <th>{{$invoicekeluar->customer->name}}</th>    
        <th>{{$invoicekeluar->customer->phone}}</th>    
        <th>{{$invoicekeluar->customer->email}}</th>
        <th>{{number_format($invoicekeluar->getInvoiceTotal())}}</th>
        <th>{{$invoicekeluar->created_at->format('d/m/Y')}}</th>
        <th>
        <a href="/itemkeluar/{{$invoicekeluar->id}}"><i class="btn-sm btn-primary fa fa-list"></i></a>
        <button type="button" class="btn-sm btn-warning" 
            data-invoicekeluar-id="{{$invoicekeluar->id}}" 
            data-toggle="modal" data-target="#invoicekeluarEditModal" ><i class="far fa-edit fa-fw"></i>
        </button>
        <button type="button" class="btn-sm btn-danger"
            data-invoicekeluar-id="{{$invoicekeluar->id}}" 
            data-toggle="modal" data-target="#invoicekeluarDeleteModal">
            <i class="far fa-trash-alt fa-fw"></i>
        </button> 
        </th>
    </tr>
    @endforeach
@endsection

@section('pagination')
        {{$invoicekeluars->links()}}
@endsection

@section('DeleteModalContent')
    <div class="modal-body">    
        <p>Are you sure you wanna delete? Invoice No: 
            <input class="border-0" type="text" id="invoicekeluarId" name="invoicekeluarId" readonly> 
        </p>     
    </div>
@endsection

@section('EditModalContent')
    <div class="modal-body">  
        <div class="form-group">
            <label for="customer_id">Supplier</label>
            <select class="form-control" name="customer_id" id="customer_id">
                @foreach($customers as $customer)
                <option value="{{$customer->id}}">{{$customer->name}}</option>
                @endforeach  
            </select>    
        </div>
    </div>  
@endsection

@section('AddModalContent')
    <div class="modal-body">    
        <div class="form-group">
            <label for="customer_id">Supplier</label>
            <select class="form-control" name="customer_id" id="customer_id">
                @foreach($customers as $customer)
                <option value="{{$customer->id}}">{{$customer->name}}</option>
                @endforeach  
            </select>    
        </div>
    </div>   
@endsection
