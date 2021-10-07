<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRequsitionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_requsition_details', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->nullable();
            $table->integer('requsition_id')->nullable();
            $table->string('payable_amount')->nullable();
            $table->string('paid')->nullable();
            $table->string('remark')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('student_requsition_details');
    }
}
