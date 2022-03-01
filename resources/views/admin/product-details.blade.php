@extends('layouts.admin')

@section('content')
@push('head')
<link href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}" type="text/css" rel="stylesheet">
<script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
{{-- <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset('js/pages/store/ordersIndex.js')}}"></script> --}}
@endpush
<div class="py-4 px-2">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                Detalles del producto
            </div>
            <hr class="hr mt-2 mb-3" />
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary d-flex justify-content-center">
                            <div class="col">
                                Ficha del producto
                            </div>
                            <div class="col text-right">
                                @if ($product->status == 'ADDED')
                                <div class="badge badge-warning badge-pill">PENDIENTE</div>
                                @endif
                                @if ($product->status == 'PUBLISHED')
                                <div class="badge badge-success badge-pill">PUBLICADO</div>
                                @endif
                                @if ($product->status == 'NOT_AUTHORIZED')
                                <div class="badge badge-danger badge-pill">DENEGADO</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4 text-right">
                                <label class="text-strong">Tienda:</label>
                            </div>
                            <div class="col-8">
                                <label>
                                    {{ $product->store->name }}<br>
                                    <span class="text-muted">{{ $product->created_at }}</span>
                                </label>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-4 text-right">
                                <label class="text-strong">Título del producto:</label>
                            </div>
                            <div class="col-8">
                                <label>{{ $product->title }}</label>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-4 text-right">
                                <label class="text-strong">Descripción:</label>
                            </div>
                            <div class="col-8">
                                <label>{{ $product->description }}</label>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-4 text-right">
                                <label class="text-strong">Price:</label>
                            </div>
                            <div class="col-8">
                                <label>{{ $product->presentPrice() }}</label>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-4 text-right">
                                
                            </div>
                            <div class="col-7 text-right">
                                <a class="btn btn-secondary" href="{{ route('admin.stores.products.deny', ['r'=>md5($product->id)]) }}">Denegar</a>
                                <a class="btn btn-primary text-white" href="{{ route('admin.stores.products.publish', ['r'=>md5($product->id)]) }}">Públicar producto</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection