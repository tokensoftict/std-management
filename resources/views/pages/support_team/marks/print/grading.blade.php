

<div class="result-sheet"  style="width: 350px;">
    <table class="result-table" style="width: 100%">
        <thead>
            <tr>
                <th>SCORE RANGE</th>
                <th>GRADE</th>
                <th>MEANING</th>
            </tr>
        </thead>
        <tbody>
        @if(Mk::getGradeList($class_type->id)->count())
            @foreach(Mk::getGradeList($class_type->id) as $gr)
                <tr>
                    <td>{{ $gr->mark_from.' - '.$gr->mark_to }}</td>
                    <td>{{ $gr->name }}</td>
                    <td>{{ $gr->remark }}</td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
</div>


{{--
<table style="width:100%; border-collapse:collapse; ">
    <tbody>
    <tr>
        <td><strong>NUMBER OF : </strong></td>
        <td><strong>Distinctions:</strong> {{ Mk::countDistinctions($marks) }}</td>
        <td><strong>Credits:</strong> {{ Mk::countCredits($marks) }}</td>
        <td><strong>Passes:</strong> {{ Mk::countPasses($marks) }}</td>
        <td><strong>Failures:</strong> {{ Mk::countFailures($marks) }}</td>
        <td><strong>Subjects Offered:</strong> {{ Mk::countSubjectsOffered($marks) }}</td>
    </tr>

    </tbody>
</table>
--}}
