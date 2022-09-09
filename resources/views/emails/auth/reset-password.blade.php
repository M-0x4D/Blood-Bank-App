@component('mail::message')
# Introduction

Blodd bank reset password email .

@component('mail::button', ['url' => 'https://www.google.com/'])
Reset Password
@endcomponent

<p>your reset code is : {{$code}} </p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
