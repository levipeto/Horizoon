@component('mail::message')
<h1>Password reset</h1>
your password was successfully reset.
@component('mail::button', ['url' => route('home')])
keep buying 
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent