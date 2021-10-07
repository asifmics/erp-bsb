<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_details', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->nullable();
            $table->float('loan_amount', 13,2)->nullable();
            $table->float('paid_amount', 13,2)->nullable();
            $table->string('loan_taken_date')->nullable();
            $table->integer('duration')->nullable();
            $table->float('monthly_installment',13,2)->nullable();
            $table->float('given_installment',13,2)->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('loan_details');
    }
}
