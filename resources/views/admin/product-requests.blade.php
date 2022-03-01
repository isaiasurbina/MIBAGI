@extends('layouts.admin')

@section('content')
@push('head')
<link href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}" type="text/css" rel="stylesheet">
<script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset('js/pages/admin.js')}}"></script>

@endpush
<div class="py-4 px-2">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                Productos pendientes de aprobación<br>
                <small>Últimos 30 días</small>
            </div>
            <hr class="hr mt-2 mb-3" />
            
            <div class="table-container my-3">
                <table class="table table-borderless table-striped datatable">
                    <thead class="bg-primary">
                        <tr>
                            <th>Producto</th>
                            <th>Tienda</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($products_requests as $item)
                            <tr>
                                <td>
                                    <h6>
                                        {{ $item->title }}
                                    </h6>
                                    <div class="label-email">Aprobación pendiente</div>
                                    
                                </td>
                                <td class="text-center"><span class="">{{ $item->store->name ?? '' }}</span></td>
                                <td class="text-center"><span class="text-warning"><i class="fad fa-clock"></i> {{ $item->created_at ?? ''   }}</span></td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <a class="btn btn-primary" type="button" href="{{ route('admin.stores.products.approval', ['r'=>md5($item->id)]) }}">
                                        Ver
                                        </a>
                                        
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