@extends('layouts.store')

@section('content')
<div class="py-4 px-2">
    <div class="row">
        <div class="col-md-12">
            <div class="row my-2">
                <div class="col-md-6">
                    {{-- <a class="btn btn-sm btn-light" href="javascript:void(0)">Mensaje al comprador</a> --}}
                    <a class="btn btn-sm btn-dark" href="{{ route('store.order.update', ['order'=> $orden->number , 'status'=>'REFUND_REQUEST']) }}">Reembolso</a>
                    @if ($orden->status < 3)
                        <a class="btn btn-sm btn-dark" href="{{ route('store.order.update', ['order'=> $orden->number , 'status'=>'PROCESSING']) }}">Procesando</a>
                    @endif
                    @if ($orden->status < 4 && $orden->status > 2)
                        <a class="btn btn-sm btn-dark" href="{{ route('store.order.update', ['order'=> $orden->number , 'status'=>'SHIPPED']) }}">Marcar como enviada</a>
                    @endif
                </div>
                {{-- <div class="dropdown">
                    <button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="product-actions-2356295620" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Acciones
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('store.order.update', ['order'=> $orden->number , 'status'=>'REFUND_REQUEST']) }}">Reembolso</a>
                        <a class="dropdown-item" href="{{ route('store.order.update', ['order'=> $orden->number , 'status'=>'PROCESSING']) }}">Procesando</a>
                        <a class="dropdown-item" href="{{ route('store.order.update', ['order'=> $orden->number , 'status'=>'SHIPPED']) }}">Enviada</a>
                    </div>
                </div> --}}
                <div class="col-md-3">
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary">
                    Detalle de orden #{{ $orden->number }}
                </div>
                <div class="row my-2">
                    <div class="col-md-7">
                        <div class="table-container">
                            <table class="table table-default thead-light">
                                <tr>
                                    <th class="">Tipo de envio</th>
                                    <td class="">Estandar</td>
                                </tr>
                                <tr>
                                    <th class="">Cuándo enviar</th>
                                    <td class="">{{ App\Main::humanDate($orden->date_to_send) }}</td>
                                </tr>
                                <tr>
                                    <th class="">Entrega Aprox.</th>
                                    <td class="">{{ App\Main::humanDate($orden->spected_delivery_date) }}</td>
                                </tr>
                                <tr>
                                    <th class="">Enviar a</th>
                                    <td class="">
                                        {{ $place->address_line_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="">Fecha de compra</th>
                                    <td class="">{{ App\Main::humanDate($orden->created_at) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card no-border bg-primary">
                            <div class="card-header">Estado: <span class="badge badge-warning">{{ __($orden->getStatus()) }}</span></div>
                            
                                <table class="table table-dark bg-navi pb-0 mb-0">
                                    {{-- <tr>
                                        <th>Subtotal</th>
                                        <td>{{</td>
                                    </tr> --}}
                                    {{-- <tr>
                                        <th>Total</th>
                                        <td>{{ App\Cart::mformat($orden->total )}}</td>
                                    </tr> --}}
                                </table>
    
                            
                        </div>
                    </div>
                </div>
                
                <div class="row my-2">
                    <div class="col-12">
                        <table class="table table-hover table-striped thead-dark">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="">Cantidad</th>
                                    <th class="">Detalle</th>
                                    <th class="">Precio Unitario</th>
                                    <th class="">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orden->products()->where('store_id', $store->id)->get() as $item)
                                <tr>
                                    <td class="">{{ $item->pivot->quantity }}</td>
                                    <td class="">
                                        <img src="{{ $item->thumbnail }}" class="product-list-preview float-right">
                                        <a href="javascript:void(0)">{{ $item->title }}</a>
                                        {{-- <div class="text-muted">
                                            16GB<br>
                                            Core i5<br>
                                            320GB SSD<br>
                                            Color: Negro<br>
                                        </div> --}}
                                    </td>
                                    <td class="">{{ App\Cart::mformat($item->price )}}</td>
                                    @php
                                    $ptotal = intval($item->pivot->quantity) * intval($item->price);
                                    @endphp
                                    <td class="">
                                        {{ App\Cart::mformat($ptotal) }}
                                    </td>
                                </tr>
                                @empty 
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection
