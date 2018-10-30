@extends('layouts.table')
@section('currentpage', 'invoicemasuk')

@section('tablehead')
    <tr>
        <th></th>
        <th>ID</th>
        <th>Nama Supplier</th>
        <th>Telepon</th>
        <th>Email</th>
        <th>Total</th>
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
        <th>
        <a href="/itemmasuk/{{$invoicemasuk->id}}"><i class="btn-sm btn-primary fa fa-list"></i></a>
        <button type="button" class="btn-sm btn-warning" 
            data-invoicemasuk-id="{{$invoicemasuk->id}}" 
            data-invoicemasuk-name="{{$invoicemasuk->name}}" 
            data-invoicemasuk-phone="{{$invoicemasuk->phone}}"
            data-invoicemasuk-email="{{$invoicemasuk->email}}"
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
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id" readonly>
        </div>  
        <div class="form-group">
            <label for="name">Nama Customer</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="id">Phone</label>
            <input type="number" class="form-control" id="phone" name="phone" required>    
        </div>
        <div class="form-group">
            <label for="id">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>    
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
