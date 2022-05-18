@extends('layouts.app')

@section('content')
<div class="gray-page-bg">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="section-title mb-3">
                    <small><a href="{{route('home')}}">Mi cuenta</a> > Pedidos</small>
                    <h4 class="mt-1">Pedidos <span>realizados</span></h4>
                </div>
                <div class="orders-container">
                    @forelse ($orders as $order)
                        
                    <div class="card my-3">
                        <div class="card-header">
                            <div class="total float-right text-right">
                                <div class="">Total: <b>{{ $order->presentTotal() }}</b></div>
                                {{-- <a href="#" class="text-info">Ver recibo</a> --}}
                            </div>
                            Pedido No. {{$order->number}}<br>
                            <small>Pedido realizado: {{ App\Main::humanDate($order->created_at) }}</small>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    @foreach ($order->products as $item)
                                        
                                    <div class="row mb-4">
                                        <div class="col-3">
                                            <img src="{{ $item->thumbnail }}" class="order-item-image" >
                                        </div>
                                        <div class="col-9">
                                            <a href="#" class="text-info">{{ $item->title }}</a><br>
                                            <span class="text-muted">Vendido por: {{ $item->store->name }}</span><br>
                                            <span class="text-muted">Cantidad: {{$item->pivot->quantity}}</span><br>
                                            <span class="text-muted">{{ App\Cart::mformat($item->price) }}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                
                                    
                                </div>
                                <div class="col-md-4">
                                    <a href="{{ route('user.order.track', [ 'n' => $order->number] ) }}" class="btn btn-dark btn-block">Rastrear pedido</a>
                                    {{-- <a href="#" class="btn btn-outline-dark btn-block">Devolver pedido</a>
                                    <a href="#" class="btn btn-outline-dark btn-block">Evaluar al vendedor</a>
                                    <a href="#" class="btn btn-outline-dark btn-block">Escribir una opinión</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="text-uppercase text-success">{{ __($order->getStatus()) }}</span> 
                            {{-- |
                            <span class="text-muted">Jueves 27 Agosto, 2020</span> --}}
                        </div>
                    </div>
                    @empty
                        
                    @endforelse

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
