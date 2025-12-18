<html>
<head>
    <title>Student Marksheet - {{ $sr->user->name }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/my_print.css') }}" />
    <link rel="icon" href="{{ \App\Repositories\SettingRepo::getlogo() }}">
</head>
<body>
<div class="container">
    <div id="print"  style="border-radius: 5px;margin: 0; padding: 10px; height: 100vh" xmlns:margin-top="http://www.w3.org/1999/xhtml">
        {{--    Logo N School Details--}}
        <table width="100%">
            <tr>
                <td>
                    <img src="{{ $s['logo'] }}" style="max-height : 150px;">
                </td>

                <td style="text-align: center; ">
                    <strong><span style="color: #1b0c80; font-size: 25px;">{{ strtoupper(Qs::getSetting('system_name')) }}</span></strong><br/>
                     <strong><span style="color: red; font-style: italic; font-size: 23px;">{{ Qs::getSetting('motto') }}</span></strong><br/>
                    <strong><span style="color: #000; font-size: 15px"><i>{{ ucwords($s['address']) }}</i></span></strong><br/>
                    <strong><span style="color: #000; font-size: 12px"><i>{{ $s['website'] }}</i></span></strong><br/>
                    <strong><span style="color: #000; font-size: 15px"><i>{{ $s['phone'] }}</i></span></strong><br/>
                    <strong><span style="color: #000; font-size: 15px;"> REPORT SHEET {{ '('.strtoupper($class_type->name).')' }}</span></strong>
                </td>
                <td style="width: 100px; height: 100px; float: left;">
                    @if(!empty($sr->user->photo) and $sr->user->photo != Qs::getDefaultUserImage())
                    <img src="{{ $sr->user->photo }}"
                         alt="..."  width="100" height="100">
                    @endif
                </td>
            </tr>
        </table>
        <br/>

        {{--Background Logo--}}
        <div style="position: relative;  text-align: center; ">
            <img src="{{ $s['logo'] }}" style="max-width: 500px; max-height:600px; margin-top: 60px; position:absolute ; opacity: 0.2; margin-left: auto;margin-right: auto; left: 0; right: 0;" />
        </div>

        {{--<!-- SHEET BEGINS HERE-->--}}
        @include('pages.support_team.marks.print.sheet')

        <div style=" display: flex;justify-content: space-around; gap: 10px; width: 100%;">
            {{--Key to Grading--}}
            @include('pages.support_team.marks.print.grading')

            {{-- TRAITS - PSCHOMOTOR & AFFECTIVE --}}
            @include('pages.support_team.marks.print.skills')
        </div>
            {{--    COMMENTS & SIGNATURE    --}}
            @include('pages.support_team.marks.print.comments')


    </div>
</div>

<script>
     window.print();
</script>
</body>

</html>
