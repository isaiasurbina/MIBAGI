@extends('layouts.app')

@section('content')
<div class="breadcrumb-area common-page-bg">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <div class="section-title my-4 text-center">
                            <h4>Verifica tu <span>identidad</span></h4>
                        </div>
                        @if (session('resent'))
                            <div class="alert alert-success p-3 my-3" role="alert">
                                {{ __('Se ha enviado un correo nuevo para verificar tu dirección de correo electrónico') }}
                            </div>
                        @endif

                        <p>{{ __('Antes de proceder, favor verifica tu identidad, se ha enviado un mensaje para verificar tu dirección de correo electrónico.') }}
                        </p>
                        <p>Si no has recibido el correo de activación, haz clic en el siguiente boton para solicitar un nuevo mensaje de verificación.</p>
                        <form class="d-block text-center" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-warning text-white">{{ __('REENVIAR') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
