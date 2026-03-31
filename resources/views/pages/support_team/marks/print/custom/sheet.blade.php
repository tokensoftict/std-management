{{-- Cognitive Domain Table --}}
<table class="cognitive-table">
    <thead>
        <tr>
            <th rowspan="2" style="width: 20px;">SN</th>
            <th rowspan="2" class="subject-name-col">SUBJECTS</th>
            <th colspan="4">CONTINUOUS ASSESSMENT</th>
            <th rowspan="2"><br/><br/>EXAM<br>(60%)</th>
            <th rowspan="2"><br/><br/>FINAL MARKS <br> (100%)</th>
            <th rowspan="2"><br/><br/>HIGHEST <br> IN CLASS</th>
            <th rowspan="2"><br/><br/>CLASS <br> AVERAGE</th>
            <th rowspan="2"><br/><br/>GRADE</th>
            <th rowspan="2"><br/><br/>REMARKS</th>
            <th rowspan="2"><br/><br/>SUBJECT <br> POSITION</th>
        </tr>
        <tr>
            <th>ASS.<br/>(10%)</th>
            <th>CA1<br/>(15%)</th>
            <th>CA2<br/>(15%)</th>
            <th>TOTAL<br/>(40%)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($marks->sortBy('subject.name') as $mk)
            <tr class="{{ $loop->even ? 'row-even' : 'row-odd' }}">
                <td>{{ $loop->iteration }}</td>
                <td class="subject-name-col">{{ strtoupper($mk->subject->name) }}</td>
                
                {{-- Assessments --}}
                <td>{{ $mk->t1 ?: '-' }}</td>
                <td>{{ $mk->t2 ?: '-' }}</td>
                <td>{{ $mk->t3 ?: '-' }}</td>
                <td style="font-weight: 700;">{{ $mk->tca ?: '-' }}</td>
                <td>{{ $mk->exm ?: '-' }}</td>
                
                {{-- Totals --}}
                <td style="font-weight: 800; color: var(--secondary-blue);">{{ ($mk->tca + $mk->exm) ?: '-' }}</td>
                
                {{-- Form Stats (Highest & Average) --}}
                <td>{{ $mk->$h_score ?: '-' }}</td> {{-- Highest in Class --}}
                <td>{{ $mk->$class_av ?: '-' }}</td> {{-- Class Average --}}
                
                <td style="font-weight: 800;">{{ $mk->grade ? $mk->grade->name : '-' }}</td>
                <td class="remark-text">{{ $mk->grade ? $mk->grade->remark : '-' }}</td>
                
                {{-- Rankings --}}
                <td>{!! $mk->sub_pos ? Mk::getSuffix($mk->sub_pos) : '-' !!}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div style="text-align: center; font-size: 10px; font-weight: 800; margin-top: 5px; color: var(--text-black);">
    Grade Details A+ = 90-100 : A = 80-89 : B = 70-79 : C = 60-69 : D = 50-59 : E = 40-49 : F = 0-39
</div>
