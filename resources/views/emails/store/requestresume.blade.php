@component('mail::message')
# Solicitud de tienda recibida.

<p>El equipo de solicitudes de MIBAGI ha recibido tu información y te contactaremos a la brevedad posible.</p>

Resumen:

<b>Contacto:</b> {{ $store_request->fullname }} <br>
<b>Nombre de negocio:</b> {{ $store_request->store_name }} <br>
<b>Descripción del negocio:</b> {{ $store_request->store_desc }}<br>
<b>URL:</b> {{ $store_request->url }}<br>
<br>
Exitos,<br>
{{ config('app.name') }}
@endcomponent
