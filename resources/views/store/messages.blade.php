@extends('layouts.store')

@section('content')
@push('head')
<link href="{{ asset('css/messages/style.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('css/plugins/Chart.min.css') }}" type="text/css" rel="stylesheet">
<script src="{{ asset('js/plugins/Chart.min.js') }}"></script>
<script src="{{asset('js/pages/store/reports.js')}}"></script>
@endpush
<div class="py-4 px-2">
    <div class="row">
        <div class="col-md-4">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1 text-warning">John Doe</h5>
                        <small><i class="fas fa-circle text-warning"></i></small>
                    </div>
                    <span class="text-muted">Subject</span><br>
                    <small class="text-white">12 Abril 2020 | Orden: 2356295620</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1 text-primary">John Doe</h5>    
                    </div>
                    <span class="text-dark">Subject</span><br>
                    <small class="text-muted">12 Abril 2020 | Orden: 2356295620</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1 text-primary">John Doe</h5>
                    </div>
                    <span class="text-dark">Subject</span><br>
                    <small class="text-muted">12 Abril 2020 | Orden: 2356295620</small>
                </a>
                
                <div class="alert alert-info my-2">
                    <div class="alert-text">
                        <i class="fad fa-info-circle"></i> No tienes mensajes
                    </div>
                </div>
              </div>
        </div>
        <div class="col-md-8">
            <div class="card no-border">
                <div class="card-header bg-primary">
                    <div class="user-info">
                        <h5 class="mb-1 text-warning">John Doe</h5>
                    </div>
                    <div class="subject text-muted">
                        Lorem Ipsum
                    </div>
                </div>
                <div class="card-header bg-navi card-subheader">
                    Orden: #2356295620 | Mar 30 4:42pm
                </div>
                <div class="card-body message-body">
                    <div class="messages">
                        <div class="card message my-2 w-75 float-left">
                            <div class="card-header">
                                Lun 19 Oct
                            </div>
                            <div class="card-body">
                                <p>Hola Gamer Laptops SV</p>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a feugiat neque. Pellentesque aliquet nibh ut quam blandit, vel ornare risus suscipit. Cras volutpat enim id faucibus scelerisque. Nulla tincidunt ante vel diam gravida, a congue mauris pretium. Ut tempus ex ut ante sollicitudin, eu pellentesque leo aliquam. Aenean volutpat eros euismod ipsum volutpat, vel laoreet dui porta. Mauris eget ipsum arcu. Maecenas tempor ultrices commodo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam vel vehicula augue, sit amet lacinia nisl. Ut porta tristique enim, eu viverra massa finibus nec.</p>
                            </div>
                        </div>
                        <div class="card message my-2 w-75 float-right">
                            <div class="card-header">
                                Mar 20 Oct
                            </div>
                            <div class="card-body">
                                <p>Hola John</p>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a feugiat neque. Pellentesque aliquet nibh ut quam blandit, vel ornare risus suscipit. Cras volutpat enim id faucibus scelerisque. Nulla tincidunt ante vel diam gravida, a congue mauris pretium. Ut tempus ex ut ante sollicitudin, eu pellentesque leo aliquam. Aenean volutpat eros euismod ipsum volutpat, vel laoreet dui porta. Mauris eget ipsum arcu. Maecenas tempor ultrices commodo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam vel vehicula augue, sit amet lacinia nisl. Ut porta tristique enim, eu viverra massa finibus nec.</p>

                                <p>Phasellus et porta dolor. Phasellus pulvinar sit amet odio sed viverra. Sed tristique massa felis, non sagittis nunc aliquet sed. Fusce id porttitor lorem. Donec ac suscipit massa. Fusce finibus fermentum magna, in sodales sem convallis vel. Quisque vel cursus enim. Suspendisse sed elementum est.</p>

                                <p>Proin libero sem, feugiat a leo nec, feugiat commodo diam. Aliquam vel venenatis nibh. Vestibulum quis neque eget arcu venenatis dignissim id placerat neque. Donec iaculis eros sagittis egestas suscipit. Vestibulum tempor luctus laoreet. Etiam ut sollicitudin turpis. Suspendisse eget lorem vitae libero blandit ultrices. Cras non pretium libero, sed vulputate ligula. Pellentesque molestie arcu vitae orci facilisis sodales. Nulla vitae molestie elit, sit amet maximus erat.</p>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="frm-reply">
                        <form action="" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <textarea name="message" placeholder="4000 caracteres máximo" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row justify-content-end my-2">
                                <div class="col-2">
                                    <button class="btn btn-block btn-sm btn-secondary">Adjuntar</button>
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-block btn-sm btn-primary">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
