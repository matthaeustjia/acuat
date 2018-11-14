@extends('layouts.table')
@section('currentpage', 'invoicemasuk')

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
    @foreach($invoicemasuks as $invoicemasuk)
    <tr>
        <th>{{$invoicemasuk->id}}</th>    
        <th>{{$invoicemasuk->manufacturer->name}}</th>    
        <th>{{$invoicemasuk->manufacturer->phone}}</th>    
        <th>{{$invoicemasuk->manufacturer->email}}</th>
        <th>{{number_format($invoicemasuk->getInvoiceTotal())}}</th>
        <th>{{$invoicemasuk->created_at->format('d/m/Y')}}</th>
        <th>
        <a href="/itemmasuk/{{$invoicemasuk->id}}"><i class="btn-sm btn-primary fa fa-list"></i></a>
        <button type="button" class="btn-sm btn-warning" 
            data-invoicemasuk-id="{{$invoicemasuk->id}}" 
            data-toggle="modal" data-target="#invoicemasukEditModal" ><i class="far fa-edit fa-fw"></i>
        </button>
        <button type="button" class="btn-sm btn-danger"
            data-invoicemasuk-id="{{$invoicemasuk->id}}" 
            data-toggle="modal" data-target="#invoicemasukDeleteModal">
            <i class="far fa-trash-alt fa-fw"></i>
        </button>
        </th>
    </tr>
    @endforeach
@endsection

@section('pagination')
        {{$invoicemasuks->links()}}
@endsection

@section('DeleteModalContent')
    <div class="modal-body">    
        <p>Are you sure you wanna delete?
            <input class="border-0" type="text" id="invoicemasukId" name="invoicemasukId" readonly> 
        </p>     
    </div>
@endsection

@section('EditModalContent')
    <div class="modal-body">  
        <div class="form-group">
            <label for="manufacturer_id">Supplier</label>
            <select class="form-control" name="manufacturer_id" id="manufacturer_id">
                @foreach($manufacturers as $manufacturer)
                <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                @endforeach  
            </select>    
        </div>
    </div>  
@endsection

@section('AddModalContent')
    <div class="modal-body">    
        <div class="form-group">
            <label for="manufacturer_id">Supplier</label>
            <select class="form-control" name="manufacturer_id" id="manufacturer_id">
                @foreach($manufacturers as $manufacturer)
                <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                @endforeach  
            </select>    
        </div>
    </div>   
@endsection
