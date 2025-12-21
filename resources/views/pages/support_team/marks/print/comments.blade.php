@php

    $score = $exr->total; // e.g., 875
    $maxScore = 1000; // maximum possible score
    $percentage = ($score / $maxScore) * 100;

    // Generate principal comment based on percentage
if ($percentage >= 90) {
    $comment = "Excellent performance! Keep up the outstanding work.";
} elseif ($percentage >= 80) {
    $comment = "Very good performance. Aim for even higher next term.";
} elseif ($percentage >= 70) {
    $comment = "Good performance. You can do even better.";
} elseif ($percentage >= 60) {
    $comment = "Fair performance. Put in more effort to improve.";
} elseif ($percentage >= 50) {
    $comment = "Needs improvement. Focus on your weak areas.";
} else {
    $comment = "Poor performance. Serious improvement is required.";
}


@endphp

<div>
    <table class="td-left" style="width:100%; border-collapse:collapse; margin:10px 0px;">
        <tbody>
        {{--
       <tr style=" height: 50px;">
           <td style="width: 25%;"><strong>CLASS TEACHER'S COMMENT:</strong></td>
           <td>  {{ $exr->t_comment ?: str_repeat('', 40) }}</td>
       </tr>
        --}}
        {{--
      <tr style=" height: 50px;">
          <td  style="width: 25%; height: 30px;"><strong>PRINCIPAL'S COMMENT:</strong></td>
          @if($exr->p_comment)
          <td>  {{ $exr->p_comment ?: str_repeat('', 40) }}</td>
          @else
              <th colspan="2"><br/><hr/></th>
          @endif
      </tr>
       --}}
       <tr>
           <td width="30%">PRINCIPAL'S COMMENT</td><th width="70%"><br/>{{ $exr->p_comment ?? $comment }}<hr/></th>
       </tr>
      {{--
               <tr>
          <td  style="width: 25%"><strong>NEXT TERM BEGINS:</strong></td>
          <td>{{ date('l\, jS F\, Y', strtotime($s['term_begins'])) }}</td>
      </tr>
      <tr>
          <td  style="width: 25%"><strong>NEXT TERM FEES:</strong></td>
          <td><del style="text-decoration-style: double">N</del>{{ $s['next_term_fees_'.strtolower($ct)] }}</td>
      </tr>

       --}}
        </tbody>
    </table>


    <table  style="width:100%">
        <tr>

            <td style="width:40%" align="center">
                <br/><br/><br/><br/>
                <hr/>
                <center>CLASS TEACHER</center>
            </td>
            <td style="width:20%" align="center"></td>

            <td style="width:40%" align="center" >
                <br/><br/>
                <center>
                    <img src="{{ Qs::getSetting('principal_sign') }}" width="80" height="50" /></center>
                <hr/>
                <center>
                    PRINCIPAL</center>
            </td>


        </tr>
    </table>
    <br/>
</div>
