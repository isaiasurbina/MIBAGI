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
                Detalles de la solicitud de apertura de negocio
            </div>
            <hr class="hr mt-2 mb-3" />
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary">
                            Datos del negocio
                        </div>
                        <div class="row mt-3">
                            <div class="col-4 text-right">
                                <label class="text-strong">Contacto:</label>
                            </div>
                            <div class="col-8">
                                <label>
                                    {{ $request->fullname }}<br>
                                    <span class="text-muted">{{ $request->email }}</span> - <span class="text-muted">{{ $request->phone }}</span>
                                </label>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-4 text-right">
                                <label class="text-strong">Nombre de la tienda:</label>
                            </div>
                            <div class="col-8">
                                <label>{{ $request->store_name }}</label>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-4 text-right">
                                <label class="text-strong">Descripción:</label>
                            </div>
                            <div class="col-8">
                                <label>{{ $request->store_desc }}</label>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-4 text-right">
                                <label class="text-strong">Referencia:</label>
                            </div>
                            <div class="col-8">
                                <label>{{ $request->url }}</label>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-4 text-right">
                                
                            </div>
                            <div class="col-7 text-right">
                                <a class="btn btn-secondary" href="{{ route('admin.stores.deny', ['r'=>md5($request->id)]) }}">Denegar</a>
                                <a class="btn btn-primary text-white" href="{{ route('admin.stores.gen', ['r'=>md5($request->id)]) }}">Crear tienda</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection