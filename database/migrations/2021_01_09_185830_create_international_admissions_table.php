<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternationalAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('international_admissions', function (Blueprint $table) {
            $table->id();
            $table->string('f_o_date')->nullable();
            $table->string('ex_particulars')->nullable();
            $table->string('ex_amount')->nullable();
            $table->integer('pay_method')->nullable();
            $table->string('card_holder')->nullable();
            $table->boolean('status')->nullable();
            $table->string('slug')->nullable();
            $table->text('remark')->nullable();

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
        Schema::dropIfExists('international_admissions');
    }
}
