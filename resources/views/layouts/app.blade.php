<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('messages.Delicious Day') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{asset('https://fonts.bunny.net/css?family=Nunito')}}" rel="stylesheet">
    <script src="{{asset('https://kit.fontawesome.com/90d90398ad.js')}}" crossorigin="anonymous"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light" style="background: #EB8D00; height: 100px">
            <div class="container">
                <a class="navbar-brand">
                    {{ __('messages.Delicious Day') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    @can('adm', \App\Models\Dish::class)
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('adm.dishes.product')}}">Admin page</a>
                    </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('dishes.index')}}">{{ __('messages.Home') }}</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('messages.Category') }}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @isset($categories)
                                @foreach($categories as $cat)
                                    <li class="nav-item">
                                        <a class="dropdown-item" href="{{ route('dishes.category', $cat->id) }}">{{ $cat->{'name_'.app()->getLocale()} }}</a>
                                    </li>
                                @endforeach
                            @endisset
                        </ul>
                    </li>
                </ul>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('messages.Register') }}</a>
                                </li>
                            @endif
                        @else
                            <a class="nav-link" href = "{{route('cart.index')}}"> {{__('messages.Select')}}</a>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
{{--                                    <a class="dropdown-item" href = "{{route('pay.index')}}"><i class="fa-sharp fa-solid fa-wallet"></i> {{__('messages.cash')}}</a>--}}
                                    <a class="dropdown-item" href = "{{route('profile')}}"><i class="fa-solid fa-user"></i> {{__('messages.profile')}}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        {{ __('messages.Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa-solid fa-language"></i>
                                {{config('app.languages')[app()->getLocale()]}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @foreach(config('app.languages') as $ln => $lang)
                                <a class="dropdown-item" href=" {{route('switch.lang', $ln)}}">
                                    {{$lang}}
                                </a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @if($errors->any())
            <div style="width: 470px; margin-left: 20px"  class="alert alert-danger mt-3">
                <ul>
                    @foreach($errors ->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('message'))
            <div style="width: 470px; margin-left: 20px" class="alert alert-success mt-3" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <main class="py-4" style="min-height: 750px">
            @yield('content')
        </main>
        <div style="background: #EB8D00; width: 100%; height: 100px;">
            <h4 class="text-center" style="color: rgb(255,255,255); padding-top: 50px">All Rights Reserved@</h4>
        </div>
    </div>
</body>
</html>
