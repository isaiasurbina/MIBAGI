@component('mail::message')
# Tu solicitud de negocio ha sido aceptada.

Tu solicitud de tu negocio {{ $store->name }} en {{ config('app.name') }} ha sido aceptada, ahora puedes gestionar tus productos y ventas en el administrador de tu negocio en tu cuenta.

@component('mail::button', ['url' => 'http://mibagi.com/login'])
Ingresar
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
