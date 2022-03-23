@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="section-title mb-3">
                <h5>Resultados para <span>{{ Request::get('sthis') ?? '*'}}</span></h5>
                @if(Request::get('in') != '')
                <p>Mostrando articulos en: <span class="text-warning">{{ $currentCategory->name }}</span></p>
                @endisset
            </div>
            <hr />

            <div class="grid">
                <div class="row">
                    @forelse ($products as $item)
                        {{-- @foreach ($store->products as $item) --}}
                        @php
                            $link = route('product.single', [ 'product' => Str::upper(md5($item->id)) ]) ;
                        @endphp
                        <div class="col-md-3">
                            <div class="card">
                                <a href="{{ $link }}">
                                    <div class="card-header-image" style="background-image: url('{{ env('APP_URL') . $item->thumbnail }}')"></div>
                                </a>
                                <div class="card-body">
                                    <div class="text-nowrap text-truncate">
                                        <a href="{{ $link }}" class="text-info" title="{{ $item->title }}">{{ $item->title }}</a>
                                    </div>
                                    <p class="card-text mb-0"><small class="text-muted">Vendido por <a class="text-orange" href="{{ route('product.store', [ 'store' => md5($item->store->id) ]) }}">{{ $item->store->name }}</a></small></p>
                                    <p class="card-text mt-0"><small class="text-success">US${{ number_format(intval($item->price) / 100,2) }}</small></p>
                                    <a href="javascript:void(0)" data-id="{{ $item->id }}" class="btn btn-primary btn-sm btn-block btn-add-to-bag">Agregar a mi bag</a>
                                </div>
                            </div>
                        </div>
                        {{-- @endforeach --}}
                    @empty
                        <div class="grid">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-10">
                                    <div class="alert alert-info p-4">
                                        <div class="row">
                                            <div class="col-10">
                                                No se encontraron productos con tu criterio de búsqueda. favor intenta modificando tus palabras clave o categoría.
                                            </div>
                                            <div class="col-2">
                                                <i class="far fa-tags fa-3x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            
            <hr />
            <div class="section-title mb-3">
                <h5>Resultados de negocios para <span>{{ Request::get('sthis') ?? '*'}}</span></h5>
            </div>
            <hr />

            @forelse ($stores as $store)
                <div class="col-md-2">
                    <div class="card">
                        <a href="{{ route('product.store', [ 'store' => md5($store->id) ]) }}">
                            <div class="card-header-image" style="background-image: url('{{ env('APP_URL') . $store->banner_url }}')"></div>
                        </a>
                        <div class="card-body">
                            <div class="text-nowrap text-truncate">
                                <a href="{{ route('product.store', [ 'store' => md5($store->id) ]) }}" class="text-info" title="{{ $store->name }}">{{ $store->name }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                
            @endforelse
        </div>
    </div>
</div>
@endsection
