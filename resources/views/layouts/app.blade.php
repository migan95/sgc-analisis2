<html>
<head>
    <title>App Name - @yield('title')</title>
</head>
<body>

@section('header')
    @if (\Illuminate\Support\Facades\Auth::check())
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @endif
@show

@section('sidebar')
    Menu
@show

<div class="container">
    @yield('content')
</div>
</body>
</html>
