
    {{--KEYS TO RATING
    <div style="float: left">
        <br>
        <strong style="text-decoration: underline;">KEY</strong> <br>
        <span>5 - Excellent</span> <br>
        <span>4 - Very Good</span> <br>
        <span>3 - Good</span> <br>
        <span>2 - Fair</span> <br>
        <span>1 - Poor</span> <br>
    </div>
--}}

    <div class="result-sheet" style="width: 450px;">
        <table class="result-table" style="width: 100%">
        <thead>
        <tr>
            <th><strong>AFFECTIVE TRAITS</strong></th>
            <th><strong>RATING</strong></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($skills->where('skill_type', 'AF') as $af)
            <tr>
                <td>{{ $af->name }}</td>
                <td>{{ $exr->af ? explode(',', $exr->af)[$loop->index] : '' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>

    <div class="result-sheet"  style="width: 450px;">
        <table class="result-table" style="width: 100%">
        <thead>
        <tr>
            <th><strong>PSYCHOMOTOR</strong></th>
            <th><strong>RATING</strong></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($skills->where('skill_type', 'PS') as $ps)
            <tr>
                <td>{{ $ps->name }}</td>
                <td>{{ $exr->ps ? explode(',', $exr->ps)[$loop->index] : '' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
