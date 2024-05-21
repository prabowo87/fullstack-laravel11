<x-mail::message>
# Hello {{$user->name}}

<h3>Your OTP is: {{ $user->otp }}</h3>



Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
