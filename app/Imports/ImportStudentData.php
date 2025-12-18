<?php

namespace App\Imports;

use App\Helpers\Qs;
use App\Repositories\LocationRepo;
use App\Repositories\MyClassRepo;
use App\Repositories\StudentRepo;
use App\Repositories\UserRepo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\BeforeSheet;

class ImportStudentData implements ToCollection, WithEvents, WithHeadingRow
{
    public $class_id, $section_id;
    public function __construct($class_id, $section_id)
    {
        $this->class_id = $class_id;
        $this->section_id = $section_id;

        $this->loc = app(LocationRepo::class);
        $this->my_class = app(MyClassRepo::class);
        $this->user = app(UserRepo::class);
        $this->student = app(StudentRepo::class);
    }
    public $sheetTitle;

    /**
     * @param Collection $collection
     */
    public function collection(Collection $students)
    {
        $excelInfo = $this->getSheetTitle();

        if($this->class_id != $excelInfo['class_id']) return;
        if($this->section_id != $excelInfo['section_id']) return;

        foreach ($students as $student) {
            \DB::transaction(function () use ($student, $excelInfo) {
                $data = [
                    'name' => ucwords($student['first_name'].' '.$student['middle_name'].' '.$student['last_name']),
                    'gender' => $student['gender'],
                    'adm_no' => $student['adm_no'],
                    'nal_id' => 1,
                    'state_id' => 24,
                    'user_type' => 'student',
                    'code' => $student['adm_no'],
                    'password' => Hash::make('student'),
                    'year_admitted' => date('Y'),
                    'username' => $student['adm_no'],
                    'photo' => Qs::getDefaultUserImage(),
                ];

                $user = $this->user->create($data); // Create User

                $studentRecordData = [
                    'adm_no' => $student['adm_no'],
                    'user_id' => $user->id,
                    'session' => Qs::getSetting('current_session'),
                    'my_class_id' => $this->class_id,
                    'section_id' => $this->section_id,
                ];
                $this->student->createRecord($studentRecordData); // Create Student
            });
        }
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                // Capture the current sheet title and store it
                $this->sheetTitle = $event->sheet->getDelegate()->getTitle();
            },
        ];
    }

    // You can also add a helper method to retrieve the title later from your controller
    public function getSheetTitle()
    {
        list($class_id, $section_id) = explode('+', $this->sheetTitle);

        return [
            'class_id' => $class_id,
            'section_id' => $section_id,
        ];
    }
}
