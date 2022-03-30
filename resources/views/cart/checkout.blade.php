@extends('layouts.app')

@section('content')

<script src="{{asset('js/pages/checkout/chkform.js')}}"></script>
<div class="gray-page-bg">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="section-title mb-3">
                    <small><a href="{{route('welcome') }}">Tienda</a> > Bolsa > Pago y entrega</small>
                    <h4 class="mt-1">Pago y <span>entrega</span></h4>
                </div>
                
                <form action="{{ route('cart.authorize') }}" method="post">
                    @csrf
                    <input type="hidden" name="cid" value="{{ $cart->id }}">
                    <input type="hidden" name="total" value="{{ $subtotal }}">
                    <div class="payment-info-container mb-3">
                        <div class="direcciones-container mb-3">
                            <div class="card">
                                @if($errors->any())
                                <div class="p-3">
                                    <div class="alert alert-danger p-3">Favor completar todos los campos requeridos</div>
                                </div>
                                @endif
                                <div class="p-3 section-title">
                                    <h5 class="mt-1">Seleccionar dirección de entrega</h5>
                                </div>
                                <div class="card-body mt-0">
                                    <div class="list-group radio-list-group">
                                        @forelse ($places as $item)
                                        <label for="place{{ $item->id }}" class="list-group-item list-group-item-action">
                                            <input class="float-right" type="radio" name="place" value="{{ $item->id }}" id="place{{ $item->id }}">
                                            <div class="list-group-item-text">
                                                <div>
                                                {{ $item->title }}<br>
                                                <span class="text-muted">{{ $item->address_line_1 }}</span>
                                                </div>
                                            </div>
                                        </label>    
                                        @empty
                                            No tienes direcciones de entrega
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="p-3 section-title">
                                    <h5 class="mt-1">Tipo de envío</h5>
                                </div>
                                @foreach ($shipping_types as $type) 
                                <label for="shipping_type{{ $type->id }}" class="list-group-item list-group-item-action">
                                    <input class="float-right" type="radio" name="shipping_type" value="{{ $type->id }}" id="shipping_type{{ $type->id }}">
                                    <div class="list-group-item-text">
                                        <div>
                                        {{ $type->labelText }}<br>
                                        <span class="text-muted">{{ App\Cart::mformat($type->price) }}</span>
                                        </div>
                                    </div>
                                </label> 
                                @endforeach
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="payment-form">
                                    <div class="section-title mb-3">
                                        <h5 class="mt-1">Total: <span>{{ App\Cart::mformat($subtotal) }}</span> <br><small class="font-italic text-muted">Total no incluye envío</small></h5>
                                    </div>
                                        <div class="form-group">
                                            <label for="card">Número de tarjeta</label>
                                            <input type="text" name="card" id="card" class="form-control" value="{{ old('card') }}" placeholder="0000 0000 0000 0000">
                                        </div>
                                        <label for="card">Nombres del tarjeta</label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="cardholder">Nombre</label>
                                                    <input type="text" name="cardholderFirstname" id="cardholderFirstname" value="{{ old('cardholderFirstname') }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="cardholder">Apellido</label>
                                                    <input type="text" name="cardholderLastname" id="cardholderLastname" value="{{ old('cardholderLastname') }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Fecha de expiración</label>
                                                    <div class="row mx-0">
                                                        <input type="text" maxlength="2" name="duedate_m" value="{{ old('duedate_m') }}" id="duedate_m" class="form-control col-sm-3 mr-3" placeholder="MM">
                                                        <input type="text" maxlength="2" name="duedate_y" value="{{ old('duedate_y') }}" id="duedate_y" class="form-control col-sm-3" placeholder="YY">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="securitycode">Código de seguridad</label>
                                                    <input type="text" name="card_cvv" id="card_cvv" class="form-control col-sm-3" placeholder="000">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                
                                                <input type="checkbox" name="sameaddress" id="sameaddress" class="" value="1" />
                                                <label for="sameaddress">Dirección de facturacion igual a la dirección de entrega</label>
                                                <div class="mt-3" id="sameaddr-container">
                                                    <div class="payment-form">
                                                        <div class="section-title mb-3">
                                                            <h5 class="mt-1">Dirección de <span>facturación</span></h5>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="card">Dirección linea 1</label>
                                                            <input type="text" name="billAddress" id="billAddress" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="card">Dirección linea 2</label>
                                                            <input type="text" name="billAddress2" id="billAddress2" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="card">Estado/Departamento</label>
                                                            <select name="states" id="states" data-service="{{route('api.places.getCities')}}" class="form-control">
                                                                @foreach ($states as $state)
                                                                    <option data-id="{{ $state->id }}" value="{{$state->name}}">{{$state->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="card">Ciudad</label>
                                                            <select name="cities" id="cities" class="form-control" disabled>
                                                                {{-- @foreach ($cities as $city)
                                                                    <option value="{{$city->name}}">{{$city->name}}</option>
                                                                @endforeach --}}
                                                            </select>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        </div>
                                        
                                    </div>    
                                    
                                </div>
                            </div>
                        
                        
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <a href="{{ route('cart.checkout') }}" class="btn btn-sm btn-secondary">Atras</a>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="submit" class="btn btn-sm btn-warning">Proceder al pago de la orden</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
