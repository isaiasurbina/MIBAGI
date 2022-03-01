@extends('layouts.store')

@section('content')
@push('head')
<link rel="stylesheet" href="{{ asset('css/plugins/jquery-ui.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ URL::asset('css/plugins/croppie.css') }}" type="text/css" />
<script src="{{ asset('js/plugins/jquery-ui.js') }}"></script>
<script src="{{ asset('js/plugins/inputmask.jquery.js') }}"></script>
<script src="{{asset('js/plugins/kebab.js') }}"></script>
<script src="{{ URL::asset('js/plugins/croppie.min.js') }}"></script>
<script src="{{asset('js/pages/store/product-add.js') }}"></script>
<script src="{{asset('js/pages/store/pro-img-upload.js') }}"></script>
@endpush
<div class="py-4 px-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card no-border rounded-0">
                <div class="card-header no-border rounded-0 pb-0 bg-primary">
                    <div class="section-title">
                        @if($edit)
                        Editar un producto
                        @else
                        Agregar un producto
                        @endif
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <nav class="nav nav-pills nav-justified wizard-step-tabs">
                                <a id="btn-basico" data-toggle="tab" href="#basico" class="nav-item rounded-0 nav-link active">Básico</a>
                                @if(!$edit)
                                <a id="btn-variaciones" data-toggle="tab" href="#variaciones" class="nav-item rounded-0 nav-link">Variaciones</a>
                                @endif
                                <a id="btn-precio" data-toggle="tab" href="#precio" class="nav-item rounded-0 nav-link">Precio</a>
                                <a id="btn-descripcion" data-toggle="tab" href="#desc" class="nav-item rounded-0 nav-link">Descripción</a>
                                <a id="btn-imagenes" data-toggle="tab" href="#imagenes" class="nav-item rounded-0 nav-link">Imagenes</a>
                                {{-- <a id="btn-busqueda" data-toggle="tab" href="#busqueda" class="nav-item rounded-0 nav-link">Busqueda</a> --}}
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-container">
                        <input type="hidden" id="variations_source" value="{{ route('api.store.products.get_variations') }}" />
                        <input type="hidden" id="rm-file-url" value="{{ route('rm-file') }}" />
                        <input type="hidden" name="categoriesURL" id="categoriesURL" value="{{ route('api.product.categories') }}">
                        <input type="hidden" name="brandsURL" id="brandsURL" value="{{ route('api.product.brands') }}">

                        <form action="{{ route('catalog.product.save') }}" method="post">
                            @csrf
                            @if($edit)
                                <input type="hidden" id="pid" name="pid" value="{{ md5($product->id) }}" />
                                <input type="hidden" id="edit" name="edit" value="true" />
                            @else
                                <input type="hidden" id="edit" name="edit" value="false" />
                            @endif

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="basico" role="tabpanel">
                                    <div class="p-5">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <div class="alert-text">
                                                    Todos los campos con * con requeridos, favor ingresar los campos requeridos.
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row my-2">
                                            <div class="col-md-3 offset-md-1 text-right">
                                                <label for="titulo"><b>Título</b> <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-md-6">
                                                @if(!$edit)
                                                    <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}" class="form-control">
                                                @else
                                                    <input type="text" name="titulo" id="titulo" value="{{ $product->title }}" class="form-control">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col-md-3 offset-md-1 text-right">
                                                <label for="marca"><b>Marca</b> </label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" id="brands" autocomplete="off" class="brands-autocomplete-helper form-control">    
                                                <div class="brands-container mt-2">
                                                    @if($edit)
                                                    @isset($product)
                                                        @foreach($product->brands()->get() as $brand)
                                                            <button data-id="{{ $brand->id }}" type="button" class="btn btn-sm btn-outline-info tag-item">
                                                                {{ $brand->name }} 
                                                                <i class="fal fa-times"></i>
                                                                <input type="hidden" name="brands[]" value="{{ $brand->id }}">
                                                            </button>
                                                        @endforeach
                                                    @endisset
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col-md-3 offset-md-1 text-right">
                                                <label for="manufacturer"><b>Fabricante</b></label>
                                            </div>
                                            <div class="col-md-6">
                                                @if(!$edit)
                                                    <input type="text" name="manufacturer" id="manufacturer" value="{{ old('manufacturer') }}" class="form-control">
                                                @else
                                                    <input type="text" name="manufacturer" id="manufacturer" value="{{ $product->fields->manufacturer ?? '' }}" class="form-control">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col-md-3 offset-md-1 text-right">
                                                <label for="categories"><b>Categoria</b> <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-md-6">
                                                
                                                <input type="text" id="categories" autocomplete="off" class="categories-autocomplete-helper form-control">    
                                                
                                                <div class="categories-container mt-2">
                                                    @if($edit)
                                                    @isset($product)
                                                        @foreach($product->categories()->get() as $cat)
                                                            <button data-id="{{ $cat->id }}" type="button" class="btn btn-sm btn-outline-info tag-item">
                                                                {{ $cat->name }} 
                                                                <i class="fal fa-times"></i>
                                                                <input type="hidden" name="cats[]" value="{{ $cat->id }}">
                                                            </button>
                                                        @endforeach
                                                    @endisset
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row my-3 pt-5">
                                            <div class="col-md-3 offset-md-1 text-right">
                                                
                                            </div>
                                            <div class="col-md-6 text-right">
                                                @if(!$edit)
                                                    <a class="btn btn-warning btn-next" data-target="btn-variaciones" href="javascript:void(0)" >Continuar ></a>
                                                @else
                                                    <a class="btn btn-warning btn-next" data-target="btn-precio" href="javascript:void(0)" >Continuar ></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="variaciones" role="tabpanel">
                                    
                                    <div class="p-5">
                                        <div class="row my-2 justify-content-center">
                                            <div class="col-md-9"><p>Las variaciones permiten a los compradores escoger entre colores, tamaños, tallas, etc. <br> Aprende mas sobre las variaciones <a target="_blank" href="{{ route('view', ['view' => 'variations']) }}"><b>aqui</b></a>.</p></div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-md-3 text-right">
                                                <label for="titulo"><b>{{__('Agregar variación')}}</b></label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" id="variations" autocomplete="off" class="variations-autocomplete-helper form-control">    
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-light btn-add-variation">{{__('Agregar')}}</button>
                                            </div>
                                        </div>
                                        <div id="variations-container" class="row my-3 justify-content-center"></div>
                                        <div class="row my-3 pt-5">
                                            <div class="col-md-3 offset-md-1 text-right">
                                                
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <a class="btn btn-primary btn-next" data-target="btn-precio" href="javascript:void(0)" >Continuar ></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="precio" role="tabpanel">
                                    <div class="p-5">
                                        <div class="row my-2">
                                            <div class="col-md-3 offset-md-1 text-right">
                                                <label for="titulo"><b>Precio</b> <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">$</span>
                                                    </div>
                                                    
                                                    @if(!$edit)
                                                        <input type="number" name="price" id="price" value="{{ old('price') }}" class="form-control" placeholder="Ej: 19.99">
                                                    @else
                                                        <input type="number" name="price" id="price" value="{{ $product->presentPrice(true) }}" class="form-control" placeholder="Ej: 19.99">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-md-3 offset-md-1 text-right">
                                                <label for="existencias"><b>Existencias</b> <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-md-3">
                                                @if(!$edit)
                                                    <input type="text" name="existencias" id="existencias" value="{{ old('existencias') }}" class="form-control" placeholder="99">
                                                @else
                                                    <input type="text" name="existencias" id="existencias" value="{{ $product->stock }}" class="form-control" placeholder="99">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row my-3 pt-5">
                                            <div class="col-md-3 offset-md-1 text-right">
                                                
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <a class="btn btn-primary btn-next" data-target="btn-descripcion" href="javascript:void(0)" >Continuar ></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="desc" role="tabpanel">
                                    <div class="p-5">
                                        <div class="row my-2 justify-content-center">
                                            <div class="col-6">
                                                <label for="titulo"><b>Descripcion corta</b> <span class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                        <div class="row my-2 justify-content-center">
                                            <div class="col-6">
                                                @if(!$edit)
                                                    <textarea class="form-control" name="descripcion_corta" id="descripcion_corta" rows="5">{{ old('descripcion_corta') }}</textarea>
                                                @else
                                                    <textarea class="form-control" name="descripcion_corta" id="descripcion_corta" rows="5">{{ $product->description }}</textarea>
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row my-2 justify-content-center">
                                            <div class="col-6">
                                                <label for="titulo"><b>Descripcion larga</b></label>
                                            </div>
                                        </div>
                                        <div class="row my-2 justify-content-center">
                                            <div class="col-6">
                                                @if(!$edit)
                                                    <textarea class="form-control" name="descripcion_larga" id="descripcion_larga" rows="10">{{ old('descripcion_larga') }}</textarea>
                                                @else
                                                    <textarea class="form-control" name="descripcion_larga" id="descripcion_larga" rows="10">{{ $product->fulltext }}</textarea>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row my-3 pt-5">
                                            <div class="col-md-3 offset-md-1 text-right">
                                                
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <a class="btn btn-primary btn-next" data-target="btn-imagenes" href="javascript:void(0)" >Continuar ></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="imagenes" role="tabpanel">
                                    <div class="p-5">
                                        <div class="row my-2 justify-content-center">
                                            <div class="col-12 col-md-8">
                                                <p>Carga las fotos para el producto</p>
                                                <a class="text-primary" href="#requisitos-fotos">Ver requisitos de fotos</a>

                                            </div>
                                            <div class="col-12 col-md-8">
                                                <p>La primera foto seleccionada sera la principal del producto.</p>
                                                <div class="row my-3">
                                                    <div class="col-md-10">
                                                        
                                                        @for ($i = 0; $i < 6; $i++)
                                                            <div id="thumbnail-card-{{$i}}" class="card thumbnail-card thumbnail-card-{{$i}}" >
                                                                <div class="img-container">
                                                                    @if($edit)
                                                                        @if($i < count($images))
                                                                            
                                                                            <a class="btn btn-link btn-sm btn-dark delete-image"><i class="fal fa-times fa-inverse"></i></a>
                                                                            <img src="{{$images[$i]->filename}}" class="product-thumbnail">
                                                                            <input type="hidden" name="images[]" value="{{ $images[$i]->id }}">
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                                <div class="card-body text-center">
                                                                    <a href="javascript:void(0)" class="btn-block text-center" data-number="{{$i}}" data-toggle="modal" data-target="#upload_photo">
                                                                        <i class="fad fa-cloud-upload-alt fa-2x"></i><br>
                                                                        <small>Seleccionar foto</small>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endfor
                                                    </div>
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row my-3 pt-5">
                                            <div class="col-md-3 offset-md-1 text-right">
                                                
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <button type="submit" class="btn btn-primary">Finalizar <i class="fad fa-check-circle"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="tab-pane fade" id="busqueda" role="tabpanel">
                                    
                                </div> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




{{-- modal --}}
<div id="upload_photo" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content no-border">
        <div class="card-body p-0">
            <div class="container image-selection">
                <div class="row">
                    <div class="col-sm-12 bg-light">
                        <h6 class="mt-3">{{__('Selecciona fotos de tu producto')}}</h6>
                        <hr>
                        <div class="form-group text-center">
                            <label>{{__('Cargar fotos de producto')}}</label>
                        </div>
                        <div class="form-group text-center">
                            <label for="image-selector" class="btn btn-primary">{{__('Seleccionar imagen')}}</label>
                            <input id="image-selector" class="form-control bg-light border-dark invisible" type="file">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container image-cropper d-none">
                <div class="row">
                    <div class="col-sm-12 bg-light">
                        <h6 class="mt-3">{{__('Crop profile picture')}}</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 bg-light text-center">
                        <div id="cropper-image">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 bg-light text-center">
                        <div class="form-group">
                            @csrf
                            <input type="hidden" name="upload" value="{{ route('upload.data')}}">
                            {{-- <input type="hidden" name="urlav" value="{{ route('avatar.save')}}"> --}}
                            <button id="btn-change" class="btn btn-secondary" type="button">{{__('Cambiar')}}</button>
                            <button id="btn-done" class="btn btn-warning btn-loader" type="button">
                                <i class="fad fa-spinner-third fa-spin"></i>
                                {{__('Cortar y Guardar')}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-dark">
          <button type="button" id="btn-close-modal" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          {{-- <button type="button" class="btn btn-warning" data-dismiss="modal">Listo</button> --}}
        </div>
      </div>
    </div>
</div>

@endsection
