{{--<!--NAME , CLASS AND OTHER INFO -->--}}

<table style="width:100%; border-collapse:collapse; ">
    <tbody>
    <tr>
        <td><strong>NAME:</strong> {{ strtoupper($sr->user->name) }}</td>
        <td><strong>ADM NO:</strong> {{ $sr->adm_no }}</td>
        <td><strong>HOUSE:</strong> {{ strtoupper($sr->house) }}</td>
        <td><strong>CLASS:</strong> {{ strtoupper($my_class->name) }}</td>
    </tr>
    <tr>
        <td><strong>REPORT SHEET FOR:</strong> {!! strtoupper(Mk::getSuffix($ex->term)) !!} TERM </td>
        <td><strong>ACADEMIC YEAR:</strong> {{ $ex->year }}</td>
        <td><strong>AGE:</strong> {{ $sr->age ?: ($sr->user->dob ? date_diff(date_create($sr->user->dob), date_create('now'))->y : '-') }}</td>
        <td><strong>GENDER:</strong> {{ strtoupper($sr->user->gender) }}</td>
    </tr>
    </tbody>
</table>


{{--Exam Table--}}
<div class="result-sheet">
<table class="result-table">
    <thead>
    <tr>
        <th rowspan="2">SUBJECTS</th>
        <th colspan="4">CONTINUOUS ASSESSMENT</th>
        <th rowspan="2">EXAM<br>(60%)</th>
        <th rowspan="2">FINAL MARKS <br> (100%)</th>
        <th rowspan="2">HIGHEST <br> IN CLASS</th>
        <th rowspan="2">CLASS <br> AVERAGE</th>
        <th rowspan="2">GRADE</th>
        <th rowspan="2">SUBJECT <br> POSITION</th>




      {{--  @if($ex->term == 3) --}}{{-- 3rd Term --}}{{--
        <th rowspan="2">FINAL MARKS <br>(100%) 3<sup>RD</sup> TERM</th>
        <th rowspan="2">1<sup>ST</sup> <br> TERM</th>
        <th rowspan="2">2<sup>ND</sup> <br> TERM</th>
        <th rowspan="2">CUM (300%) <br> 1<sup>ST</sup> + 2<sup>ND</sup> + 3<sup>RD</sup></th>
        <th rowspan="2">CUM AVE</th>
        <th rowspan="2">GRADE</th>
        @endif--}}

        <th rowspan="2">REMARKS</th>
    </tr>
    <tr>
        <th>ASS.(10%)</th>
        <th>CA1(15%)</th>
        <th>CA2(15%)</th>
        <th>TOTAL(40%)</th>
    </tr>
    </thead>
    <tbody>
    @foreach($subjects as $sub)
        @php
            $myMarks = $marks->where('subject_id', $sub->id)->where('exam_id', $ex->id);
            if($myMarks->count() == 0) continue;
        @endphp
        <tr>
            <td style="font-weight: bold">{{ $sub->name }}</td>
            @foreach($myMarks as $mk)
                <td>{{ $mk->t3 ?: '-' }}</td>
                <td>{{ $mk->t1 ?: '-' }}</td>
                <td>{{ $mk->t2 ?: '-' }}</td>
                <td>{{ $mk->tca ?: '-' }}</td>
                <td>{{ $mk->exm ?: '-' }}</td>

                <td>{{ $mk->$tex ?: '-'}}</td>
                <td>{{ $mk->$class_av ?: '-'}}</td>
                <td>{{ $mk->$h_score ?: '-'}}</td>
                <td><span class="grade grade-{{ strtolower($mk->grade->name) }}">{{ $mk->grade ? $mk->grade->name : '-' }}</span></td>
                <td>{!! ($mk->grade) ? Mk::getSuffix($mk->sub_pos) : '-' !!}</td>

                <td>{{ $mk->grade ? $mk->grade->remark : '-' }}</td>

                {{--@if($ex->term == 3)
                    <td>{{ $mk->tex3 ?: '-' }}</td>
                    <td>{{ Mk::getSubTotalTerm($student_id, $sub->id, 1, $mk->my_class_id, $year) }}</td>
                    <td>{{ Mk::getSubTotalTerm($student_id, $sub->id, 2, $mk->my_class_id, $year) }}</td>
                    <td>{{ $mk->cum ?: '-' }}</td>
                    <td>{{ $mk->cum_ave ?: '-' }}</td>
                    <td>{{ $mk->grade ? $mk->grade->name : '-' }}</td>
                    <td>{{ $mk->grade ? $mk->grade->remark : '-' }}</td>
                @endif--}}

            @endforeach
        </tr>
    @endforeach
    <tr>
        <td colspan="3"><strong>TOTAL SCORES OBTAINED: </strong> {{ $exr->total }}</td>
        <td colspan="3"><strong>FINAL AVERAGE: </strong> {{ $exr->ave }}</td>
        <td colspan="3"><strong>CLASS AVERAGE: </strong> {{ $exr->class_ave }}</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </tbody>
</table>
</div>
