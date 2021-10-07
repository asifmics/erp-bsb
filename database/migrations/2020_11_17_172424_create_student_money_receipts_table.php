<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentMoneyReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_money_receipts', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->nullable();
            $table->string('money_receipt')->nullable();
            $table->string('date')->nullable();
            $table->string('amount')->nullable();
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
        Schema::dropIfExists('student_money_receipts');
    }
}
