@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => adminUrl('reset/password/'.$data['token'])])
Reset Your Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
