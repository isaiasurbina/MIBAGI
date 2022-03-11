@component('mail::message')
# Publicación de producto denegada

La solicitud de publicación para el producto {{ $product->title }} ha sido denegada.

Un agente de MIBAGI se contactará contigo para brindarte más detalles.

Gracias,<br>
{{ config('app.name') }}
@endcomponent