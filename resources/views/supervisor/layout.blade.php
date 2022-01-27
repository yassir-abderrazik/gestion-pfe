<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
</head>

<body>

    @auth
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="http://www.fst.ac.ma/" target="_blank"><img class="img-responsive"
                src="{{ asset('img/fs_logo.png') }}" alt="faculté des sciences" weight="30em" height="40em"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('supervisor.index') }}">Dashboard</a>
                </li>
                @if(DB::table('supervisors')->select('id')->where('user_id', '=', Auth::user()->id)->exists() == null)
                <li class="nav-item active">
                    <a class="nav-link text-warning" href="{{ route('supervisor.create') }}">Complete your informations
                    </a>
                </li>
                @else
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Defense Management
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('defense.index')}}">All Request Defenses</a>
                        <a class="dropdown-item"  href="{{ route('allAccepted') }}">Accepted Defenses</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item"href="{{ route('showRefusedDefences') }}">Refused Request</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('supervisor.show', [ 'supervisor' => $supervisor->id]) }}">your
                        informations</a>
                </li>
                @endif
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->email}} Profil
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{route('change.password')}}">Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>




            </ul>
        </div>
    </nav>

    {{-- content --}}
    <br>
    <div class="container-fluid">
        @yield('content')
    </div>

    @include('sweetalert::alert')
    @endauth

    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.js"
        integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script> --}}

</body>

</html>