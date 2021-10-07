<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_attendances', function (Blueprint $table) {
            $table->id();
            $table->string('device_name')->nullable();
            $table->string('employeeId')->nullable();
            $table->text('date')->nullable();
            $table->text('inOut')->nullable();
            $table->boolean('active')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('device_attendances');
    }
}
