<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRefundDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_refund_receipt_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('refund_receipt_id')->nullable();
            $table->unsignedBigInteger('requsition_details_id')->nullable();
            $table->string('refunded')->nullable();
            $table->string('remark')->nullable();
            $table->integer('status')->default();
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
        Schema::dropIfExists('student_refund_receipt_details');
    }
}
