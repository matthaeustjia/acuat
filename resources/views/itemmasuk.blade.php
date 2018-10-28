@extends('layouts.table')
@section('currentpage', 'itemmasuk')

@section('tablehead')
    <tr>
        <div class="d-flex justify-content-between">
            <a href="/invoicemasuk/{{$itemmasuks[0]->invoiceMasuk_id}}"><h5>Invoice ID - {{$itemmasuks[0]->invoiceMasuk_id}}</h5></a>
        </div>
        <th>Item ID</th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
        <th></th>
    </tr>
@endsection

@section('tablebody')
    @foreach($itemmasuks as $itemmasuk)
    <tr>
        <th>{{$itemmasuk->item->id}}</th>    
        <th>{{$itemmasuk->item->name}}</th>  
        <th>{{$itemmasuk->quantity}}</th>  
        <th>{{number_format($itemmasuk->price)}}</th>
        <th>{{number_format($itemmasuk->price*$itemmasuk->quantity)}}</th>
        <th>
        <button type="button" class="btn-sm btn-warning" 
            data-toggle="modal" data-target="#itemmasukEditModal" ><i class="far fa-edit fa-fw"></i>
        </button>
        <button type="button" class="btn-sm btn-danger"
            data-toggle="modal" data-target="#itemmasukDeleteModal">
            <i class="far fa-trash-alt fa-fw"></i>
        </button>
        </th>
    </tr>
    @endforeach
@endsection

@section('pagination')
        {{$itemmasuks->links()}}
@endsection

@section('DeleteModalContent')
    <div class="modal-body">    
        <p>Are you sure you wanna delete?
            <input class="border-0" type="text" id="itemmasukName" name="itemmasukName" readonly> 
            <input class="border-0" type="text" id="itemmasukId" name="itemmasukId" hidden> 
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
            <label for="id">Nama Customer</label>
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
