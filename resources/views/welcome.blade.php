@extends('layouts.app')

@push('head')
<link rel="stylesheet" href="{{ asset('css/plugins/swiper-bundle.min.css') }}" type="text/css" >
<script src="{{ asset('js/plugins/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('js/welcome.js') }}"></script>
@endpush
@section('content')
<!-- hero-area start -->
<section class="hero-area pos-rel d-none d-sm-block">
    
    <div class="hero-slider" style="background-image: url({{ asset('img/oficial/main-slider-home/slider-corner.png') }})">
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center slick-slide slick-current slick-active" data-background="{{ asset('img/oficial/main-slider-home/Slider-Web-mibagi-productos.jpg') }}"  tabindex="0" data-slick-index="0" aria-hidden="false">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7">
                            <div class="hero-text">
                                <div class="hero-slider-caption ">
                                    <h2 data-animation="fadeInUp" data-delay=".4s" class="" style="animation-delay: 0.4s;">Bienvenid@ a<span><br>Mibagi</span></h2>
                                </div>
                                {{-- <div class="hero-slider-btn">
                                    <a data-animation="fadeInUp" data-delay=".8s" href="#" class="c-btn" tabindex="0" style="animation-delay: 0.8s;"><span> </span> Nuestra tienda <span></span></a> 
                                        <div class="b-button black-b-button ml-25" data-animation="fadeInUp" data-delay="1s" style="animation-delay: 1s;">
                                            <a href="#" tabindex="0">Conocer más</a>
                                        </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="single-slider slider-height d-flex align-items-center slick-slide slick-current slick-active" data-background="{{ asset('img/oficial/main-slider-home/Slider-Web-mibagi-2.png') }}"  tabindex="0" data-slick-index="0" aria-hidden="false">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7">
                            <div class="hero-text">
                                <div class="hero-slider-caption ">
                                    <h2 data-animation="fadeInDown" data-delay=".4s" class="" style="animation-delay: 0.4s;">Una nueva experiencia<br><span>de compra en línea </span></h2>
                                </div>
                                {{-- <div class="hero-slider-btn">
                                    <a data-animation="fadeInDown" data-delay=".8s" href="#" class="c-btn" tabindex="0" style="animation-delay: 0.8s;"><span> </span> Nuestra tienda <span></span></a> 
                                        <div class="b-button black-b-button ml-25" data-animation="fadeInDown" data-delay="1s" style="animation-delay: 1s;">
                                            <a href="#" tabindex="0">Conocer más</a>
                                        </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="single-slider slider-height d-flex align-items-center slick-slide slick-current slick-active" data-background="{{ asset('img/oficial/main-slider-home/Slider-Web-mibagi-3.png') }}"  tabindex="0" data-slick-index="0" aria-hidden="false">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7">
                            <div class="hero-text">
                                <div class="hero-slider-caption ">
                                    <h2 data-animation="fadeInRight" data-delay=".4s" class="" style="animation-delay: 0.4s;">Las mejores ofertas <br><span>y mucho más...</span></h2>
                                </div>
                                {{-- <div class="hero-slider-btn">
                                    <a data-animation="fadeInRight" data-delay=".8s" href="#" class="c-btn" tabindex="0" style="animation-delay: 0.8s;"><span> </span> Nuestra tienda <span></span></a> 
                                        <div class="b-button black-b-button ml-25" data-animation="fadeInRight" data-delay="1s" style="animation-delay: 1s;">
                                            <a href="#" tabindex="0">Conocer más</a>
                                        </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<section class="d-xs-block d-sm-none p-3">
    <h2 data-animation="fadeInUp" data-delay=".4s" class="" style="animation-delay: 0.4s;">Bienvenid@ a<span><br>Mibagi</span></h2>
</section>
<!-- hero-area end --> 

<section class="big-cols">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h3>Videojuegos</h3>
                    </div>
                    <a href="category/juegos">
                        <img src="{{ asset('img/sections/gaming.jpg') }}" class="image-header" >
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h3>Lo básico</h3>
                    </div>
                    <a href="category/celulares">
                        <img src="{{ asset('img/sections/accesorios.jpg') }}" class="image-header" >
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h3>Valentine's Day</h3>
                    </div>
                    <a href="category/mujeres">
                        <img src="{{ asset('img/sections/season.jpg') }}" class="image-header" >
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h3>Automotriz</h3>
                    </div>
                    <a href="category/equipo-herramientas-auto">
                        <img src="{{ asset('img/sections/herramientas.jpg') }}" class="image-header" >
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="new-products p-3">
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h5>Productos <span>nuevos</span></h5>
            </div>
        </div>
        <div class="col-12">
            <div class="swiper-container product-carousel" id="">
                <div class="swiper-wrapper">
                @foreach ($newProducts as $item)
                @php
                    $link = route('product.single', [ 'product' => Str::upper(md5($item->id)) ]) ;
                @endphp
                    <div class="swiper-slide">
                        <div class="card">
                            <a href="{{ $link }}">
                                <div class="card-header-image" style="background-image: url('{{ env('APP_URL') . $item->thumbnail }}')"></div>
                            </a>
                            <div class="card-body">
                                <div class="text-nowrap text-truncate">
                                    <a href="{{ $link }}" class="text-info" title="{{ $item->title }}">{{ $item->title }}</a>
                                </div>
                                <p class="card-text mb-0"><small class="text-muted">Vendido por <a class="text-orange" href="javascript:void(0)">{{ $item->store->name }}</a></small></p>
                                <p class="card-text mt-0"><small class="text-success">US${{ number_format(intval($item->price) / 100,2) }}</small></p>
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-block btn-sm btn-primary my-2">Agregar a mi Bag</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>

<!-- features-area-start -->
<div class="features-area pt-5 pb-5 pos-rel">
    {{-- <div class="shape d-none d-xl-block">
        <div class="shape-item fe-01 bounce-animate"><img src="{{ asset('img/demo/shape-02.png') }}" alt=""></div>
    </div> --}}
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="section-title text-center mb-10">
                    <h3>Explora <span>categorias pupulares</span></h3>
                    {{-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam eaque ipsa quae</p> --}}
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="features-wrapper text-center mb-30">
                    <div class="features-img">
                        <img src="{{ asset('img/oficial/bigicons/Productos-de-calidad.png') }}" alt="">
                    </div>
                    <div class="features-text">
                        <h2>La mejor calidad de productos</h2>
                        <p>Donec in tortor id metus laoreet elementum in sit amet est.</p>
                        <div class="features-button">
                            <a class="c-btn s-btn" href="#"><span> </span> Leer más <span></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="features-wrapper text-center mb-30">
                    <div class="features-img">
                        <img src="{{ asset('img/oficial/bigicons/Entrega-a-domicilio.png') }}" alt="">
                    </div>
                    <div class="features-text">
                        <h2>Entrega a domicilio de tu pedido</h2>
                        <p>Donec in tortor id metus laoreet elementum in sit amet est.</p>
                        <div class="features-button">
                            <a class="c-btn s-btn" href="#"><span> </span> Leer más <span></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="features-wrapper text-center mb-30">
                    <div class="features-img">
                        <img src="{{ asset('img/oficial/bigicons/Pago-seguro.png') }}" alt="">
                    </div>
                    <div class="features-text">
                        <h2>Pago seguro <br>y rápido</h2>
                        <p>Donec in tortor id metus laoreet elementum in sit amet est.</p>
                        <div class="features-button">
                            <a class="c-btn s-btn" href="#"><span> </span> Leer más <span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
<!-- features-area-end -->

<!-- banner-area-start -->
<div class="banner-area pr-60 pl-60 pb-95">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="banner-img">
                    <a href="{{ route('product.category', ['category'=>'computadoras'] ) }}"><img src="{{ asset('img/oficial/banners/Electronicos900x900.jpg') }}" alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 mb-30">
                        <div class="banner-img">
                            <a href="{{ route('product.category', ['category'=>'equipo-herramientas-auto'] ) }}"><img src="{{ asset('img/oficial/banners/automotriz.jpg') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 mb-30">
                        <div class="banner-img">
                            <a href="{{ route('product.category', ['category'=>'jardin'] ) }}"><img src="{{ asset('img/oficial/banners/Ferreterias600x600.jpg') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-12 mb-30">
                        <div class="banner-img">
                            <a href="{{ route('product.category', ['category'=>'bebes'] ) }}"><img src="{{ asset('img/oficial/banners/Ropa-calzado-joyeria900x450.jpg') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner-area-end -->

<section class="new-products p-3">
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h5>Productos mejor <span>evaluados</span></h5>
            </div>
        </div>
        <div class="col-12">
            <div class="swiper-container product-carousel" id="">
                <div class="swiper-wrapper">
                @foreach ($bestProducts as $item)
                @php
                    
                    $link = route('product.single', [ 'product' => Str::upper(md5($item->id)) ]) ;
                @endphp
                    <div class="swiper-slide">
                        <div class="card">
                            <a href="{{ $link }}">
                                <div class="card-header-image" style="background-image: url('{{ $item->thumbnail }}')"></div>
                            </a>
                            <div class="card-body">
                                <div class="text-nowrap text-truncate">
                                    <a href="{{ $link }}" class="text-info" title="{{ $item->title }}">{{ $item->title }}</a>
                                </div>
                                <p class="card-text mb-0"><small class="text-muted">Vendido por <a class="text-orange" href="javascript:void(0)">{{ $item->store->name }}</a></small></p>
                                <p class="card-text mt-0"><small class="text-success">US${{ number_format(intval($item->price) / 100,2) }}</small></p>
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-block btn-sm btn-primary my-2">Agregar a mi Bag</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>

<section class="new-products p-3">
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h5>Ofertas de la <span>semana</span></h5>
            </div>
        </div>
        <div class="col-12">
            <div class="swiper-container product-carousel" id="">
                <div class="swiper-wrapper">
                @foreach ($offerProducts as $item)
                @php
                    $discount = intval($item->price) * 0.2; 
                    $offerPrice = intval($item->price) - $discount;
                    $link = route('product.single', [ 'product' => Str::upper(md5($item->id)) ]) ;
                @endphp
                    <div class="swiper-slide">
                        <div class="card">
                            <a href="{{ $link }}">
                                <div class="card-header-image" style="background-image: url('{{ $item->thumbnail }}')"></div>
                            </a>
                            <div class="card-body">
                                <div class="text-nowrap text-truncate">
                                    <a href="{{ $link }}" class="text-info" title="{{ $item->title }}">{{ $item->title }}</a>
                                </div>
                                <p class="card-text mb-0"><small class="text-muted">Vendido por <a class="text-orange" href="javascript:void(0)">{{ $item->store->name }}</a></small></p>
                                <p class="card-text mt-0"><small class="text-success text-strike">US${{ number_format(intval($item->price) / 100,2) }}</small> <small class="text-danger">US${{ number_format(floatval($offerPrice) / 100,2) }}</small> </p>
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-block btn-sm btn-primary my-2">Agregar a mi Bag</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>

<!-- deal-area-start -->
{{-- <div class="deal-area deal-pt pt-210 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 offset-xl-2 col-lg-9">
                <div class="single-deal pos-rel mb-30">
                    <div class="deal-content">
                        <h2>Oferta de <br> la semana</h2>
                    </div>
                    <div class="deal-img">
                        <img src="{{ asset('img/oficial/bigicons/Para-Oferta-de-la-semana.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="deal-wrapper mb-30">
                    <div class="deal-text">
                        <h2><span>20%</span> de descuento en todos los nuevos productos</h2>
                        <div class="deal-list">
                            <ul>
                                <li>Envío Gratis</li>
                                <li>Envío Rápido</li>
                                <li>Garantía 1 año</li>
                                <li>IVA incluido</li>
                            </ul>
                        </div>
                        <p>Avoids pleasure itself bcau it is pleasure but beca those who do not know how</p>
                        <div class="deal-button">
                            <a class="c-btn s-btn" href="#"><span> </span> comprar <span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- deal-area-end -->

<!-- order-area-start -->
{{-- <div class="order-area pt-130 pb-100 pos-rel" style="background-image: url({{ asset('img/oficial/app/slider-para-la-app-web.png') }})">
    <div class="shape d-none d-xl-block">
        <div class="shape-item order-01 bounce-animate"><img src="{{ asset('img/demo/01(7).png') }}" alt=""></div>
        <div class="shape-item order-02 bounce-animate"><img src="{{ asset('img/demo/02(5).png') }}" alt=""></div>
        <div class="shape-item order-03 bounce-animate"><img src="{{ asset('img/demo/03(4).png') }}" alt=""></div>
        <div class="shape-item order-04 bounce-animate"><img src="{{ asset('img/demo/04(2).png') }}" alt=""></div>
        <div class="shape-item order-05 bounce-animate"><img src="{{ asset('img/demo/05(1).png') }}" alt=""></div>
        <div class="shape-item order-06 bounce-animate"><img src="{{ asset('img/demo/06(1).png') }}" alt=""></div>
        <div class="shape-item order-07 bounce-animate"><img src="{{ asset('img/demo/07(1).png') }}" alt=""></div>
        <div class="shape-item order-08 bounce-animate"><img src="{{ asset('img/demo/08(1).png') }}" alt=""></div>
        <div class="shape-item order-09 rotateme"><img src="{{ asset('img/demo/09.png') }}" alt=""></div>
        <div class="shape-item order-10 rotateme"><img src="{{ asset('img/demo/10.png') }}" alt=""></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-7">
                <div class="order-wrapper mb-30">
                    <div class="cta-text order-white-text">
                        <span><i class="far fa-plus"></i> Descarga nuestra app</span>
                        <h2>Usa nuestra aplicación!!</h2>
                        <p>Nam sed aliquet ligula, eget hendrerit felis. Sed tristique, turpis et fringilla euismod, neque mauris fermentum nisl, eget dapibus neque nisi a dolor.</p>
                        <div class="order-button">
                            <a class="c-btn black-btn" href="#"><span> </span>Ordenar<span></span></a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div> --}}
<!-- order-area-end -->

@endsection
