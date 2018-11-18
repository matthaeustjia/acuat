@extends('layouts.table')
@section('currentpage', 'itemkeluar')

@section('tablehead')
    <tr>
        <div class="d-flex justify-content-between">
            @if(!$itemkeluars->isEmpty())
                <a href="/invoicekeluar/{{$itemkeluars[0]->invoicekeluar_id}}"><h5>Invoice ID - {{$itemkeluars[0]->invoicekeluar_id}}</h5></a>
            @endif
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
    @foreach($itemkeluars as $itemkeluar)
    <tr>
        <th>{{$itemkeluar->item->id}}</th>    
        <th>{{$itemkeluar->item->name}}</th>  
        <th>{{$itemkeluar->quantity}}</th>  
        <th>{{number_format($itemkeluar->price)}}</th>
        <th>{{number_format($itemkeluar->getTotal())}}</th>
        <th>
        <button type="button" class="btn-sm btn-danger"
            data-itemkeluar-id="{{$itemkeluar->id}}"
            data-toggle="modal" data-target="#itemkeluarDeleteModal">
            <i class="far fa-trash-alt fa-fw"></i>
        </button>
        </th>
    </tr>
    @endforeach
@endsection

@section('pagination')
        {{$itemkeluars->links()}}
@endsection

@section('DeleteModalContent')
    <div class="modal-body">    
        <p>Are you sure you wanna delete Item keluar?
            <input class="border-0" type="text" id="itemkeluarId" name="itemkeluarId" hidden> 
        </p>     
    </div>
@endsection

@section('AddModalContent')
    <div class="modal-body">    
        <div class="form-group">
            <label for="item-id-data">Item ID</label>
            <input type="text" id="item-id" class="form-control" placeholder="Search by ID or Name" autocomplete="off">
         </div>  
         <div class="form-group">
            <select class="form-control" name="item-id-data" id="item-id-data" style="display:none" required></select>
         </div>
        <div class="form-group">
            <label for="id">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>    
        </div>
        <div class="form-group">
            <label for="id">Harga</label>
            <input type="number" class="form-control" id="price" name="price" required>    
        </div>           
    </div>   
@endsection
