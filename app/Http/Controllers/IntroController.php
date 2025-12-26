<?php

namespace App\Http\Controllers;


use App\Helpers\Qs;
use App\Models\Pin;
use App\Models\StudentRecord;
use App\Repositories\ExamRepo;
use App\Repositories\PinRepo;
use App\Repositories\UserRepo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IntroController extends Controller
{

    protected  $pin, $examIsLocked, $user, $exam;

    public function __construct(PinRepo $pin, UserRepo $user, ExamRepo $exam)
    {
        $this->pin = $pin;
        $this->user = $user;
        $this->exam =  $exam;
    }

    public function index()
    {
        return view('intro');
    }

    public function checkCurrentTermResult(Request $request)
    {
        if(!$request->isMethod('post')){
            return redirect()->route('home-page');
        }

        $user = User::query()->where('code', $request->admission_number)->first();

        if(!$user) {
            return back()->withInput()->with('error', 'Invalid admission number');
        }

        $pin = Pin::query()->where('code', $request->pin)->first();
        if(!$pin) {
            return back()->withInput()->with('error', 'Invalid Result Checker PIN');
        }

        auth()->loginUsingId($user->id);
        session()->regenerate(true);

        $student_id = StudentRecord::query()->where('user_id', $user->id)->first()->id;

        $code = $this->pin->findValidCode($request->pin);
        if($code->count() < 1) {
            $code = $this->pin->getUserPin($request->pin, $user->id, $user->id);
        }

        if($code->count() > 0 && $code->first()->times_used < 6 ) {
            $code = $code->first();
            $d['times_used'] = $code->times_used + 1;
            $d['user_id'] = $user->id;
            $d['student_id'] = $user->id;
            $d['user_type'] = $user->user_type;
            $d['used'] = 1;
            $this->pin->update($code->id, $d);

            Session::put('pin_verified', $user->id);

            $year = Qs::getCurrentSession();

            $wh = ['student_id' => $user->id, 'year' => $year ];
            $exr = $this->exam->getRecord($wh);
            $exam = $exr->first();

            return redirect()->route('marks.print', [Qs::hash($user->id),$exam->exam_id,$year]);
        }

        return back()->withInput()->with('error', __('msg.pin_fail'));
    }
}
