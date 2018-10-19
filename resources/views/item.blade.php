@extends('layouts.table')
@section('currentpage', 'Item')

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
            <button type="button" class="btn-sm btn-warning"><i class="far fa-edit"></i></button>
            <button type="button" class="btn-sm btn-danger" data-item-id="{{$item->id}}" data-toggle="modal" data-target="#ItemDeleteModal"><i class="far fa-trash-alt"></i></button>
        </th>
    </tr>
    @endforeach
@endsection

@section('pagination')
        {{$items->links()}}
@endsection

@section('DeleteModalContent')
        <form id="deleteForm" action="/item/" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-body">    
                <p>Are you sure you wanna delete?
                <input class="border-0" type="text" id="itemId" name="itemId" readonly> 
                </p>     
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>      
@endsection

@section('AddModalContent')
        <form action="/item" method="POST">
            @csrf
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
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </div>
        </form>      
@endsection
