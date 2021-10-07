<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternationalAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('international_agents', function (Blueprint $table) {
            $table->id();

            $table->tinyInteger('type')->nullable();
            $table->string('valid_form')->nullable();
            $table->string('valid_to')->nullable();
            $table->string('pdf_file')->nullable();
            $table->boolean('status')->default(1)->nullable();
            $table->string('contact_details')->nullable();
            $table->string('remark')->nullable();
            $table->string('slug')->nullable();
            $table->integer('commission')->nullable();

            $table->unsignedBigInteger('university_id')->nullable();
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');

            $table->unsignedBigInteger('certification_id')->nullable();
            $table->foreign('certification_id')->references('id')->on('certification_agents')->onDelete('cascade');

            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
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
        Schema::dropIfExists('international_agents');
    }
}
