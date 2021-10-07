<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversityWiseProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university_wise_programs', function (Blueprint $table) {
            $table->id();
            $table->integer('university');
            $table->integer('category');
            $table->integer('program');
            $table->integer('duration')->nullable();
            $table->string('tution_fees')->nullable();
            $table->string('total_tution_fees')->nullable();
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
        Schema::dropIfExists('university_wise_programs');
    }
}
