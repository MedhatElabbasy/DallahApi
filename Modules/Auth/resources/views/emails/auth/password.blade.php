@component('mail::message')
{{__('Reset the password')}}

{{__('Your code')}} : <h4>{{$verificationCode}}</h4>

{{__('Thanks')}},<br>
{{ config('app.name') }}
@endcomponent




