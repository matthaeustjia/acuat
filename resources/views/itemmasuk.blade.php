@extends('layouts.table')
@section('currentpage', 'itemmasuk')

@section('tablehead')
    <tr>
        <div class="d-flex justify-content-between">
            @if(!$itemmasuks->isEmpty())
                <a href="/invoicemasuk/{{$itemmasuks[0]->invoiceMasuk_id}}"><h5>Invoice ID - {{$itemmasuks[0]->invoiceMasuk_id}}</h5></a>
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
    @foreach($itemmasuks as $itemmasuk)
    <tr>
        <th>{{$itemmasuk->item->id}}</th>    
        <th>{{$itemmasuk->item->name}}</th>  
        <th>{{$itemmasuk->quantity}}</th>  
        <th>{{number_format($itemmasuk->price)}}</th>
        <th>{{number_format($itemmasuk->getTotal())}}</th>
        <th>
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
        <p>Are you sure you wanna delete Item masuk?
            <input class="border-0" type="text" id="itemmasukId" name="itemmasukId" hidden> 
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
            <select class="form-control" name="item-id-data" id="item-id-data" style="display:none"></select>
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
