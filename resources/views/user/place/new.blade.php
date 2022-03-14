@extends('layouts.app')

@section('content')

@push('head')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDP49hnVIMTEI3ZjKo7c3K_0WlJMKlGag&callback=initMap&libraries=&v=weekly" defer></script>
<script src="{{ asset('js/pages/new-place.js') }}"></script>
@endpush
<div class="gray-page-bg">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="section-title mb-3">
                    <small><a href="{{route('home')}}">Mi cuenta</a> > <a href="{{route('user.places')}}">Direcciones de entrega</a> > Nueva dirección</small>

                    @if ($edit)
                        <h4 class="mt-1">Modificar <span>dirección de entrega</span></h4>
                    @else
                        <h4 class="mt-1">Agregar <span>dirección de entrega</span></h4>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <div class="alert-icon">
                                <i class="fal fa-engine-warning"></i>
                            </div>
                            <div class="alert-text">
                                Todos los campos con <span class="text-danger">*</span> son requeridos.
                            </div>
                        </div>
                    @endif

                    <form action="{{route('user.places.save')}}" method="post" class="frm-new-place form mt-3">
                        @csrf
                        @if ($edit)
                            <input type="hidden" name="pid" name="pid" value="{{ $place->id }}">
                        @endif
                        <div class="form-group">
                            <label>Nombre de la dirección <span class="text-danger">*</span></label>

                            {{-- edit --}}
                            @if ($edit)
                            <input type="text" class="form-control" name="title" id="title" value="{{ $place->title ?? '' }}" placeholder="Ej: Casa, Oficina, etc...">
                            @else
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') ?? '' }}" placeholder="Ej: Casa, Oficina, etc...">
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Nombre de la persona que recibira el paquete</label>
                            {{-- edit --}}
                            @if ($edit)
                            <input type="text" class="form-control" name="user_name" id="user_name" value="{{ $place->user_name ?? '' }}">
                            @else
                            <input type="text" class="form-control" name="user_name" id="user_name" value="{{ old('user_name') ?? '' }}">
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Departamento <span class="text-danger">*</span></label>
                            <select class="form-control" name="state" id="state" data-service="{{route('api.places.getCities')}}">
                                <option value="">Seleccionar departamento...</option>
                                @foreach ($states as $item)
                                    @if ($edit)
                                        <option {{ ($item->hasCity($place->city_id)) ? 'selected': ''}} value="{{$item->id}}">{{$item->name}}</option>    
                                    @else
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endif
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Municipio <span class="text-danger">*</span></label>
                            @if ($edit)
                                <select class="form-control" name="city" id="city">
                                    <option class="no-replace" value="">Seleccionar municipio...</option>
                                    @foreach ($states as $item)
                                        @if($item->hasCity($place->city_id))
                                            @foreach ($item->cities as $city)
                                                <option {{ ($city->id == $place->city_id) ? 'selected': ''}} value="{{$city->id}}">{{$city->name}}</option>  
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            @else
                                <select class="form-control" name="city" id="city">
                                    <option class="no-replace" value="">Seleccionar municipio...</option>
                                </select>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Dirección <span class="text-danger">*</span></label>
                            
                            @if ($edit)
                            <input type="text" class="form-control" name="address_line_1" id="address_line_1" value="{{ $place->address_line_1 ?? '' }}" placeholder="Ej: Calle 23, Casa #10">
                            @else
                            <input type="text" class="form-control" name="address_line_1" id="address_line_1" value="{{ old('address_line_1') ?? '' }}" placeholder="Ej: Calle 23, Casa #10">                            
                            @endif
                            
                        </div>
                        <div class="form-group">
                            <label>Dirección linea 2</label>
                            @if ($edit)
                            <input type="text" class="form-control" name="address_line_2" id="address_line_2" value="{{ $place->address_line_2 ?? '' }}" placeholder="Ej: Block B">
                            @else
                            <input type="text" class="form-control" name="address_line_2" id="address_line_2" value="{{ old('address_line_2') ?? '' }}" placeholder="Ej: Block B">
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Teléfono / Celular <span class="text-danger">*</span></label>
                            @if ($edit)
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ $place->phone ?? '' }}"  placeholder="0000-0000">
                            @else
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') ?? '' }}"  placeholder="0000-0000">
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Instrucciones de entrega</label>
                            @if ($edit)
                            <textarea class="form-control" name="clue" id="clue" placeholder="Ej: Frente a la farmacia...">{{ $place->clue ?? '' }}</textarea>
                            @else
                            <textarea class="form-control" name="clue" id="clue" placeholder="Ej: Frente a la farmacia...">{{ old('clue') ?? '' }}</textarea>
                            @endif
                        </div>
                        <div class="form-group">
                            
                            @if ($edit)
                            <div id="place-map" data-latlng="{{ $place->latlng ?? '' }}"></div>
                            @else
                            <div id="place-map" data-latlng="13.690773, -89.2124077"></div>
                            @endif
                        </div>
                        @if ($edit)
                            <input type="hidden" id="latlng" name="latlng" value="{{ $place->latlng ?? '' }}" >
                        @else
                            <input type="hidden" id="latlng" name="latlng" value="{{ old('latlng') ?? '' }}" >
                        @endif
                        <div class="alert alert-info">
                            <div class="alert-icon">
                                <i class="fal fa-info"></i>
                            </div>
                            <div class="alert-text">
                                <h6 class="my-1"><small>Asegúrate de que tu dirección esté correcta</small></h6>
                                <p class="my-0 "><small>Si la dirección contiene errores tipográficos u otros, es posible que tu paquete no se pueda entregar.</small></p>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            @if ($edit)
                            <button type="submit" class="btn btn-dark">Guardar dirección</button>
                            @else
                            <button type="submit" class="btn btn-dark">Agregar dirección</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
