@extends('layouts.app')

@section('content')
<div class="gray-page-bg">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="section-title mb-3">
                    <small><a href="{{route('home') }}">Mi cuenta</a> > Lista de deseos</small>
                    <h4 class="mt-1">Lista de <span>deseos</span></h4>
                </div>
                <div class="py-1">
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="https://m.media-amazon.com/images/I/317a31qdqZL._SS135_.jpg" alt="Card image cap">
                                        </div>
                                        <div class="col-md-7">
                                            <a href="#" class="text-info">Disfraz de Jedi para adulto con capucha para túnica de Halloween Cosplay</a>
                                            <p class="card-subtitle">$44.99</p>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="javascript:void(0)" class="btn btn-block btn-dark">Comprar</a>
                                            <a href="javascript:void(0)" class="btn btn-block btn-outline-dark">Quitar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="https://m.media-amazon.com/images/I/51MNU4gnNPL._SS135_.jpg" alt="Card image cap">
                                        </div>
                                        <div class="col-md-7">
                                            <a href="#" class="text-info">De los hombres PU piel Billetera tarjeta de crédito cartera Embrague Bifold bolso, rbenxia Lujo portafolios de piel cartera Bifold Wallet</a>
                                            <p class="card-subtitle">$30.99</p>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="javascript:void(0)" class="btn btn-block btn-dark">Comprar</a>
                                            <a href="javascript:void(0)" class="btn btn-block btn-outline-dark">Quitar</a>
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
