@component('mail::message')
#  {{ $data['title'] }}
<hr>

<h3><strong>Hello, {{ $auditor['name'] }}</strong></h3>

@if($data['status_id']==3)
The conclusion for this audit request has been drawn. Click the link below to view details
@else
Please visit this link to view the details of this audit request.
@endif
@component('mail::button', ['url' => route('audit-survey',['token'=>$auditor['token']])])
View Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
