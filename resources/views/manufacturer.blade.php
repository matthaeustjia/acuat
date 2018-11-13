@extends('layouts.table')
@section('currentpage', 'manufacturer')

@section('tablehead')
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Phone</th>
        <th>Email</th>
        <th></th>
    </tr>
@endsection

@section('tablebody')
    @foreach($manufacturers as $manufacturer)
    <tr>
        <th>{{$manufacturer->id}}</th>    
        <th>{{$manufacturer->name}}</th>    
        <th>{{$manufacturer->phone}}</th>    
        <th>{{$manufacturer->email}}</th>    
        <th>
        <a href="/invoicemasuk/manufacturer?manufacturer={{$manufacturer->id}}"><i class="btn-sm btn-primary fa fa-list"></i></a>
        <button type="button" class="btn-sm btn-warning" 
            data-manufacturer-name="{{$manufacturer->name}}" 
            data-manufacturer-id="{{$manufacturer->id}}" 
            data-manufacturer-phone="{{$manufacturer->phone}}"
            data-manufacturer-email="{{$manufacturer->email}}"
            data-toggle="modal" data-target="#manufacturerEditModal" ><i class="far fa-edit fa-fw"></i>
        </button>
        <button type="button" class="btn-sm btn-danger" data-manufacturer-name="{{$manufacturer->name}}" data-manufacturer-id="{{$manufacturer->id}}" data-toggle="modal" data-target="#manufacturerDeleteModal"><i class="far fa-trash-alt fa-fw"></i></button>
        </th>
    </tr>
    @endforeach
@endsection

@section('pagination')
        {{$manufacturers->links()}}
@endsection

@section('DeleteModalContent')
    <div class="modal-body">    
        <p>Are you sure you wanna delete?
            <input class="border-0" type="text" id="manufacturerName" name="manufacturerName" readonly> 
            <input class="border-0" type="text" id="manufacturerId" name="manufacturerId" hidden> 
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
            <label for="name">Nama Supplier</label>
            <input type="text" class="form-control" id="name" name="name" required>    
        </div>
        <div class="form-group">
            <label for="id">Telepon Supplier</label>
            <input type="number" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="id">Email Supplier</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>     
    </div>  
@endsection

@section('AddModalContent')
    <div class="modal-body">    
        <div class="form-group">
            <label for="id">Nama Supplier</label>
            <input type="text" class="form-control" id="name" name="name" required>    
        </div>
        <div class="form-group">
            <label for="id">Telepon Supplier</label>
            <input type="number" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="id">Email Supplier</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>      
    </div>   
@endsection
