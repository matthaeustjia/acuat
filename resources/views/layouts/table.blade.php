@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>@yield('currentpage')</h4> 
            <button type="button" class="btn btn-primary">Add</button>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Stock</th>
                        <th>List</th>
                        <th>List</th>
                        <th>List</th>
                        <th>List</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1000</th>
                        <th>Coca Cola</th>
                        <th>10</th>
                        <th>BLA BLA</th>
                        <th>BLA BLA</th>
                        <th>BLA BLA</th>
                        <th>BLA BLA</th>
                    </tr>
                    <tr>
                        <th>1000</th>
                        <th>Coca Cola</th>
                        <th>10</th>
                        <th>BLA BLA</th>
                        <th>BLA BLA</th>
                        <th>BLA BLA</th>
                        <th>BLA BLA</th>                    </tr>
                    <tr>
                        <th>1000</th>
                        <th>Coca Cola</th>
                        <th>10</th>
                        <th>BLA BLA</th>
                        <th>BLA BLA</th>
                        <th>BLA BLA</th>
                        <th>BLA BLA</th>                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
