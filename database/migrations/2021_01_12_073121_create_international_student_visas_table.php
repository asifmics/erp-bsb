<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternationalStudentVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('international_student_visas', function (Blueprint $table) {
            $table->id();
            $table->string('offer_letter_form')->nullable();
            $table->string('admission_on_pro')->nullable();
            $table->string('overseas')->nullable();
            $table->string('submit_on')->nullable();
            $table->string('notary_on')->nullable();
            $table->string('received_no')->nullable();
            $table->string('appointment_on')->nullable();
            $table->string('file_submit_on')->nullable();
            $table->text('purpose')->nullable();
            $table->text('remark')->nullable();
            $table->text('laps')->nullable();

            $table->string('slug')->nullable();
            $table->boolean('status')->nullable();

            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->on('students')->references('id')->onDelete('cascade');

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
        Schema::dropIfExists('international_student_visas');
    }
}
