@extends('layouts.app')

@section('content')
@php
    $banners = json_decode($currentCategory->banners);
    
@endphp
@if ($banners)
    @if ($banners->main)
        <div class="category-page-bg">
            <div class="py-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cat-banner pb-0">
                            {{-- <h1 class="pt-5">{{ $currentCategory->name }}</h1> --}}
                            <img src="{{ asset($banners->main) }}" class="bn-category" alt="{{ $currentCategory->name }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        
    @endif
@else
    <div class="section-title p-3 category-title">
        <h4 class="text-navi">{{ $currentCategory->name }}</h4>
    </div>
@endif
<div class="col-12 p-3">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card mb-3">
                <div class="categories-container p-2">
                    @foreach ($relatedCategories as $item)
                        <a href="{{ route('product.category', ['category' => $item->slug ]) }}" class="d-block"><small>{{ $item->name }}</small></a>
                    @endforeach
                    
                </div>
            </div>
            @if ($currentCategory->filters)
            @foreach ($currentCategory->filters as $filter)
                <hr>    
                <div class="brand-filters">
                    <h6>{{ $filter->name }}</h6>
                    @php
                     $options = explode(',', $filter->values);
                    @endphp
                    @foreach ($options as $option)
                    @php 
                    list($text,$value) = explode('|', $option );
                    @endphp
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="{{$value}}" name="example1">
                        <label class="custom-control-label" for="{{$value}}">{{$text}}</label>
                    </div>
                    @endforeach
                </div>
                @endforeach
            @endif
            
        </div>
        <div class="col-md-10">
            <div class="row">
                @if (count($currentCategory->products) > 0 )  
                    @foreach ($currentCategory->products as $item)
                    @php
                        $link = route('product.single', [ 'product' => Str::upper(md5($item->id)) ]) ;
                    @endphp
                    @if ($item->status == 'PUBLISHED')
                        
                    <div class="col-md-3">
                        <div class="card">
                            <a href="{{ $link }}">
                                <div class="card-header-image" style="background-image: url('{{ $item->thumbnail }}')"></div>
                            </a>
                            <div class="card-body">
                                <div class="text-nowrap text-truncate">
                                    <a href="{{ $link }}" class="text-info" title="{{ $item->title }}">{{ $item->title }}</a>
                                </div>
                                <p class="card-text mb-0"><small class="text-muted">Vendido por <a class="text-orange" href="javascript:void(0)">{{ $item->store->name }}</a></small></p>
                                <p class="card-text mt-0"><small class="text-success">US${{ number_format(intval($item->price) / 100,2) }}</small></p>
                                <a href="javascript:void(0)" data-id="{{ $item->id }}" class="btn btn-primary btn-sm btn-block btn-add-to-bag">Agregar a mi bag</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                @else
                    <div class="col-md-6">
                        <div class="alert alert-warning">
                            <div class="alert-icon"><i class="fad fa-exclamation-triangle"></i></div>
                            <div class="alert-text">Lo sentimos, no se encontraron productos con tu criterio de busqueda.</div>
                        </div>
                    </div>
                @endif
                
            </div>
            
            
        </div>
    </div>
</div>
@endsection
