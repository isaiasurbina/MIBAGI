@extends('layouts.app')

@section('content')
<div class="gray-page-bg">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="section-title mb-3">
                    <small><a href="{{route('home')}}">Mi cuenta</a> > Direcciones de entrega</small>
                    <h4 class="mt-1">Direcciones de <span>entrega</span></h4>
                    <small><a href="{{ route('user.places.new')}}">Agregar nueva</a></small>
                </div>
                <div class="places-container row">
                    @foreach ($places as $place)
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-header text-dark">
                                    <i class="fal fa-map-marker-alt"></i>
                                    {{$place->title}}
                                </div>
                                <div class="card-body">
                                    {{$place->user_name ?? '' }}
                                    <div class="text-nowrap text-truncate">{{$place->address_line_1}}</div>
                                    {{$place->city->name }}<br>
                                    {{$place->phone }}<br>
                                </div>
                                <div class="card-footer text-right">
                                    {{-- recordar editar y eliminar solo direcciones del usuario --}}
                                    <a href="{{ route('user.places.edit', ['n'=> $place->id ]) }}" title="Editar" class="btn btn-link text-dark"><i class="fal fa-edit"></i></a>
                                    <a href="{{ route('user.places.delete', ['n'=> $place->id ]) }}" title="Eliminar" class="btn btn-link text-danger"><i class="fal fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
