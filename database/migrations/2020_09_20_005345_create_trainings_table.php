<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->bigInteger('employee_id');
            $table->string('institut')->nullable();
            $table->string('topic')->nullable();
            $table->string('board')->nullable();
            $table->string('grade')->nullable();
            $table->string('pass_year')->nullable();
            $table->string('duration')->nullable();
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
        Schema::dropIfExists('trainings');
    }
}
