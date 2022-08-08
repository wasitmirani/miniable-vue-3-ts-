@if($data['status_id']==3)
@component('mail::table')
<table style="overflow-x: auto;width: 100%;caption-side: bottom;border-collapse: collapse;    display: table;">
    <thead>
        <tr>
            <th scope="col"> Auditor</th>
            @foreach ($audit_dates as $item)
                <th scope="col">{{ $item->audit_date->format('d-m-Y') }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>

        @foreach ($audit_date_requests as $item)
            <tr>
                @php
                    $new_auditor = collect($item)->first();
                @endphp
                <td scope="col"  class="header" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; padding: 20px 0; text-align: center;">
                    @if (!empty($new_auditor))
                        {{ $new_auditor['auditor_name'] }}
                    @endif
                </td>
                @foreach (collect($item)->sortBy('audit_date')->values() as $request)
                    <td scope="col"  class="header" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; padding: 20px 0; text-align: center;">
                        @if($request['is_assigned']==1)
                        <span style="color:rgb(8, 206, 91)">approved</span>
                        @else
                        <span style="color:red">rejected</span>
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

@endcomponent
@endif
@component('mail::message')
#  {{ $data['title'] }}
<hr>

<h3><strong>Hello, {{ $auditor['name'] }}</strong></h3>

@if($data['status_id']==3)
The conclusion for this audit request has been drawn. Click the link below to view details
@else
Please visit this link to view the details of this audit request.<br>
Location: {{$data['location']}}
@endif

<br>
@component('mail::button', ['url' => route('audit-survey',['token'=>$auditor['token']])])
View Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
