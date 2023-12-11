@component('mail::message')
{{__('Activate email')}}

{{__('Thank you for your registration')}}.
{{__('Your code')}} : <h4>{{$verificationCode}}</h4>

{{__('Thanks')}},<br>
{{ config('app.name') }}
@endcomponent
