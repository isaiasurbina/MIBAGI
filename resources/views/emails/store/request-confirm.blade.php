@component('mail::message')
<div class="mail">
    <h4>Solicitud de tienda recibida.</h4>

    <p>El equipo de solicitudes de MIBAGI ha recibido tu información y te contactaremos a la brevedad posible.</p>

    Resumen:

    <strong>Contacto:</strong> {{ $store_request->fullname }}
    <strong>Nombre de negocio:</strong> {{ $store_request->store_name }}
    <strong>Descripción del negocio:</strong> {{ $store_request->store_desc }}
    <strong>URL:</strong> {{ $store_request->url }}
</div>
@endcomponent