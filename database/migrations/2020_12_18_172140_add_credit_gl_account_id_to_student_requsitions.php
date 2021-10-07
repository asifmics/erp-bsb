<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreditGlAccountIdToStudentRequsitions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_requsitions', function (Blueprint $table) {
            $table->bigInteger('credit_gl_account_id')->nullable()->after('gl_account_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_requsitions', function (Blueprint $table) {
            //
        });
    }
}
