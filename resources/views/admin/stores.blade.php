@extends('layouts.admin')

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
                Negocios
            </div>
            <hr class="hr mt-2 mb-3" />
            
            <div class="table-container my-3">
                <table class="table table-borderless table-striped datatable">
                    <thead class="bg-primary">
                        <tr>
                            <th>Negocio</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($stores as $item)
                            <tr>
                                <td>
                                    <h6>
                                        {{ $item->name }}
                                    </h6>
                                    <div class="label-email">{{ $item->user->email ?? '' }}</div>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-warning dropdown-toggle" type="button" id="product-actions-2356295620" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                        </button>
                                        {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('admin.stores.gen', ['r'=>md5($item->id)]) }}">Crear tienda</a>
                                            <a class="dropdown-item" href="{{ route('admin.stores.deny', ['r'=>md5($item->id)]) }}">Denegar</a>
                                        </div> --}}
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