<!doctype html>
<?php
$user = Auth::user();
if($user):
    $lang = Auth::user()->hasField('lang');
    if(!$lang):
        App::setLocale('es');
    else:
        $lang_tag = $lang->value;
        App::setLocale($lang_tag);
    endif;
else:
    App::setLocale('es');
endif;
?>
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
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
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
</head>
<body>
<div class="custom-overlay"></div>
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
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark primary-bg">
            <a class="menu-bar-left d-block d-md-none d-lg-block">
                <span class="bar1"></span>
                <span class="bar2"></span>
                <span class="bar3"></span>
            </a>
            <div class="logo mr-3">
                <a class="brand-container" href="{{ url('/') }}">
                    <img src="{{ asset('img/Mibagi-brand-bg-dark.png') }}" class="brand" />
                </a>
            </div>
            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button> --}}
        
            <div class="navbar-collapse" id="navbarColor01">
              
                <div class="main-search d-xs-none d-sm-block mr-auto">
                    
                    <form class="main-search-form" method="get" action="{{ route('search') }}">
                       
                        <div class="input-group">
                            <div class="input-group-prepend">
                                    @if (Request::is('category/*') || Request::is('search') )
                                        @if ($currentCategory)
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="btn-search-options" data-toggle="dropdown" aria-haspopup="true" data-selected="{{ $currentCategory->slug }}" aria-expanded="false">{{ $currentCategory->name }}</button>
                                        @else
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="btn-search-options" data-toggle="dropdown" aria-haspopup="true" data-selected="" aria-expanded="false">Todo</button>    
                                        @endif
                                    @else
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="btn-search-options" data-toggle="dropdown" aria-haspopup="true" data-selected="" aria-expanded="false">Todo</button>
                                    @endif

                                    <div class="dropdown-menu" aria-labelledby="btn-search-options">    
                                        @php
                                        $departments = [ 'STORE' ];
                                        @endphp
                                        @foreach ($departments as $dept)
                                            @php $categories = App\categories::categoriesTree($dept); @endphp
                                            @switch($dept)
                                                @case('STORE')
                                                    <h6 class="dropdown-header">Tienda</h6>
                                                    @break
                                                @case('MARKET')
                                                    <h6 class="dropdown-header">Supermercado</h6>
                                                    @break
                                                @case('FOOD')
                                                    <h6 class="dropdown-header">Restaurantes</h6>
                                                    @break
                                            @endswitch
                                            <a data-value="*" href="javascript:void(0);" class="dropdown-item active">
                                                Todo
                                            </a>
                                            @foreach ($categories as $category)
                                                <a data-value="{{ $category->slug }}" href="javascript:void(0);" class="dropdown-item">
                                                    {{ $category->name }}
                                                </a>
                                                
                                                @foreach ($category->children as $child_category)
                                                <a class="dropdown-item pl-5" data-value="{{ $child_category->slug }}" href="javascript:void(0);">{{ $child_category->name }}</a>
                                                @endforeach

                                            @endforeach
                                        @endforeach
                                    </div>
                            </div>
                            <input name="in" id="search-cat" type="hidden">
                            <input class="form-control" placeholder="Buscar" value="{{ Request::get('sthis') ?? '' }}" name="sthis" id="search-input" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-warning" type="submit"><i class="far fa-search"></i></button>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="header-top-right">

                    <a href="{{ route('store.start') }}">{{__('gen.sell')}}</a>
                    @guest
                    <a class="{{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                    @else
                    <div class="account-menu d-inline-block">
                        
                        <a id="navbarDropdown" class="py-3" href="javascript:void(0)" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name  }} <i class="fas fa-caret-down"></i>
                        </a>
                        <div class="dropdown-menu main-account-dropdown">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="section-title">
                                            <h5>
                                                Tu <span>Cuenta</span>
                                            </h5>
                                        </div>
                                        <hr class="my-2">
                                        <div class="links">
                                            <a class="d-block" href="{{ route('home') }}">Mi cuenta</a>
                                            <a class="d-block" href="{{ route('user.profile') }}">Mi perfil</a>
                                            <a class="d-block" href="{{ route('user.orders') }}">Pedidos Realizados</a>
                                            <a class="d-block" href="{{ route('user.wishlist') }}">Lista de deseos</a>
                                            <a class="d-block" href="{{ route('user.places') }}">Direcciones de entrega</a>
                                            <hr class="my-2">
                                            <a class="d-block" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                {{ __('Salir') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        
                                    </div> --}}
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @endguest
                    <a href="{{ route('cart') }}" class="menu-bar info-bar mx-3">
                        <i class="fal fa-shopping-bag fa-inverse"></i>
                    </a>  
                </div>
            </div>
          </nav>
            
            
        </header>
        
        <div class="left-sidebar bg-light">
            <div class="sidebar-header bg-primary">
                <div class="row justify-content-between">
                    <div class="col-9">
    
                        @auth   
                        <h5 class="text-white sidebar-title m-0"><i class="fad fa-user-circle fa-2x"></i> Hola, {{ Auth::user()->name }}</h5>
                        @else
                        <h5 class="text-white sidebar-title m-0"><i class="fad fa-user-circle fa-2x"></i> Hola</h5>
                        @endauth
                    </div>
                    <div class="col-3">
                        <span class="close-icon-left">
                            <button>
                                <i class="fad fa-times-circle"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="menus-container">
                <div class="list-group">
                    @php
                    $departments = [ 'STORE' ];
                    @endphp
                    @foreach ($departments as $dept)
                        @php $categories = App\categories::categoriesTree($dept); @endphp
                        
                        <div class="list-group-divider list-group-item text-uppercase"><small>Comprar por categoría</small></div>
                        @foreach ($categories as $category)
                            <a href="javascript:void(0)" role="button" data-target="#parent-{{ $category->slug }}" aria-expanded="false" aria-controls="parent{{ $category->slug }}" class="parent-menu-item no-border list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            {{ $category->name }}
                            <i class="fal fa-chevron-right"></i>
                            </a>
                        @endforeach
    
                    @endforeach
                    <div class="list-group-divider list-group-item text-uppercase"><small>Ayuda y Configuracion</small></div>
                    <a class="list-group-item list-group-item-action no-border" href="{{ route('home') }}">Tu Cuenta</a>
                    {{-- <a class="list-group-item list-group-item-action no-border" href="{{ route('user.profile') }}">Idioma</a> --}}
                    <a class="list-group-item list-group-item-action no-border" href="{{ route('support') }}">Servicio al cliente</a>
                    <a class="list-group-item list-group-item-action no-border" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        {{ __('Salir') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                @foreach ($categories as $category)
                    <div id="parent-{{ $category->slug }}" class="parent-menu list-group translated-right-x-100">
                        <a href="javascript:void(0)" class="back-btn list-group-divider list-group-item text-uppercase"><small><i class="fal fa-arrow-left mr-2"></i> Menu principal</small></a>
                        <div class="list-group-divider list-group-item text-uppercase no-border"><small>{{ $category->name }}</small></div>
                        @foreach ($category->children as $child_category)
                        <a href="{{ route('product.category', ['category' => $child_category->slug ]) }}" class="child list-group-item list-group-item-action d-flex justify-content-between align-items-center no-border">
                            {{ $child_category->name }}
                            </a>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

        

        <main class="main-container">

            @if ( session('alert-success') || session('alert-danger') || session('alert-warning') )
                <div class="container alert-container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="alert {{ App\Main::alertClass() }} d-flex mt-3">
        
                                <div class="alert-icon mr-1"><i class="fal {{ App\Main::alertIcon() }}"></i></span></div>
        
                                <div class="alert-text">{{ App\Main::alertMessage()  }}</div>
                                <div class="alert-dismiss float-right"><a href="javascript:void(0)" data-dismiss="alert" class=""><i class="fad fa-times-square"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <footer>
        <div class="footer-area pt-80 bg-primary">
            <div class="container">
                <div class="row">
                      <div class="col-xl-3 col-lg-3 col-md-6">
                          <div class="footer-wrapper mb-30">
                              <div class="footer-logo">
                                    <div class="logo">
                                        <a class="navbar-brand" href="{{ url('/') }}">
                                            <img src="{{ asset('img/Mibagi-brand-bg-dark.png') }}" class="brand" />
                                        </a>
                                    </div>
                              </div>
                              <div class="footer-text">
                                  <p>Rum soluta nobis est eligendi optio cumque nihil impedit quo minus ides quod maxime placeat facer.</p>
                              </div>
                              <hr>
                              <h4 class="footer-content">Suscribete</h4>
                                  <div class="footer-text">
                                      <p>Suscríbete para conocer nuestras ofertas</p>
                                  </div>
                              <div class="subscribes-form">
                                  <form action="#">
                                      <input placeholder="Enter your email" type="email">
                                      <button><i class="far fa-arrow-right"></i></button>
                                  </form>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-3 col-lg-3 col-md-6">
                          <div class="footer-wrapper ml-70 mb-30">
                              <h3 class="footer-title pt-10">Enlaces rápidos</h3>
                              <div class="footer-link">
                                  <ul>
                                      <li><a href="{{ route('store.start') }}">Registra tu tienda</a></li>
                                      <li><a href="{{ route('drivers.intro') }}">Se un conductor de entregas</a></li>
                                      <li><a href="{{ route('terms') }}">Términos de servicio</a></li>
                                      <li><a href="{{ route('support') }}">Soporte</a></li>
                                      
                                      
                                  </ul>
                              </div>
                           </div>
                      </div>
                      <div class="col-xl-3 col-lg-3 col-md-6"></div>
                      <div class="col-xl-3 col-lg-3 col-md-6">
                          <div class="footer-wrapper mb-30">
                              <h3 class="footer-title pt-10">Contactanos</h3>
                              <div class="footer-info">
                                  <p>Sed perspiciatis unde omnis iste natus error sit volupta ccusantium dolore mque laudant ium</p>
                              </div>
                              <ul class="footer-address">
                                  <li>
                                      <div class="footer-address-icon f-left">
                                          <i class="far fa-envelope-open-text"></i>
                                      </div>
                                      <div class="footer-address-text">
                                          <span>Teléfono</span>
                                          <h5><a href="#">+503 2222-0000</a></h5>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="footer-address-icon f-left">
                                          <i class="far fa-phone-plus"></i>
                                      </div>
                                      <div class="footer-address-text">
                                          <span>Correo electronico</span>
                                          <h5><a href="#">support@marketplace.com</a></h5>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="footer-address-icon f-left">
                                          <i class="far fa-map-marked-alt"></i>
                                      </div>
                                      <div class="footer-address-text">
                                          <span>Nuestras oficinas</span>
                                          <h5><a href="#">123 Main St, San Salvador, El Salvador</a></h5>
                                      </div>
                                  </li>
                              </ul>
                           </div>
                      </div>
                      
                  </div>
                  <div class="footer-bottom-area mt-40 pt-20 pb-70">
                      <div class="row">
                          <div class="col-xl-6 col-lg-6 col-md-7">
                              <div class="copyright">
                                  <p> <b>MIBAGI</b> - Todos los derechos reservados <i class="far fa-copyright"></i> 2022.</p>
                              </div>
                          </div>
                         <div class="col-xl-6 col-lg-6 col-md-5">
                              <div class="copyright f-right">
                                    <p>Design By <a href="http://grupo-planb.com" target="_blank"><b>Grupo Plan B</b></a></p>
                              </div>
                          </div>
                      </div> 
                  </div>
              </div>
           </div>  
      </footer>
</body>



</html>
