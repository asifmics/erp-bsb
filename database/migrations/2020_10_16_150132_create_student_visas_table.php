<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_visas', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('place')->nullable();
            $table->string('issue_date')->nullable();
            $table->string('expire_date')->nullable();
            $table->string('duration')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('dob')->nullable();
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
        Schema::dropIfExists('student_visas');
    }
}
