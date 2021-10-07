<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('id_no')->nullable();
            $table->string('name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_profession')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_profession')->nullable();
            $table->string('dob')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('religion')->nullable();
            $table->string('national_id')->nullable();
            $table->string('passport_id')->nullable();
            $table->string('nationality')->nullable();
            $table->string('gender')->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('email',100)->nullable();
            $table->string('phone',100)->nullable();
            $table->string('image')->nullable();
            $table->string('visitor_id',100)->nullable();
            $table->string('guest_date',100)->nullable();
            $table->string('to',100)->nullable();
            $table->string('room',100)->nullable();
            $table->string('purpose_study',10)->nullable();
            $table->string('purpose_ielts',10)->nullable();
            $table->string('purpose_visit',10)->nullable();
            $table->string('purpose_others',10)->nullable();
            // $table->string('country')->nullable();
            $table->string('subject')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('hear_bsb_id')->nullable();
            $table->string('ref_by')->nullable();
            $table->integer('reception')->nullable();
            $table->integer('counsellor')->nullable();
            $table->integer('apply_for')->nullable();
            $table->integer('admission_date')->nullable();
            $table->integer('location')->nullable();
            $table->integer('university')->nullable();
            $table->integer('course_cat')->nullable();
            $table->integer('course')->nullable();
            $table->string('reg_fees')->nullable();
            $table->string('tution_fees')->nullable();
            $table->string('total_course_fees')->nullable();
            $table->string('mode_of_payment')->nullable();
            $table->string('living_cost')->nullable();
            $table->string('job_permission')->nullable();
            $table->string('application_deadline')->nullable();
            $table->string('commencement_date')->nullable();
            $table->string('visa_fees')->nullable();
            $table->string('ambassy_address')->nullable();
            $table->string('service_charge')->nullable();
            $table->string('air_tiket')->nullable();
            $table->string('comments')->nullable();
            $table->string('student_status')->nullable();
            $table->integer('file_transfer_status')->nullable();
            $table->integer('status')->default(1);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('students');
    }
}
