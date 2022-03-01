@extends('layouts.app')

@section('content')
<div class="gray-page-bg">
    <div class="container py-5">
        <div class="section-title mb-3">
            <small><a href="{{route('home') }}">Mi cuenta</small>
            <h4 class="mt-1">Tu <span>cuenta</span></h4>
        </div>
        <div class="row">
                @foreach ($links as $item)
                <div class="col-xl-4 col-lg-4 col-md-6 mt-3">
                    <a href="{{route($item->link)}}" class="d-block f-height account-option-block text-center">
                        <div class="row align-items-center">
                            <div class="col-2"><i class="fal fa-2x {{ $item->icon }}"></i></div>
                            <div class="col-10">
                                <div class="text-left">
                                    <h5>{{ $item->title }}</h5>
                                    <small class="text-muted">{{ $item->desc }}</small>
                                </div>
                            </div>
                        </div>
                        
                        
                    </a>
                </div>
                    
                @endforeach

                @if ($hasStore)
                <div class="col-xl-4 col-lg-4 col-md-6 mt-3">
                    <a href="{{route('store.dashboard')}}" class="d-block bg-primary f-height account-option-block text-center">
                        <div class="row align-items-center">
                            <div class="col-2"><i class="fal fa-inverse fa-2x fa-store"></i></div>
                            <div class="col-10">
                                <div class="text-left">
                                    <h5 class="text-white">Administrar negocio</h5>
                                    <small class="text-white">Administra tu negocio Mibagi</small>
                                </div>
                            </div>
                        </div>
                        
                        
                    </a>
                </div>
                    
                @endif

        </div>
    </div>
</div>
@endsection
