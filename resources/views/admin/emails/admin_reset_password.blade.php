@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => adminUrl('reset/password/')])
Reset Your Password
@endcomponent

Thanks,<br>
{{$data['data']}}
{{ config('app.name') }}
@endcomponent
