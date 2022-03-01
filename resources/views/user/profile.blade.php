@extends('layouts.app')

@section('content')
@push('head')
<link href="{{ asset('css/plugins/gijgo.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/plugins/gijgo.min.js') }}"></script>
<script src="{{ asset('js/plugins/inputmask.jquery.js') }}"></script>
<script src="{{asset('js/pages/user/profile.js') }}"></script>
@endpush
<div class="gray-page-bg">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="section-title mb-3">
                    <small><a href="{{route('home') }}">Mi cuenta</a> > Editar perfil</small>
                    <h4 class="mt-1">Editar <span>perfil</span></h4>
                </div>
                <form action="{{ route('user.profile.save') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="list-group mb-4">
                                <div class="list-group-item">
                                    <div class="form-group p-1">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" name="fullname" id="fullname" class="form-control @error('fullname') is-invalid @enderror" value="{{ $user->name }}">
                                        @error('fullname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>El nombre completo es requerido</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group p-1">
                                        <label for="nombre">Correo Electrónico</label>
                                        <input type="text" readonly class="form-control" value="{{ $user->email }}" />
                                    </div>
                                    <div class="form-group p-1">
                                        <label for="nombre">Número de teléfono móvil</label>
                                        <input type="text" data-inputmask="'mask': '(999) 9{7,8}'"  name="phone" class="form-control mask" value="{{ $uFields->phone ?? '' }}" />
                                    </div>
                                    <div class="form-group p-1">
                                        <label for="nombre">Fecha de nacimiento</label>
                                        <input type="text" class="form-control" name="birthday" autocomplete="off" id="birthday" value="{{ $uFields->birthday ?? '' }}" />
                                    </div>
                                    <div class="form-group p-1">
                                        <label for="nombre">Genero</label>
                                        <?php
                                        $current_gender = $uFields->gender ?? '';
                                        ?>
                                        <select class="form-control" name="gender">
                                            <option value="">{{__('Seleccionar...')}}</option>
                                            <option {{ $current_gender == 'H' ? 'selected':'' }} value="H">Hombre</option>
                                            <option {{ $current_gender == 'M' ? 'selected':'' }} value="M">Mujer</option>
                                        </select>
                                    </div>
                                    <div class="form-group p-1">
                                        <label for="nombre">Idioma</label>
                                        <?php
                                        $current_lang = $uFields->lang ?? '';
                                        ?>
                                        <select class="form-control" name="lang">
                                            <option {{ $current_lang == 'en' ? 'selected':'' }} value="en">English</option>
                                            <option {{ $current_lang == 'es' ? 'selected':'' }} value="es">Español</option>
                                        </select>
                                    </div>
                                    <div class="form-group p-1">
                                        <a href="{{ route('password.request') }}" class="text-info">Cambiar clave</a>
                                    </div>
                                    <div class="form-group p-1 text-right">
                                        <button type="submit" class="btn btn-success text-uppercase">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
            </div>
        </div>
    </div>
</div>
@endsection
