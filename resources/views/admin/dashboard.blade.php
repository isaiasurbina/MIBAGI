@extends('layouts.admin')

@section('content')
<div class="main pt-3">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="p-3 card-title d-flex justify-content-between">
                    NEGOCIOS
                    <i class="fad fa-store"></i>
                </div>
                <div class="card-content">
                    <div class="list-group">
                        <a href="{{ route('admin.stores.requests') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            Aprobaciones                    
                            <span class="badge badge-primary badge-pill">{{ $storePendingRequest }}</span>
                            
                        </a>
                        <a href="{{ route('admin.stores') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            Negocios
                            <span class="badge badge-primary badge-pill">{{ $storeCount }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="p-3 card-title d-flex justify-content-between">
                    PRODUCTOS
                    <i class="fad fa-box-full"></i>
                </div>
                <div class="card-content">
                    <div class="list-group">
                        <a href="{{ route('admin.stores.requests') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            Aprobaciones pendientes               
                            <span class="badge badge-primary badge-pill">{{ $productPendingRequest }}</span>
                            
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            {{-- <div class="card">
                <div class="p-3 card-title d-flex justify-content-between">
                    DRIVERS
                    <i class="fad fa-truck"></i>
                </div>
                <div class="card-content">
                    <div class="list-group">
                        <a href="{{ route('admin.stores.requests') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            Aprobaciones pendientes               
                            <span class="badge badge-primary badge-pill">14</span>
                            
                        </a>
                        
                    </div>
                </div>
            </div> --}}
        </div>
        
    </div>
</div>
@endsection