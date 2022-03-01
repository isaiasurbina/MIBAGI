@extends('layouts.admin')

@section('content')
@push('head')
<link href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}" type="text/css" rel="stylesheet">
<script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset('js/pages/store/ordersIndex.js')}}"></script>
@endpush
<div class="py-4 px-2">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                Generar cuenta de negocio
            </div>
            <hr class="hr mt-2 mb-3" />
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary">
                            Datos del negocio
                        </div>
                        <form class="form" method="post" action="{{ route('admin.stores.save') }}">
                            @csrf
                            <input type="hidden" name="stRequestID" value="{{ $request->id }}" />
                            <div class="list-group">
                                <div class="list-group-item bg-light">
                                    <label for="">Nombre de la tienda</label>
                                    <input type="text" name="store_name" id="" value="{{ $request->store_name }}" class="form-control" >
                                </div>
                                <div class="list-group-item list-group-divider">
                                    <div class="text-uppercase">Datos del contacto</div>
                                    <small>Datos de la cuenta asociada</small>
                                </div>
                                <div class="list-group-item">
                                    <label for="">Nombre</label>
                                    <input type="text" readonly name="store_user_name" value="{{ $request->fullname }}" id="" class="form-control" >
                                </div>
                                <div class="list-group-item">
                                    <label for="">Correo electrónico</label>
                                    <input type="text" name="store_user_email" readonly value="{{ $request->email }}" id="" class="form-control" >
                                </div>
                                <div class="list-group-item text-center">
                                    <button type="submit" class="btn btn-primary">Generar tienda</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection