<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.js"
        integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
</head>

<body class="background-dash-student">

    @auth
    <div class="nav-side-menu">
        <div class="brand"> <a class="navbar-brand" href="http://www.fst.ac.ma/" target="_blank">
                <img class="img-responsive" src="{{ asset('img/fs_logo.png') }}" alt="faculté des sciences"
                    weight="60em" height="60em">
            </a>
        </div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">
                <li>
                    <a href=" {{ route('form.index') }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href=" {{ route('home') }}">
                        <i class="fas fa-tachometer-alt"></i> home
                    </a>
                </li>

                <li data-toggle="collapse" data-target="#form" class="collapsed active">
                    <a href="#"><i class="fas fa-align-justify fa-lg"></i> Form <span
                            class="fas fa-angle-down"></span></a>
                </li>
                <ul class="sub-menu collapse" id="form">

                    @if(DB::table('forms')->select('id') ->where('user_id', '=', Auth::user()->id)->exists() == null)
                    <li><a href="{{ route('form.create') }}">Create form</a></li>
                </ul>
                @else

                <li><a href="{{ route('form.show', ['form' => $form->id ]) }}">show form</a></li>
                <li><a href="{{ route('form.edit', ['form' => $form->id ]) }}">Edit/Delete form</a></li>

            </ul>
            <li data-toggle="collapse" data-target="#download" class="collapsed">
                <a href="{{ route('downloadPDF') }}"><i class="fas fa-cloud-download-alt"></i> Downoalod Form</a>
            </li>
            @endif

            <li data-toggle="collapse" data-target="#profile" class="collapsed">
                <a href="#"><i class="far fa-id-card"></i> Profile {{ Auth::user()->name }} <span
                        class=" fas fa-angle-down"></span></a>
            </li>

            <ul class="sub-menu collapse" id="profile">
                <li><a href="{{ route('studentPassword') }}">Change password</a></li>
            </ul>

            <li data-toggle="collapse" data-target="#logout" class="collapsed">

                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
        </div>
        </form>

        </li>
        </ul>
    </div>
    </div>
    {{-- content --}}
    <div class="page-content-wrapper">
        <div class="container">
            @yield('content')
        </div>
    </div>
    @include('sweetalert::alert')
    @endauth
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
