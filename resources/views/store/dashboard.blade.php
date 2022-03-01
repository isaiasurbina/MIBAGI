@extends('layouts.store')

@section('content')
<div class="py-4 px-2">
    <small>{{ $store->name }}</small>
    <hr class="mt-1 mb-3">
    <div class="row">
        <div class="col-md-3">
            <div class="card no-border">
                <div class="card-header bg-primary ">
                    Ordenes
                </div>
                <div class="list-group">
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        Pendientes
                        <span class="badge badge-primary badge-pill">{{ $pending_orders }}</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        No enviadas
                        <span class="badge badge-primary badge-pill">{{ $sending_orders }}</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        Retornos
                        <span class="badge badge-primary badge-pill">{{ $return_orders }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            {{-- <div class="card no-border">
                <div class="card-header bg-primary ">
                    Resument de ventas
                </div>
                <div class="list-group">
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        Ahora
                        <span class="badge badge-primary badge-pill">$0.00</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        7 Días
                        <span class="badge badge-primary badge-pill">$0.00</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        15 Días
                        <span class="badge badge-primary badge-pill">$0.00</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        30 Días
                        <span class="badge badge-primary badge-pill">$0.00</span>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="col-md-6">
            {{-- <div class="card no-border">
                <div class="card-header bg-primary">
                    <div class="d-flex justify-content-between">
                        Pagos
                        <a href="javascript:void(0)" class="btn-link btn-sm text-light">Ver todo</a>
                    </div>
                </div>
                <div class="list-group">
                    <div class="list-group-item d-flex justify-content-between align-items-center bg-lightblue rounded-0">
                        <span class="text-primary">Balance</span>
                        <span class="badge badge-primary badge-pill">$152.30</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        RETIRO
                        <span class="badge badge-danger badge-pill">- $500</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        RETIRO
                        <span class="badge badge-danger badge-pill">- $500</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        Abono pago por producto [SWITH CONTROLLER]
                        <span class="badge badge-success badge-pill">+ $43.25</span>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>

@endsection
