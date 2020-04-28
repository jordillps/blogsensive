@component('mail::message')
# Tus credenciales para  acceder a {{config('app.name')}}

Utiliza estas credenciales para acceder a la aplicación

@component('mail::table')

## Username: {{$user->email}}
## Password: {{$password}}

@endcomponent

@component('mail::button', ['url' => url('login')])
Login
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
