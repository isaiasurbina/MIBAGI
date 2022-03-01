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
                                    <h2 data-animation="fadeInUp" data-delay=".4s" class="" style="animation-delay: 0.4s;">Trabaja como <span>MIBAGI driver</span></h2>
                                </div>
                                {{-- <div class="hero-slider-btn">
                                    <a data-animation="fadeInUp" data-delay=".8s" href="{{route('store.register')}}" class="c-btn" tabindex="0" style="animation-delay: 0.8s;"><span> </span> Comienza ahora <span></span></a> 
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>



<!-- features-03-area-start -->
<div class="features-03-area bg-orange pt-125 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 offset-lg-2 offset-xl-2">
                <div class="section-title text-center mb-70">
                    <h2>Entrega con MIBAGI</h2>
                    <p class="text-primary">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium <br> doloremque laudantium totam rem aperiam eaque ipsa quae</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="features-03-wrapper p-0">
                    <div class="card no-border">
                        <img src="https://image.freepik.com/free-photo/delivery-man-checking-delivery-list-van_58466-9792.jpg" class="card-img-top" />
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="features-03-wrapper p-0">
                    <div class="card no-border">
                        <img src="https://image.freepik.com/free-photo/delivery-man-checking-delivery-list-van_58466-9792.jpg" class="card-img-top" />
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="features-03-wrapper p-0">
                    <div class="card no-border">
                        <img src="https://image.freepik.com/free-photo/delivery-man-checking-delivery-list-van_58466-9792.jpg" class="card-img-top" />
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
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
                    <h2>Comienza a <span>entregar</span> ahora</h2>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam eaque ipsa quae</p>

                    {{-- <a class="c-btn mt-3" href="{{route('store.register')}}">
                        <span></span> Registra tu tienda <span></span>
                    </a> --}}
                </div>
            </div>
        </div>

    </div>
</div>
<!-- features-area-end -->
@endsection
