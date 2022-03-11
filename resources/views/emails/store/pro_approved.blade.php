@component('mail::message')
# Publicación de producto aprobada

La solicitud de publicación para el producto {{ $product->title }} ha sido aprobada.

Ahora tu producto esta al publico y listo para la venta.

Si deseas realizar cambios para el producto, estos se someteran a revisión para publicación.

Gracias,<br>
{{ config('app.name') }}
@endcomponent
