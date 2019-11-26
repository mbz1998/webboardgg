<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Webboard GG')) - Webboard GG.</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

     <!-- Scripts -->
     <script>
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check()
        ]) !!};
    </script>
        <style>
        body {
            background-image: url(@yield('bg',"img/bg.jpg"));
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark border-3">
            <div class="container">
                <nav class="navbar navbar"><a class="navbar-brand" href="#">
                        <font color="#CC99CC">Webboard GG</font>
                    </a>
                </nav>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/threads">
                                <font color="#EEEEEE"> กระทู้ทั้งหมด </font>
                            </a>
                        </li>
                        @guest
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="/threads?by={{auth()->user()->id}}">
                                <font color="#EEEEEE"> กระทู้ของฉัน </font>
                            </a>
                        </li>
                        @endguest
                        <div class="card-body">
                        <form method="GET" action="/threads">
                            {{ csrf_field() }}
                            </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->



                        <!-- Authentication Links -->
                        @guest
                        <ul class="navbar-nav ml-auto">
                        <li><a class="nav-link" href="{{ route('login') }}">
                        <!DOCTYPE html>
                        <html lang="{{ app()->getLocale() }}">
                        </html><font color="#EEEEEE">เข้าสู่ระบบ</font></a></li>
                        <li><a class="nav-link" href="{{ route('register') }}"><font color="#EEEEEE">สมัครสมาชิก</font></a></li>
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <font color="#EEEEEE">{{ Auth::user()->name }} </font><span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!--a class="dropdown-item" href="/threads?by={{ auth()->user()->id }}">กระทู้ของฉัน</a-->
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    ออกจากระบบ
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                        @endguest
                        <div class="form-group">
                                <select name="channel_id" id="channel_id" class="form-control" required>
                                    <option value="">เลือกหมวดหมู่</option>
                                    <option value="1"> อาหาร
                                        </option>
                                        <option value="2"> เครื่องดื่ม
                                        </option>
                                        <option value="3"> ท่องเที่ยว
                                        </option>
                                    @foreach ($channels as $channel)
                                        <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                                            {{ $channel->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">เลือก</button>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <flash message="{{ session('flash') }}"></flash>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>