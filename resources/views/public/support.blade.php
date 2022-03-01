@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="section-title my-3">
                <h4>En que te podemos <span>ayudar?</span></h4>
            </div>
            <div class="description">
                <p>Esta es el area</p>
            </div>
            <div class="form">
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Buscar" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-warning" type="button"><i class="fal fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Preguntas frecuentes</h5>
                    <div class="list-group">
                        <a class="list-group-item px-0" href="#">
                            ¿Donde esta mi pedido?
                        </a>
                        <a class="list-group-item px-0" href="#">
                            ¿Tiene algún costo usar Mibagi?
                        </a>
                        <a class="list-group-item px-0" href="#">
                            ¿Cuánto cuesta el envío?
                        </a>
                        <a class="list-group-item px-0" href="#">
                            ¿Cuánto cuesta el envío?
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">

        
        </div>
    </div>
</div>
@endsection
