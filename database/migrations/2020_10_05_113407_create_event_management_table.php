<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_management', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('date_from');
            $table->string('date_to');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('cost')->nullable();
            $table->text('remarks')->nullable();;
            $table->text('image')->nullable();
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
        Schema::dropIfExists('event_management');
    }
}
