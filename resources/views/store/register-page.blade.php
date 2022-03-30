@extends('layouts.app')

@section('content')

@push('head')
<script src="{{ asset('js/plugins/inputmask.jquery.js') }}"></script>
<script src="{{ asset('js/pages/store-request.js') }}"></script>
@endpush
<div class="bg-dark">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="section-title mb-3">
                            @if ($showForm)
                                <h4 class="mt-1">Registra tu <span>negocio</span></h4>
                                <p>Ingresa tus datos para ponernos en contacto contigo y evaluar tu solicitud.</p>
                            @else
                                <h5 class="mt-1">Registro de tu <span>negocio exitoso.</span></h5>
                                <hr class="primary my-3" />
                            @endif
                        </div>
                        @if ($showForm)
                            @if ($errors->any())
                                <div class="alert alert-danger p-3">
                                    <ul>
                                        {{-- @foreach ($errors->all() as $error) --}}
                                            <li>Completar campos requeridos</li>
                                        {{-- @endforeach --}}
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('store.registerRequest') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <div class="form-container">
                                                <div class="form-group p-1">
                                                    <label for="fullname">Nombre completo</label>
                                                    <input type="text" name="fullname" readonly id="fullname" value="{{ $user->name }}" class="form-control @error('fullname') is-invalid @enderror">
                                                    @error('fullname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>El nombre completo es requerido</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group p-1">
                                                    <label for="email">Correo electrónico</label>
                                                    <input type="text" name="email" id="email" readonly value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" >
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>El campo es requerido</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group p-1">
                                                    <label for="store_name">Nombre de la tienda *</label>
                                                    <input type="text" name="store_name" id="store_name" value="{{ old('store_name') }}" class="form-control @error('store_name') is-invalid @enderror">
                                                    @error('store_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>El nombre de la tienda es requerido</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group p-1">
                                                    <label for="store_desc">Descripción de tu negocio *<br>
                                                        <small class="text-muted">Describenos de una forma breve como funciona tu negocio/tienda.</small>
                                                    </label>
                                                    
                                                    <textarea name="store_desc" id="store_desc" class="form-control @error('store_desc') is-invalid @enderror">{{ old('store_desc') }}</textarea>
                                                    @error('store_desc')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>La descripción de la tienda es requerida</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group p-1">
                                                    <label for="pais">País *</label>
                                                    <select class="custom-select" name="pais" id="pais">
                                                        <option value="">Seleccionar...</option>
                                                        @foreach ($countries as $item)
                                                            <option {{ ($item->code=='sv') ? 'selected':''  }} value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('pais')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>El campo es requerido</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                {{-- <div class="form-group p-1">
                                                    <label for="ciudad">ciudad</label>
                                                    <select name="ciudad" id="ciudad">
                                                        <option value="">Seleccionar...</option>
                                                        @foreach ($cities as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach 
                                                    </select>
                                                    @error('ciudad')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>El campo es requerido</strong>
                                                        </span>
                                                    @enderror
                                                </div>  --}}
                                                <div class="form-group p-1">
                                                    <label for="celular">Celúlar *</label>
                                                    <input type="text" name="celular" id="celular"  value="{{ old('celular') }}" class="form-control mask-phone @error('celular') is-invalid @enderror">
                                                    @error('celular')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>El campo es requerido</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group p-1">
                                                    <label for="enlace">URL de la tienda</label>
                                                    <input type="text" name="enlace" id="enlace"  value="{{ old('enlace') }}" class="form-control @error('enlace') is-invalid @enderror">
                                                    <small class="text-muted">Facebook, Instagram o Sitio web</small>
                                                    @error('enlace')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>El campo es requerido</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-group p-1 text-center">
                                                    <button type="submit" class="btn btn-warning text-uppercase">Aceptar y enviar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @else
                            
                            <p>
                                Se ha enviado tu información al departamento de validación de tienda de Migabi, 
                                pronto te estara contactando un agente para ayudarte con la creación de tu tienda en Migabi.
                            </p>
                            <p>
                                <span class="text-strong">Mientras esperas</span> puedes conocer como administrar tu tienda para acelerar tus ventas y vender tus productos en Mibagi.
                                
                            </p>
                             <div class="text-center">  
                            <iframe class="my-5" width="560" height="315" src="https://www.youtube.com/embed/xcJtL7QggTI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
