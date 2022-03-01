@extends('layouts.store')

@section('content')
@push('head')
<link href="{{ asset('css/plugins/Chart.min.css') }}" type="text/css" rel="stylesheet">
<script src="{{ asset('js/plugins/Chart.min.js') }}"></script>
<script src="{{asset('js/pages/store/reports.js')}}"></script>
@endpush
<div class="py-4 px-2">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                Reportes para GamingLaptopsSV
            </div>
            <hr class="hr mt-2 mb-3" />
            
            <div class="row my-2">
                <div class="col-md-4">
                    <div class="card no-border">
                        <div class="card-header">Productos más vistos</div>
                        <div class="card-body">
                            <div class="product-views-chart-container">
                                <canvas id="product-views-chart"></canvas>
                            </div>    
                        </div>
                                           
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card no-border">
                        <div class="card-header">Ventas por producto <span class="text-muted">(Últimos 3 meses)</span></div>
                        <div class="card-body">
                            <div class="product-sales-chart-container">
                                <canvas id="product-sales-chart"></canvas>
                            </div> 
                        </div>                     
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-md-8">
                    <div class="section-title"></div>
                    <div class="card">
                        <div class="card-header">
                            Detalle de ventas Últimos 3 meses
                        </div>
                        <div class="card-body">
                            <div class="sales-chart-container">
                                <canvas id="sales-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Ratings
                        </div>
                        <div class="card-body">
                            <p>Ratings recibidos por los compradores de tus productos en general.</p>
                            <p>
                                <span>Positivo: 4 - 5 Estrellas</span><br>
                                <span>Neutral: 3 Estrellas</span><br>
                                <span>Negativo: 1 - 2 Estrellas</span>
                            </p>
                        </div>
                        <div class="rating-chart-container">
                            <canvas id="ratings-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</div>

@endsection
