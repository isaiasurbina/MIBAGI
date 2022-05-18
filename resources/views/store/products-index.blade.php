@extends('layouts.store')

@section('content')
<div class="py-4 px-2">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                Productos
            </div>
            <hr class="hr mt-2 mb-3" />
            <div class="toolbar my-3">
                <a href="{{ route('store.catalog.add') }}" class="btn btn-sm btn-dark">Agregar nuevo producto</a>
            </div>
            <div class="table-container">
                <table class="table table-striped table-borderless">
                    <thead>
                        <tr class="bg-primary">
                            <th class="text-orange">Imagen</th>
                            <th class="text-orange product-col">Producto</th>
                            <th class="text-orange">Estado</th>
                            <th class="text-orange text-center">Precio</th>
                            <th class="text-orange text-center">Existencias</th>
                            {{-- <th>Estado</th> --}}
                            <th class="text-orange text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($products as $item)   
                        @php
                        $link = route('product.single', [ 'product' => Str::upper(md5($item->id)) ]) ;
                        @endphp
                        <tr>
                            <td><img src="{{ $item->thumbnail }}" class="product-list-preview" /></td>
                            <td class="product-col">
                                {{ $item->title }}
                            </td>
                            
                            <td>
                                <span class="badge badge-{{ $item->status_class }}">{{ $item->status_label }}</span>
                            </td>
                            <td class="text-center"> US${{ number_format(intval($item->price) / 100,2) }}</td>
                            <td class="text-center">{{ $item->stock }}</td>
                            {{-- <td>{{ $item->title }}</td> --}}
                            <td class="text-center">
                                @if($item->status == 'PUBLISHED')
                                <a href="{{ $link }}" target="_blank" class="btn btn-sm btn-dark" title="Ver en la tienda" alt="Ver en la tienda"><i class="fas fa-eye"></i></a>
                                @endif
                                {{-- <a href="javascript:void(0)" class="btn btn-warning " title="Eliminar?"><i class="fas fa-trash"></i></a> --}}
                                <a href="{{ route('store.product.edit', ['id'=> md5($item->id) ]) }}" class="btn btn-sm btn-dark " title="Editar"><i class="fas fa-pencil-alt"></i></a>
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
