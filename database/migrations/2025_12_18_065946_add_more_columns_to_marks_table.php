<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnsToMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marks', function (Blueprint $table) {
            $table->integer('h_score1')->after('tex3')->nullable();
            $table->integer('h_score2')->after('tex3')->nullable();
            $table->integer('h_score3')->after('tex3')->nullable();


            $table->integer('class_av1')->after('tex3')->nullable();
            $table->integer('class_av2')->after('tex3')->nullable();
            $table->integer('class_av3')->after('tex3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('marks', function (Blueprint $table) {
            $table->dropColumn(['class_av3', 'class_av2', 'class_av3', 'h_score1', 'h_score2', 'h_score3']);
        });
    }
}
