@if($data['status_id']==3)
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
style="--bs-sidebar-bg: #ffffff; --bs-sidebar-menu-item-color: #7b8190; --bs-sidebar-menu-sub-item-color: #7b8190; --bs-sidebar-menu-item-icon-color: #7b8190; --bs-sidebar-menu-item-hover-color: #383c40; --bs-sidebar-menu-item-active-color: #5b73e8; --bs-sidebar-menu-item-active-bg-color: #f3f8fb; --bs-sidebar-menu-item-active-bg-color-dark: #293552; --bs-sidebar-dark-bg: #1c2742; --bs-sidebar-dark-menu-item-color: #8c98bb; --bs-sidebar-dark-menu-sub-item-color: #7b85a2; --bs-sidebar-dark-menu-item-icon-color: #6d7794; --bs-sidebar-dark-menu-item-hover-color: #ffffff; --bs-sidebar-dark-menu-item-active-color: #ffffff; --bs-header-bg: #ffffff; --bs-header-item-color: #555b6d; --bs-header-dark-bg: #2f374e; --bs-header-dark-item-color: #e9ecef; --bs-footer-bg: #f2f2f5; --bs-footer-color: #74788d; --bs-topnav-bg: #ffffff; --bs-menu-item-color: #7b8190; --bs-menu-item-active-color: #5b73e8; --bs-body-bg: #f5f6f8; --bs-body-color: #495057; --bs-body-color-rgb: 73, 80, 87; --bs-apex-grid-color: #f8f9fa; --bs-display-none: none; --bs-display-block: block; --bs-card-title-desc: #74788d; --bs-light: #f5f6f8; --bs-light-rgb: 245, 246, 248; --bs-dark: #212529; --bs-dark-rgb: 33, 37, 41; --bs-text-muted: #74788d; --bs-link-color: #5b73e8; --bs-link-hover-color: #5b73e8; --bs-border-color: #f6f6f6; --bs-dropdown-bg: #fff; --bs-dropdown-link-color: #212529; --bs-dropdown-link-hover-color: #1f2327; --bs-dropdown-link-hover-bg: #f8f9fa; --bs-dropdown-border-width: 0px; --bs-card-bg: #fff; --bs-card-cap-bg: #fff; --bs-card-border-color: #f6f6f6; --bs-card-logo-dark: block; --bs-card-logo-light: none; --bs-modal-bg: #fff; --bs-modal-content-bg: #fff; --bs-modal-content-border-color: #f6f6f6; --bs-nav-tabs-link-active-color: #495057; --bs-nav-tabs-link-active-bg: #f5f6f8; --bs-accordion-button-active-color: #5268d1; --bs-accordion-bg: #fff; --bs-accordion-button-bg: #f5f6f8; --bs-table-color: #495057; --bs-boxed-body-bg: #e9ebf0; --bs-progress-bg: #f5f6f8; --bs-toast-background-color: rgba(255, 255, 255, 0.85); --bs-toast-border-color: rgba(0, 0, 0, 0.1); --bs-toast-header-border-color: rgba(0, 0, 0, 0.05); --bs-list-group-hover-bg: #f8f9fa; --bs-popover-bg: #fff; --bs-pagination-hover-bg: #f5f6f8; --bs-input-bg: #fff; --bs-input-group-addon-border-color: #ced4da; --bs-input-border: #ced4da; --bs-input-border-color: #ced4da; --bs-input-focus-border: #adb9f4; --bs-input-disabled-bg: #f5f6f8; --bs-input-placeholder-color: #74788d; --bs-input-group-addon-bg: #f5f6f8; --bs-input-check-border: var(--bs-input-border);">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="color-scheme" content="light">
<meta name="supported-color-schemes" content="light">
<style>
    @media only screen and (max-width: 600px) {
        .inner-body {
            width: 100% !important;
        }

        .footer {
            width: 100% !important;
        }
    }

    @media only screen and (max-width: 500px) {
        .button {
            width: 100% !important;
        }
    }
    #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(5, 190, 36, 0.678).2);
  transition: 0.3s;
margin-top:20px;
margin-left:30px;
  width: 90%;
  border-radius: 5px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

img {
  border-radius: 5px 5px 0 0;
}

.container {
  padding: 2px 16px;
}
</style>
</head>

<body
style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -webkit-text-size-adjust: none; background-color: #ffffff; color: #718096; height: 100%; line-height: 1.4; margin: 0; padding: 0; width: 100% !important;">

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation"
    style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; background-color: #edf2f7; margin: 0; padding: 0; width: 100%;">
    <tr>
        <td align="center"
            style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;">
            <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation"
                style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; margin: 0; padding: 0; width: 100%;">
                <tr>
                    <td class="header"
                        style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; padding: 25px 0; text-align: center;">
                        <a href="miniable-vue-3-ts-.test"
                            style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #3d4852; font-size: 19px; font-weight: bold; text-decoration: none; display: inline-block;">
                            <img src="{{asset('assets/images/logo-sm.png')}}" class="logo"
                                alt="logo"
                                style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100%; border: none; height: 75px; max-height: 75px; width: 75px;">
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

                <!-- Email Body -->

                <tr>

                    <table  id="customers" style="overflow-x: auto;width: 100%;caption-side: bottom;border-collapse: collapse;    display: table;">
                        <thead>
                            <br>
                            <tr >


                                {{-- <h3  style="margin-left: 20%;"><strong>Hello, {{ $auditor['name'] }}</strong></h3> --}}


                                <div class="card">

                                    <div class="container">
                                        {{-- <span><strong>Hello, {{ $auditor['name'] }}</strong></span> --}}
                                      <h4><b>
                                        {{ $data['title'] }} </b></h4>
                                      <p>The conclusion for this audit request has been drawn.</p>
                                      <h6>Audit Remarks: {{$data['remarks']}}</h6>
                                    </div>
                                  </div>
                                  <hr>
                            </tr>
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
                                            -
                                            {{-- <span style="color:red">rejected</span> --}}
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </tr>

                <tr>
                    <td
                        style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;">
                        <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0"
                            role="presentation"
                            style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px; margin: 0 auto; padding: 0; text-align: center; width: 570px;">
                            <tr>
                                <td class="content-cell" align="center"
                                    style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; padding: 32px;">
                                    <p
                                        style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; line-height: 1.5em; margin-top: 0; color: #b0adc5; font-size: 12px; text-align: center;">
                                        © 2022 Halal CS. All rights reserved.</p>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>

</html>
@else
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

@endif
