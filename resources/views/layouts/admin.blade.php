<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MIBAGI') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('img/favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('img/favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('img/favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('img/favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('img/favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('img/favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('img/favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('img/favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('img/favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('img/favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#f1f1f1">
    <meta name="msapplication-TileImage" content="{{asset('img/favicon//ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#f1f1f1">

    {{-- THEME CSS--}}
    <link rel="stylesheet" href="{{ asset('css/theme/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme/slick.css') }}">
    
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('css/theme/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme/responsive.css') }}">
    {{-- END THEME CSS --}}

    {{-- THEME --}}
    <script src="{{ asset('js/theme/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('js/theme/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('js/theme/popper.min.js') }}"></script>
    <script src="{{ asset('js/theme/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/theme/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/theme/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/theme/slick.min.js') }}"></script>
    <script src="{{ asset('js/theme/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('js/theme/ajax-form.js') }}"></script>
    <script src="{{ asset('js/theme/wow.min.js') }}"></script>
    <script src="{{ asset('js/theme/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/theme/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/theme/jquery.appear.js') }}"></script>
    <script src="{{ asset('js/theme/jquery.knob.js') }}"></script>
    <script src="{{ asset('js/theme/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/theme/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/theme/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/theme/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/theme/plugins.js') }}"></script>
    <script src="{{ asset('js/theme/main.js') }}"></script>
    <script src="{{ asset('js/marketplace.js') }}"></script>
    {{-- END THEME --}}

    @stack('head')

    <link rel="stylesheet" href="{{ asset('css/marketplace.css') }}">
    <link rel="stylesheet" href="{{ asset('css/store/store.css') }}">
</head>
<body>
    @if (Request::is('/'))
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
            </div>
            <div class="loader">
                <div class="row">
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div id="app">
        
        @if (Request::is('/') || Request::is('store/start'))
        <div class="height-60"></div>
        @endif
        @if (Request::is('/') || Request::is('store/start'))
        <header class="header-transparent">     
        @else
        <header>     
        @endif
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
            
            <div class="logo mr-3">
                <a class="brand-container" href="{{ url('/home') }}">
                    <img src="{{ asset('img/Mibagi-brand-bg-dark.png') }}" class="brand" /> <span class="badge bg-navi text-white">Administración</span>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse justify-content-right " id="navbarColor01">
              
                
                <div class="header-top-right ml-auto">

                    
                    @guest

                    @else
                    <div class="account-menu  d-inline-block">
                        <span class="span">
                            {{ Auth::user()->name }}
                        </span>
                        <a title="Cerrar sesión" class="nav-bar-link btn btn-sm btn-outline-light ml-2" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <i class="fal fa-sign-out"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    @endguest
                    
                </div>
            </div>
          </nav>
            
            
            
        </header>


        

        <main class="main-container bg-light">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-menu col-md-2 p-0">
                        {{-- MAIN MENU --}}
                        <div class="list-group bg-primary store-list-group" style="background-color: #011640">
                            <a href="{{ route('home') }}" class="{{ Route::is('home') ? 'active':'' }} list-group-item list-group-item-action bg-transparent">
                                <i class="fad fa-tachometer-alt-fast"></i> Dashboard
                            </a>
                            <a href="{{ route('admin.stores.requests') }}" class="{{ Route::is('admin.stores.requests') ? 'active':'' }} list-group-item list-group-item-action bg-transparent">
                                <i class="fad fa-box-full"></i> Solicitudes de negocios
                            </a>
                            <a href="{{ route('admin.stores') }}" class="{{ Route::is('admin.stores') ? 'active':'' }} list-group-item list-group-item-action bg-transparent">
                                <i class="fad fa-box-full"></i> Negocios
                            </a>
                            <a href="{{ route('admin.stores.products.requests') }}" class="{{ Route::is('admin.stores.products.requests*') ? 'active':'' }} list-group-item list-group-item-action bg-transparent">
                                <i class="fad fa-box-full"></i> Aprobaciones Productos
                            </a>
                            
                            
                        </div>
                    </div>
                    <div class="col-12 col-right-main-container col-md-10">
                        @if ( session('alert-success') || session('alert-danger') || session('alert-warning') )
                            <div class="container alert-container mt-3">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="alert {{ App\Main::alertClass() }} d-flex">
                    
                                            <div class="alert-icon mr-1"><i class="fal {{ App\Main::alertIcon() }}"></i></span></div>
                    
                                            <div class="alert-text">{{ App\Main::alertMessage()  }}</div>
                                            <div class="alert-dismiss float-right"><a href="javascript:void(0)" data-dismiss="alert" class=""><i class="fad fa-times-square"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @yield('content')
                        <footer class="bottom-fixed">
                            <div class="footer-area p-2">
                                <div class="footer-wrapper">
                                    <div class="row justify-content-end">
                                        <div class="col-4 text-right">
                                            <small>Mibagi - Todos los derechos reservados  2020.</small>
                                        </div>
                                    </div>
                                  </div>
                               </div>  
                          </footer>
                    </div>
                </div>
            </div>
            
            
            
        </main>
    </div>

    
</body>



</html>
