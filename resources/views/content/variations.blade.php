@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row py-5">
        <div class="col-md-12">
            <div class="section-title">
                <small><a href="{{route('home') }}">Negocios</a> > Variantes de producto</small>
                <h4>Variantes de <span>producto</h4></span>
            </div>
            <hr>
            <p>Al agregar un producto puedes añadir variantes.</p>

            <p>Al publicar variantes correctamente, ayudas a los clientes a comparar y elegir productos según diferentes atributos como la talla, el color u otras características entre las opciones disponibles en una misma página de detalles. Si los productos cumplen los siguientes requisitos, es probable que sean aptos para ofrecer variantes:</p>

            <ul class="list-group list-group-flush">
                <li>Los productos son prácticamente idénticos.</li>
                <li>Los productos sólo varían de forma muy específica (por ejemplo, color o talla).</li>
                <li>Los compradores esperarían encontrar los productos en una misma página de detalles.</li>
                <li>Los productos podrían tener el mismo título.</li>
            </ul>
            
            <p>Estos son algunos ejemplos de variantes de producto:</p>

        </div>
    </div>
</div>

@endsection
