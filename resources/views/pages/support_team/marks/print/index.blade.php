<html>
<head>
    <title>Student Marksheet - {{ $sr->user->name }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/my_print.css') }}" />
    <link rel="icon" href="{{ \App\Repositories\SettingRepo::getlogo() }}">
</head>
<body>

<div class="container">
    <div id="print"  style="box-sizing: border-box; page-break-inside: avoid; border: 3px solid #0d47a1; border-radius: 14px; padding-left: 10px; padding-right: 10px;" xmlns:margin-top="http://www.w3.org/1999/xhtml">
        {{--    Logo N School Details--}}
        <table class="result-header">
            <tr>
                <td class="school-logo">
                    <img src="{{ $s['logo'] }}"  alt="School Logo">
                </td>

                <td class="school-info">
                    <div class="school-name">{{ strtoupper(Qs::getSetting('system_name')) }}</div>
                    <div class="school-motto">{{ Qs::getSetting('motto') }}</div>

                    <div class="header-divider"></div>

                    <div class="school-address">{{ ucwords($s['address']) }}</div>
                    <div class="school-website">{{ $s['website'] }}</div>
                    <div class="school-phone">{{ $s['phone'] }}</div>

                    <div class="report-title">
                        REPORT SHEET ({{ strtoupper($class_type->name) }})
                    </div>
                </td>

                <td class="student-photo">
                    @if(!empty($sr->user->photo))
                        <img src="{{ $sr->user->photo }}" alt="Student Photo">
                    @endif
                </td>
            </tr>
        </table>

        <br/>

        {{--Background Logo
        <div style="position: relative;  text-align: center; ">
            <img src="{{ $s['logo'] }}" style="max-width: 500px; max-height:600px; margin-top: 60px; position:absolute ; opacity: 0.2; margin-left: auto;margin-right: auto; left: 0; right: 0;" />
        </div>
--}}
        {{--<!-- SHEET BEGINS HERE-->--}}
        @include('pages.support_team.marks.print.sheet')

        <div style=" display: flex; justify-content: center; gap: 10px; width: 100%;">
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
