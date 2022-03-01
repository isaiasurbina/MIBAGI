@extends('layouts.app')

@section('content')
@push('head')
<link href="{{ asset('css/plugins/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />    
<script src="{{ asset('js/plugins/swiper-bundle.min.js') }}"></script>    
<script src="{{ asset('js/pages/product.js') }}"></script>    
@endpush
<div class="py-5 gray-page-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    {{-- <div class="alert-icon">
                        <i class="fal fa-exclamation-circle"></i>
                    </div> --}}
                    <div class="alert-text text-center">
                        <div class="p-3">
                            <h3 class="mt-1 mb-4"><i class="fad fa-unlink"></i></h3>
                            Lo sentimos. La dirección web que has especificado no es una página activa de nuestro sitio.  
                            <div class="text-center mt-3">
                                <a class="btn btn-dark" href="{{ route('welcome') }}">Volver al inicio de mibagi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
