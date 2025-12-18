<?php

namespace Database\Seeders;

use App\Models\MyClass;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->delete();

        $this->createSubjects();
    }

    protected function createSubjects()
    {
        $subjects = [
            'English Language',
            'Mathematics',
            'Biology',
            'Agricultural Science / Geography',
            'Chemistry',
            'Physics',
            'Data Processing',
            'Further Mathematics / Economics',
            'Civic Education',
            'Geography',
            'C.R.S / I.R.S',
            'National Values',
            'Basic Science',
            'Accounting',
            'Computer Studies',
            'Home Economics',
            'Commerce',
            'Cultural Creative Art',
            'Prevocational Studies',
            'Business Studies',
            'Basic Science and Technology',
            'French / Arabic',
            'Yoruba',
            'Government',
            'Financial Accounting',
            'Literature-in-English',
            'Phoenics',
            'History'
        ];
        $sub_slug = [
            'ENG',
            'MATH',
            'BIO',
            'AGRIC',
            'CHE',
            'PHY',
            'DP',
            'FM/ECO',
            'CE',
            'GEO',
            'C.R.S / I.R.S',
            'NV',
            'BS',
            'ACC',
            'CS',
            'HE',
            'COM',
            'CCA',
            'PS',
            'BUSS',
            'BST',
            'FRE/ARB',
            'YOR',
            'GOV',
            'FA',
            'LTE',
            'PHO',
            'HIS',
        ];
        $teacher_id = User::where(['user_type' => 'teacher'])->first()->id;
        $my_classes = MyClass::all();

        foreach ($my_classes as $my_class) {

            $data = [

                [
                    'name' => $subjects[0],
                    'slug' => $sub_slug[0],
                    'my_class_id' => $my_class->id,
                    'teacher_id' => $teacher_id
                ],

                [
                    'name' => $subjects[1],
                    'slug' => $sub_slug[1],
                    'my_class_id' => $my_class->id,
                    'teacher_id' => $teacher_id
                ],

            ];

            DB::table('subjects')->insert($data);
        }

    }

}
