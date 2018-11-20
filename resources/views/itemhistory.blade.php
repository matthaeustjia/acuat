@extends('layouts.table')
@section('currentpage', 'item')

@section('tablehead')
    <tr>
        <h5>Item ID : {{$item_id}}</h5>
        <th>Date</th>
        <th>Invoice</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>
@endsection

@section('tablebody')
    @foreach($items as $item)
    @if($item->tablename==1)
        <tr>
        <th>{{$item->created_at}}</th> 
        <th><a href="/itemmasuk/{{$item->invoiceid}}">{{$item->invoiceid}}</a></th>
        <th><i class="btn-success fa fa-arrow-up"></i>  {{$item->quantity}}</th>    
        <th>{{number_format($item->price)}}</th>    
        </tr>
    @else
        <tr>
        <th>{{$item->created_at}}</th> 
        <th><a href="/itemkeluar/{{$item->invoiceid}}">{{$item->invoiceid}}</a></th>
        <th><i class="btn-danger fa fa-arrow-down"></i> {{$item->quantity}}</th>    
        <th>{{number_format($item->price)}}</th>   
        </tr>
    @endif
    @endforeach
@endsection
