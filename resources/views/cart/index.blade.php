@extends('layouts.app')

@section('content')
<div class="gray-page-bg">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="section-title mb-3">
                    <small><a href="{{route('home') }}">Tienda</a> > Mi bag</small>
                    <h4 class="mt-1">Mi <span>Bag</span></h4>
                </div>
                
                <div class="shoping-cart-container">
                    @isset($cart)
                    <h6>{{ $cart->products()->count() ?? '0' }} Items en tu bolsa</h6>
                    <p>A continuación se muestran los items agregados a tu bolsa, puedes eliminar, editar la cantidad o proceder al pago.</p>
                    <div class="list-group list-group-products-in-cart">
                            @if($cart->products()->count() > 0)
                                @foreach ($cart->products()->get() as $product)
                                <div class="list-group-item">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="{{ env('APP_URL') . $product->thumbnail }}" class="product-th" />
                                        </div>
                                        <div class="col-9">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">{{ $product->title }}</h5>
                                                <small class="text-success w-50 text-right">{{ $product->presentPrice() }}</small>
                                            </div>
                                            {{-- <small>15in, 1TB SSD, 32GB RAM</small> --}}
                                            <div class="actions mt-3 text-right mb-0 row align-items-center">
                                                <div for="" class="col-8">Cantidad</div>
                                                <input type="number" step="1" value="{{ $product->pivot->quantity  ?? '0' }}" readonly min="1" class="form-control col-2 form-control-sm form-control-inline" /> 
                                                <div class="col-2 text-left">
                                                    <a href="{{ route('cart.remove', ['p'=>$product->id]) }}" class="btn btn-sm btn-link">Quitar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                @endforeach
                            @else
                            <div class="alert-info">
                                <div class="alert-text p-3 text-center">
                                    Tu bolsa esta vacía
                                </div>
                            </div>
                            @endif
                        </div>
                        
                        <div class="cost-summary my-3 card">
                            <table class="table my-0 table-borderless">
                                <tbody>
                                    <tr>
                                        <td rowspan="4" width="50%">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td class="text-right">{{ App\Cart::mformat($subtotal) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Envío</td>
                                        <td class="text-right">$0.00</td>
                                    </tr>
                                    <tr>
                                        <td><b>Total</b></td>
                                        <td class="text-right"><b>{{ App\Cart::mformat($subtotal) }}</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="car-actions">
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('welcome') }}" type="submit" class="btn btn-light">Seguir comprando</a>
                                </div>
                                <div class="col text-right">
                                    <a href="{{ route('cart.checkout') }}" type="submit" class="btn btn-primary">Proceder al pago</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="alert-info">
                        <div class="alert-text p-3 text-center">
                            Aun no has agregado items a tu bag.
                        </div>
                    </div>
                    @endisset
            </div>
        </div>
    </div>
</div>
@endsection
