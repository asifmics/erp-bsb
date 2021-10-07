<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentInterestCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_interest_countries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('university_id')->nullable();
            $table->unsignedBigInteger('university_program_id')->nullable();
            $table->unsignedBigInteger('university_program_category_id')->nullable();
            $table->string('addmission_fees')->nullable();
            $table->string('total_course_fees')->nullable();
            $table->string('tution_fees')->nullable();
            $table->integer('status')->default(1);
            $table->integer('adminssion_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_interest_countries');
    }
}
