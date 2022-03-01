@extends('layouts.store')

@section('content')
@push('head')
<link href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}" type="text/css" rel="stylesheet">
<script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset('js/pages/store/ordersIndex.js')}}"></script>
@endpush
<div class="py-4 px-2">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                Ordenes<br>
                <small>Últimos 30 días</small>
            </div>
            <hr class="hr mt-2 mb-3" />
            <div class="row my-2">
                <div class="col-md-3">
                    <select id="bystatus" name="" class="custom-select" id="">
                        <option value="">Todas</option>
                        <option value="Completada">Completadas</option>
                        <option value="Enviada">Enviadas</option>
                        <option value="Pendiente">Pendientes</option>
                        <option value="Cancelada">Canceladas</option>
                    </select>
                </div>
            </div>
            <div class="table-container my-3">
                <table class="table table-borderless table-striped datatable">
                    <thead class="bg-primary">
                        <tr>
                            <th>Fecha</th>
                            <th>Número</th>
                            <th class="text-center">Envío</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($orders as $item)
                        <tr>
                            <td>{{$item->created_at}}</td>
                            <td><a href="{{ route('store.order.detail', ['order'=>$item->number]) }}" class="btn text-warning btn-link">#{{ $item->number }}</a></td>
                            <td class="text-center"><span class="">Estandar</span></td>
                            <td class="text-center"><span class="text-warning"><i class="fad fa-clock"></i> Pendiente</span></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-warning dropdown-toggle" type="button" id="product-actions-2356295620" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="{{ route('store.order.detail', ['order'=> $item->number ]) }}">Ver</a>
                                      <a class="dropdown-item" href="javascript:void(0);">Archivar</a>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                        @empty
                            
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
