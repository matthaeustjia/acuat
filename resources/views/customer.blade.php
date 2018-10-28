@extends('layouts.table')
@section('currentpage', 'customer')

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
    @foreach($customers as $customer)
    <tr>
        <th>{{$customer->id}}</th>    
        <th>{{$customer->name}}</th>    
        <th>{{$customer->phone}}</th>    
        <th>{{$customer->email}}</th>    
        <th>
        <button type="button" class="btn-sm btn-warning" 
            data-customer-id="{{$customer->id}}" 
            data-customer-name="{{$customer->name}}" 
            data-customer-phone="{{$customer->phone}}"
            data-customer-email="{{$customer->email}}"
            data-toggle="modal" data-target="#customerEditModal" ><i class="far fa-edit fa-fw"></i>
        </button>
        <button type="button" class="btn-sm btn-danger"
            data-customer-name="{{$customer->name}}" 
            data-customer-id="{{$customer->id}}" 
            data-toggle="modal" data-target="#customerDeleteModal">
            <i class="far fa-trash-alt fa-fw"></i>
        </button>
        </th>
    </tr>
    @endforeach
@endsection

@section('pagination')
        {{$customers->links()}}
@endsection

@section('DeleteModalContent')
    <div class="modal-body">    
        <p>Are you sure you wanna delete?
            <input class="border-0" type="text" id="customerName" name="customerName" readonly> 
            <input class="border-0" type="text" id="customerId" name="customerId" hidden> 
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
