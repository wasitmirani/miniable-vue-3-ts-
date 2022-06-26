@component('mail::message')
# Hello {{ $auditor['name'] }},


The body of your message.

@component('mail::button', ['url' => ''])
View Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
