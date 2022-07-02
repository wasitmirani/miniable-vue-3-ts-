@component('mail::message')
# Hello {{ $auditor['name'] }},


The body of your message.

@component('mail::button', ['url' => route('audit-survey',['token'=>$auditor['token']])])
View Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
