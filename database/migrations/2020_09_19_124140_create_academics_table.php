<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academics', function (Blueprint $table) {
            $table->id();
            $table->string('exam');
            $table->bigInteger('employee_id');
            $table->string('institut')->nullable();
            $table->string('group')->nullable();
            $table->string('board')->nullable();
            $table->integer('grade')->nullable();
            $table->integer('pass_year')->nullable();
            $table->boolean('status')->default(1);
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('academics');
    }
}
