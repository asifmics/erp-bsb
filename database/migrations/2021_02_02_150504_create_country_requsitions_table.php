<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryRequsitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_requsitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requsition_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('amount')->nullable();
            $table->string('remark')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('country_requsitions');
    }
}
