@extends('layouts.store')

@section('content')
@push('head')
<link href="{{ asset('css/messages/style.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('css/plugins/Chart.min.css') }}" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('css/plugins/croppie.css') }}" type="text/css" />
<script src="{{ URL::asset('js/plugins/croppie.min.js') }}"></script>
<script src="{{asset('js/pages/store/img-upload-store-banner.js') }}"></script>
@endpush
<div class="py-4 px-2">
    <div class="row justify-content-center">
        <div class="col-md-8 my-3">
            <div class="card no-border">
                <div class="card-header bg-primary text-warning">
                    Información sobre negocio
                </div>
                <div class="store-banner">
                    <input type="hidden" name="save_banner_url" value="{{ route('store.profile.save_banner_url') }}">
                    <div id="thumbnail-card-1" class="card thumbnail-card store-banner thumbnail-card-1 {{ ($store->banner != true) ? '':'has-image' }}" >
                        <div class="img-container">
                            @if($store->banner)
                                <a class="btn btn-link btn-sm btn-dark delete-image"><i class="fal fa-times fa-inverse"></i></a>
                                <img src="{{ $store->banner_url }}" class="product-thumbnail">
                                <input type="hidden" name="images[]" value="{{ $store->banner }}">
                             @endif   
                        </div>
                        <div class="card-body text-center">
                            <a href="javascript:void(0)" class="btn-block text-center" data-toggle="modal" data-target="#upload_photo">
                                <i class="fad fa-cloud-upload-alt fa-2x"></i><br>
                                <small>Seleccionar foto para el banner de tu tienda</small>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="get">
                        @csrf
                        <div class="form-group">
                            <label for="">Nombre de tu negocio</label>
                            <input type="text" class="form-control" name="business-name" value="{{ $store->name }}" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Dirección</label>
                            <input type="text" class="form-control" name="business-address" value="" id="">
                        </div>
                        <div class="form-group">
                            <label for="">E-mail de contacto</label>
                            <input type="text" class="form-control" name="business-address" value="{{ $user->email }}" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Nombre de contacto</label>
                            <input type="text" class="form-control" name="business-address" value="{{ $user->name }}" id="">
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-warning">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card no-border">
                <div class="card-header bg-primary text-warning">
                    Información sobre pagos
                </div>
                <div class="list-group">
                    <a href="javascript:void(0)" class="list-group-item d-flex justify-content-between">
                        Metodos de retiro
                        <i class="fal fa-chevron-right"></i>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item d-flex justify-content-between">
                        Metodos de pago
                        <i class="fal fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- modal --}}
<div id="upload_photo" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content no-border">
        <div class="card-body p-0">
            <div class="container image-selection">
                <div class="row">
                    <div class="col-sm-12 bg-light">
                        <h6 class="mt-3">{{__('Selecciona una imagen para el banner de tu tienda')}}</h6>
                        <hr>
                        <div class="form-group text-center">
                            <label>{{__('1500px x 300px requerido para banner')}}</label>
                        </div>
                        <div class="form-group text-center">
                            <label for="image-selector" class="btn btn-primary">{{__('Seleccionar imagen')}}</label>
                            <input id="image-selector" class="form-control bg-light border-dark invisible" type="file">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container image-cropper d-none">
                <div class="row">
                    <div class="col-sm-12 bg-light">
                        <h6 class="mt-3">{{__('Recortar imagen')}}</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 bg-light text-center">
                        <div id="cropper-image">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 bg-light text-center">
                        <div class="form-group">
                            @csrf
                            <input type="hidden" name="upload" value="{{ route('upload.data')}}">
                            {{-- <input type="hidden" name="urlav" value="{{ route('avatar.save')}}"> --}}
                            <button id="btn-change" class="btn btn-secondary" type="button">{{__('Cambiar')}}</button>
                            <button id="btn-done" class="btn btn-warning btn-loader" type="button">
                                <i class="fad fa-spinner-third fa-spin"></i>
                                {{__('Cortar y Guardar')}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-dark">
          <button type="button" id="btn-close-modal" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          {{-- <button type="button" class="btn btn-warning" data-dismiss="modal">Listo</button> --}}
        </div>
      </div>
    </div>
</div>
@endsection
