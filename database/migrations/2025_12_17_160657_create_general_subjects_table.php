<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->timestamps();
        });


        DB::table('general_subjects')->insert([
            ['name'=>'English Language'],
            ['name'=>'Mathematics'],
            ['name'=>'Biology'],
            ['name'=>'Agricultural Science / Geography'],
            ['name'=>'Chemistry'],
            ['name'=>'Physics'],
            ['name'=>'Data Processing'],
            ['name'=>'Further Mathematics / Economics'],
            ['name'=>'Civic Education'],
            ['name'=>'Geography'],
            ['name'=>'C.R.S / I.R.S'],
            ['name'=>'National Values'],
            ['name'=>'Basic Science'],
            ['name'=>'Accounting'],
            ['name'=>'Computer Studies'],
            ['name'=>'Home Economics'],
            ['name'=>'Commerce'],
            ['name'=>'Cultural Creative Art'],
            ['name'=>'Prevocational Studies'],
            ['name'=>'Business Studies'],
            ['name'=>'Basic Science and Technology'],
            ['name'=>'French / Arabic'],
            ['name'=>'Yoruba'],
            ['name'=>'Government'],
            ['name'=>'Financial Accounting'],
            ['name'=>'Literature-in-English'],
            ['name'=>'Phonics'],
            ['name'=>'History'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_subjects');
    }
}
