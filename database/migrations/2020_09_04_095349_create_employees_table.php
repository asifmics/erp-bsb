<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('id_no');
            $table->string('name');
            $table->integer('shift_id');
            $table->integer('designation_id');
            $table->string('joining_date')->nullable();
            $table->string('maturity_age');
            $table->string('eligible_status')->default('No');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('religion');
            $table->string('dob');
            $table->string('nationality');
            $table->string('blood_group');
            $table->string('marital_status');
            $table->string('gender');
            $table->text('present_address');
            $table->text('permanent_address');
            $table->bigInteger('salary_scale')->nullable();
            $table->string('account_no',100)->nullable();
            $table->bigInteger('branch')->nullable();
            $table->bigInteger('department')->nullable();
            $table->bigInteger('designation')->nullable();
            $table->string('email',100)->nullable();
            $table->string('phone',100)->nullable();
            $table->string('whatsapp',100)->nullable();
            $table->string('image')->nullable();
            $table->string('commission_type')->nullable();
            $table->string('commission')->nullable();
            $table->integer('emp_status')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
