@extends('layouts.app')

@section('content')
<section class="hero-area pos-rel">
    
   
    <div class="hero-slider" style="background-image: url({{ asset('img/oficial/main-slider-home/slider-corner.png') }})">
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center slick-slide slick-current slick-active" data-background="{{ asset('img/oficial/banners/BannerRegistra-tu-tienda.png') }}"  tabindex="0" data-slick-index="0" aria-hidden="false">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7">
                            <div class="hero-text">
                                <div class="hero-slider-caption ">
                                    <h2 data-animation="fadeInUp" data-delay=".4s" class="" style="animation-delay: 0.4s;">Hazte <br>Vendedor de <span>MIBAGI</span></h2>
                                </div>
                                <div class="hero-slider-btn">
                                    <a data-animation="fadeInUp" data-delay=".8s" href="{{route('store.register')}}" class="c-btn" tabindex="0" style="animation-delay: 0.8s;"><span> </span> Comienza ahora <span></span></a> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>



<!-- features-03-area-start -->
<div class="features-03-area grey-bg pt-125 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 offset-lg-2 offset-xl-2">
                <div class="section-title text-center mb-70">
                    <h2>Tiendas <span>MIBAGI</span></h2>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium <br> doloremque laudantium totam rem aperiam eaque ipsa quae</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="features-03-wrapper white-bg mb-30">
                    <div class="features-03-icon bg-dark">
                        <i class="fal fa-3x fa-shopping-bag mt-3 text-success"></i>
                    </div>
                    <div class="features-03-text">
                        <h3>Mayor alcance</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                        <div class="b-button">
                            <a href="#">Leer más</a>
                         </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="features-03-wrapper white-bg mb-30">
                    <div class="features-03-icon bg-dark">
                        <i class="fal fa-3x fa-truck-loading mt-3 text-success"></i>
                    </div>
                    <div class="features-03-text">
                        <h3>Manejo de envío</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                        <div class="b-button">
                            <a href="#">Leer más</a>
                         </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="features-03-wrapper white-bg mb-30">
                    <div class="features-03-icon bg-dark">
                        <i class="fal fa-3x fa-sack-dollar mt-3 text-success"></i>
                    </div>
                    <div class="features-03-text">
                        <h3>Precio a tu alcance</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                        <div class="b-button">
                            <a href="#">Ver precios</a>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- features-03-area-end -->
<!-- features-area-start -->
<div class="features-area pt-155 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-8 offset-lg-2 offset-xl-3">
                <div class="section-title text-center mb-70">
                    <h2>Comienza a <span>vender</span> ahora</h2>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam eaque ipsa quae</p>

                    <a class="c-btn mt-3" href="{{route('store.register')}}">
                        <span></span> Registra tu tienda <span></span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- features-area-end -->
@endsection
