@extends('layouts.app')

@section('content')
<div class="gray-page-bg">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="section-title mb-3">
                    <small><a href="{{route('welcome') }}">Tienda</a> > Orden enviada</small>
                    <h4 class="mt-1">Orden <span>enviada</span></h4>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-success">
                            <div class="alert-message">
                                <div class="text-center alert-heading mb-3">
                                    <i class="fal fa-clipboard-check fa-3x"></i>
                                </div>
                                <p>Tu orden <strong class="text-success">#{{ $order }}</strong> ha sido enviada, te notificaremos cuando sea procesada. Puedes seguir el proceso de tu orden en tu cuenta.</p>
                                <div class="text-center my-3">
                                    <a href="{{route('user.orders')}}" class="btn btn-primary">Ver mis pedidos</a>
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
