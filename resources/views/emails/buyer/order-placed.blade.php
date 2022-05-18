@component('mail::message')
# Tu orden ha sido enviada

Tu orden {{ $order->number }} ha sido enviada y será procesada lo mas breve posible.

Puedes ver los detalles de tu orden en la seccion de pedidos en tu cuenta de mibagi.

@component('mail::button', ['url' => route('user.orders')])
Ver mis pedidos
@endcomponent


Gracias,<br>
{{ config('app.name') }}
@endcomponent

