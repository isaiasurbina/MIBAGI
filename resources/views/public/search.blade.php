@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="section-title mb-3">
                <h5>Resultados para <span>{{ Request::get('sthis') ?? '*'}}</span></h5>
                @if(Request::get('in') != '')
                <p>Mostrando articulos en: <span class="text-warning">{{ $currentCategory->name }}</span></p>
                @endisset
            </div>
            <hr />

            @forelse ($products as $product)
                
            @empty
                <div class="grid">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6">
                            <div class="alert alert-info p-4">
                                <div class="row">
                                    <div class="col-10">
                                        No se encontraron productos con tu criterio de búsqueda. favor intenta modificando tus palabras clave o categoría.
                                    </div>
                                    <div class="col-2">
                                        <i class="far fa-tags fa-3x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
