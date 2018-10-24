<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('currentpage')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
    <div id="app">
        <nav class="container sticky-top navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/home">ACUA</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('item') ? 'active' : '' }}" href="/item">Items</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('manufacturer') ? 'active' : '' }}" href="/manufacturer">Supplier</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('item') ? 'active' : '' }}" href="/item">Items</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('invoicemasuk') ? 'active' : '' }}" href="/invoicemasuk">Invoice Masuk</a>
                            </li>
                            
                        </ul>
                        <ul class="nav navbar-nav">
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
        </nav>
<br>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
