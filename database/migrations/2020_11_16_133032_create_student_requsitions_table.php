<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRequsitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_requsitions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('payable_amount')->nullable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('student_requsitions');
    }
}
