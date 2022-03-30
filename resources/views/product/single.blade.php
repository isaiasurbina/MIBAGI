@extends('layouts.app')

@section('content')
@push('head')
<link href="{{ asset('css/plugins/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />    
<script src="{{ asset('js/plugins/swiper-bundle.min.js') }}"></script>    
<script src="{{ asset('js/pages/product.js') }}"></script>    
@endpush
<div class="p-5 gray-page-bg">
    <div class="p-0">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="gallery card">
                    <div class="card-body">
                        <div class="swiper-container main-gallery-container">
                            <div class="swiper-wrapper">
                                @forelse ($product->images as $item)
                                    <div class="swiper-slide"><img src="{{ env('APP_URL') . $item->filename }}" /></div>
                                @empty
                                    <div class="swiper-slide"><img src="{{ env('APP_URL') . $product->thumbnail }}" /></div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="swiper-container gallery-thumbs bg-light p-2">
                        <div class="swiper-wrapper">
                            @forelse ($product->images as $item)
                                @php
                                $th = Str::beforeLast($item->filename,'.png');
                                @endphp
                                <div class="swiper-slide"><img src="{{ env('APP_URL') . $th . '_300.png' }}" /></div>
                            @empty
                                <div class="swiper-slide"><img src="{{ env('APP_URL') . $product->thumbnail }}" /></div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="section-title">
                    <h5 href="#" class="text-info" style="font-weight: normal;">
                        {{ $product->title }}
                    </h5>
                    <small class="text-muted">Vendido por <a href="{{ route('product.store', [ 'store' => md5($product->store->id) ]) }}" class="text-info">{{ $product->store->name }}</a></small>
                    <p class="text-muted">
                        {!! nl2br($product->description) !!}
                    </p>
                    <hr>
                    {{-- <div class="form-block">
                        <label for="">Color</label>
                        <select name="variation" class="form-control" id="">
                            <option value="black">Negro</option>
                            <option value="blue">Azul</option>
                            <option value="white">Blanco</option>
                        </select>
                    </div>
                    <div class="form-block">
                        <label for="">Talla</label>
                        <select name="variation" class="form-control" id="">
                            <option value="black">S</option>
                            <option value="blue">M</option>
                            <option value="white">L</option>
                            <option value="white">XL</option>
                            <option value="white">XXL</option>
                        </select>
                    </div> --}}
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="stars my-2 text-orange">
                            <div class="stars"> 
                                <?php 
                                $rvalue = $product->rating;  //enter how many stars to rating
                                $max_stars = 5; //enter maximum no.of stars
                                $entero = is_int($rvalue);
                                for ($i = 1; $i <= $max_stars; $i++){?>
                                <?php if(ceil($rvalue) == $i && $entero == false) { ?>
                                    <i class="fas fa-star-half-alt"></i>
                                <?php } elseif(ceil($rvalue) >= $i) { ?>
                                    <i class="fas fa-star"></i>
                                <?php } else { ?>
                                    <i class="far fa-star"></i>
                                <?php } 
                                }?>
                                <small class="text-navi">{{ $rvalue }}</small>
                            </div>
                            
                            <small class="text-info">{{ $product->reviews_count }} calificaciones</small>
                        </div>
                        <p class="text-success">{{ $product->presentPrice() }}</p>
                        <div class="details mb-2">
                            <div class="row">
                                <div class="col-1">
                                    <i class="fal fa-dolly"></i>
                                </div>
                                <div class="col-9">
                                    <small class="envio"> Envio Gratis</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    <i class="fal fa-shipping-timed"></i>
                                </div>
                                <div class="col-9">
                                    <small class="envio"> Fecha estimada: <strong class="text-primary">{{ $freeEstimatedDateStart }} - {{ $freeEstimatedDateEnd }}</strong></small>
                                </div>
                            </div>
                            
                            <hr class="my-1">
                            <div class="row">
                                <div class="col-1">
                                    <i class="fal fa-shipping-fast"></i>
                                </div>
                                <div class="col-9">
                                    <small class="envio"> Fecha estimada con <b class="text-navi">Mibagi<span class="text-orange">Plus</span></b><br><strong class="text-primary">{{ $PlusEstimatedDateStart }} - {{ $PlusEstimatedDateEnd }}</strong></small>
                                </div>
                            </div>

                        </div>
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-block btn-sm btn-primary my-2">Agregar a mi Bag</button>
                        </form>
                        {{-- <a href="javascript:void(0)" class="btn btn-block btn-sm btn-warning text-white">Comprar</a> --}}
                        <a href="javascript:void(0)" class="btn btn-block btn-sm btn-light">Agregar a mi lista</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h5>
                        Productos <span>relacionados</span>
                    </h5>
                </div>
            </div>
                    @foreach ($relatedProducts as $item)
                        @php
                            $link = route('product.single', [ 'product' => Str::upper(md5($item->id)) ]) ;
                        @endphp
                        @if($item->id != $product->id && $item->status == 'PUBLISHED')
                        <div class="col-md-2">
                            <div class="card">
                                <a href="{{ $link }}">
                                    <div class="card-header-image" style="background-image: url('{{ env('APP_URL') . $item->thumbnail }}')"></div>
                                </a>
                                <div class="card-body">
                                    <div class="text-nowrap text-truncate">
                                        <a href="{{ $link }}" class="text-info" title="{{ $item->title }}"><small>{{ $item->title }}</small></a>
                                    </div>
                                    <p class="card-text mt-0"><small class="text-success">US${{ number_format(intval($item->price) / 100,2) }}</small></p>
                                </div>
                                <a class="btn btn-light btn-sm" href="{{ $link }}">
                                    Ver producto
                                </a>
                            </div>
                        </div>
                        @endif
                    @endforeach
                
            
        </div>

        <section class="product-content my-4">
            <div class="card">
                <div class="card-body">
                    <div class="section-title mb-3">
                        <h5>Información del <span>producto</span></h5>
                    </div>
                    {!! $product->fulltext !!}
                    
            </div>
        </section>
        <div class="product-reviews">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="section-title">
                                <h5>Opiniones de <span>clientes</span></h5>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="alert alert-info">
                                <div class="alert-text">
                                    Este producto aún no tiene revisiones.
                                </div>
                            </div>
                        </div>
                        {{-- <table class="table my-0 table-striped">
                            <tr>
                                <td>5 Estrellas</td>
                                <td>80%</td>
                            </tr>
                            <tr>
                                <td>4 Estrellas</td>
                                <td>13%</td>
                            </tr>
                            <tr>
                                <td>3 Estrellas</td>
                                <td>5%</td>
                            </tr>
                            <tr>
                                <td>2 Estrellas</td>
                                <td>80%</td>
                            </tr>
                            <tr>
                                <td>1 Estrellas</td>
                                <td>2%</td>
                            </tr>
                        </table> --}}
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="section-title">
                                <h5>Comentarios sobre el <span>producto</span></h5>
                            </div>
                            <div class="row my-5 justify-content-center">
                                <div class="col-md-6">
                                    <div class="alert alert-info">
                                        <div class="alert-icon">
                                            <i class="fal fa-info-circle"></i>
                                        </div>
                                        <div class="alert-text">
                                            El producto aún no tiene comentarios.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
