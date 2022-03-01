@extends('layouts.app')

@section('content')
<div class="breadcrumb-area" style="background-image: url('{{ asset('img/demo/bg/slider/slider-3.png') }}')">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-4 py-5">
                <div class="card no-border mt-2 mb-5">
                    <div class="card-body" style="background: #f1f1f1;">
                        <div class="section-title">
                            <h4 class="my-3 text-center">{!! __('Ingresa a tu <span>cuenta</span>') !!}</h4>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="form-group">
                                <label for="email" class="form-label">{{ __('Correo electrónico') }}</label>
    
                                <div class="">
                                    <input id="email" type="email" class="form-control border-dark @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="password" class="">{{ __('Clave') }}</label>
    
                                <div class="">
                                    <input id="password" type="password" class="form-control border-dark @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Recordarme') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-warning text-white bg-orangered btn-block text-uppercase">
                                        <span></span> {{ __('Ingresar') }} <span></span>
                                    </button>
    
                                   
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-center">
    
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link btn-sm" href="{{ route('password.request') }}">
                                            {{ __('Olvide mi clave') }}
                                        </a>
                                    @endif
                                </div>
                            </div>                            
                        </form>
                    </div>
                    <div class="card-footer bg-dark">
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <small>Aún no tienes cuenta MIGABI?</small><br>
                                <a class="btn btn-light btn-block btn-sm my-3" href="{{ route('register') }}">
                                    {{ __('Crea una cuenta') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
