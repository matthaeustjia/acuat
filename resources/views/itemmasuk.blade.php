@extends('layouts.table')
@section('currentpage', 'itemmasuk')

@section('tablehead')
    <tr>
        <div class="d-flex justify-content-between">
            @if(!$itemmasuks->isEmpty())
                <a href="/invoicemasuk/{{$itemmasuks[0]->invoiceMasuk_id}}"><h5>Invoice ID - {{$itemmasuks[0]->invoiceMasuk_id}}</h5></a>
            @endif
        </div>
        <th>ID</th>
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
        <th>{{$itemmasuk->id}}</th>
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
            data-itemmasuk-id="{{$itemmasuk->id}}"
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
            <input class="border-0" type="text" id="itemmasukId" name="itemmasukId" readonly> 
        </p>     
    </div>
@endsection

@section('EditModalContent')
    <div class="modal-body">  
        <div class="form-group">
            <label for="id">Item ID</label>
            <input type="text" class="form-control" id="id" name="id" readonly>
        </div>  
        <div class="form-group">
            <label for="name">Nama Item</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="id">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>    
        </div>
        <div class="form-group">
            <label for="id">Harga</label>
            <input type="number" class="form-control" id="price" name="price" required>    
        </div>           
    </div>  
@endsection

@section('AddModalContent')
    <div class="modal-body">    
        <div class="form-group">
            <label for="id">Item ID</label>
            <input type="text" class="form-control" id="id" name="id" required>
        </div>  
        <div class="form-group">
            <label for="name">Nama Item</label>
            <input type="text" class="form-control" id="name" name="name" readonly>
        </div>
        <div class="form-group">
            <label for="id">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>    
        </div>
        <div class="form-group">
            <label for="id">Harga</label>
            <input type="number" class="form-control" id="price" name="price" required>    
        </div>           
    </div>   
@endsection
