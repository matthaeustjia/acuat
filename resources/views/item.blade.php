@extends('layouts.table')
@section('currentpage', 'item')

@section('tablehead')
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Stock</th>
        <th></th>
    </tr>
@endsection

@section('tablebody')
    @foreach($items as $item)
    <tr>
        <th>{{$item->id}}</th>    
        <th>{{$item->name}}</th>    
        <th>{{$item->description}}</th>    
        <th>{{$item->created_at}}</th>    
        <th>
        <button type="button" class="btn-sm btn-warning" 
        data-item-name="{{$item->name}}" data-item-id="{{$item->id}}" data-item-description="{{$item->description}}"
        data-toggle="modal" data-target="#ItemEditModal" ><i class="far fa-edit"></i></button>
            <button type="button" class="btn-sm btn-danger" data-item-id="{{$item->id}}" data-toggle="modal" data-target="#ItemDeleteModal"><i class="far fa-trash-alt"></i></button>
        </th>
    </tr>
    @endforeach
@endsection

@section('pagination')
        {{$items->links()}}
@endsection

@section('DeleteModalContent')
    <div class="modal-body">    
        <p>Are you sure you wanna delete?
        <input class="border-0" type="text" id="itemId" name="itemId" readonly> 
        </p>     
    </div>
@endsection

@section('EditModalContent')
    <div class="modal-body">    
        <div class="form-group">
            <label for="id">ID Produk</label>
            <input type="text" class="form-control" id="id" name="id" readonly>    
        </div>
        <div class="form-group">
            <label for="id">Nama Produk</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="id">Deskripsi</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>      
    </div>  
@endsection

@section('AddModalContent')
    <div class="modal-body">    
        <div class="form-group">
            <label for="id">ID Produk</label>
            <input type="text" class="form-control" id="id" name="id" required>    
        </div>
        <div class="form-group">
            <label for="id">Nama Produk</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="id">Deskripsi</label>
            <textarea class="form-control"id="description" name="description"></textarea>
        </div>      
    </div>   
@endsection
