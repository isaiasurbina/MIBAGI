@extends('layouts.store')

@section('content')
<div class="py-4 px-2">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                Detalle de orden #{{ $orden->number }}
            </div>
            <hr class="hr mt-2 mb-3" />
            <div class="row my-2">
                <div class="col-md-3">
                    <a class="btn btn-warning btn-block" href="javascript:void(0)">Mensaje al comprador</a>
                </div>
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" id="product-actions-2356295620" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Acciones
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="javascript:void(0);">Imprimir etiqueta de envio</a>
                        <a class="dropdown-item" href="javascript:void(0);">Reembolso</a>
                        <a class="dropdown-item" href="javascript:void(0);">Cancelar</a>
                        <a class="dropdown-item" href="{{ route('store.orders') }}">Enviada</a>
                    </div>
                </div>
                <div class="col-md-3">
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-7">
                    <div class="table-container">
                        <table class="table table-dark">
                            <tr>
                                <th class="bg-primary">Tipo de envio</th>
                                <td class="bg-navi">Estandar</td>
                            </tr>
                            <tr>
                                <th class="bg-primary">Cuándo enviar</th>
                                <td class="bg-navi">{{ App\Main::humanDate($orden->date_to_send) }}</td>
                            </tr>
                            <tr>
                                <th class="bg-primary">Entrega Aprox.</th>
                                <td class="bg-navi">{{ App\Main::humanDate($orden->spected_delivery_date) }}</td>
                            </tr>
                            <tr>
                                <th class="bg-primary">Enviar a</th>
                                <td class="bg-navi">
                                    {{ $place->address_line_1 }}
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-primary">Fecha de compra</th>
                                <td class="bg-navi">{{ App\Main::humanDate($orden->created_at) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card no-border bg-primary">
                        <div class="card-header">Estado: <span class="badge badge-warning">Pendiente</span></div>
                        
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
                    <table class="table table-dark table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="bg-primary">Cantidad</th>
                                <th class="bg-primary">Detalle</th>
                                <th class="bg-primary">Precio Unitario</th>
                                <th class="bg-primary">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orden->products()->where('store_id', $store->id)->get() as $item)
                            <tr>
                                <td class="bg-navi">{{ $item->pivot->quantity }}</td>
                                <td class="bg-navi">
                                    <img src="{{ $item->thumbnail }}" class="product-list-preview float-right">
                                    <a href="javascript:void(0)">{{ $item->title }}</a>
                                    {{-- <div class="text-muted">
                                        16GB<br>
                                        Core i5<br>
                                        320GB SSD<br>
                                        Color: Negro<br>
                                    </div> --}}
                                </td>
                                <td class="bg-navi">{{ App\Cart::mformat($item->price )}}</td>
                                @php
                                $ptotal = intval($item->pivot->quantity) * intval($item->price);
                                @endphp
                                <td class="bg-navi">
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

@endsection
