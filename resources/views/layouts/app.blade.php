<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PV80') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header class="app-header">
            <div class="container">
                <a class="app-header__logo" href="{{ url('/') }}"></a>

                <!-- Authentication Links -->
                @guest
                    <!-- <div class="app-header__usr">
                        <a class="btn btn--primary btn--sm" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </div>   -->
                @else

                    <div class="app-header__usr">
                        <div class="usr-name">Hello {{ Auth::user()->name }}</div>

                        <a class="btn btn--primary btn--sm" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Log out') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>


                @endguest

            </div>
        </header>

        <main class="py-4">
            @if (session('status'))
                <div class="alert alert-success">
                {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-error">
                {{ session('error') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
