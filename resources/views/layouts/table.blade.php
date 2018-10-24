@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>@yield('currentpage')</h4> 
            <form class="form-inline" method="GET" action="/@yield('currentpage')/search">
                <input id="search" name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            </form>
            <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#@yield('currentpage')AddModal"><i class="fas fa-plus"></i></button>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    <span class="badge badge-secondary">Info</span> {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <span class="badge badge-secondary">Info</span>
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            
            <table class="table table-sm table-bordered table-hover table-responsive-sm">
                <thead class="thead-light">
                    @yield('tablehead')
                </thead>
                <tbody>
                    @yield('tablebody')
                </tbody>
            </table>
        </div>
        <ul class="pagination d-flex justify-content-center">
            @yield('pagination')
        </ul>
    </div>
</div>
@endsection


@extends('layouts.modal')
