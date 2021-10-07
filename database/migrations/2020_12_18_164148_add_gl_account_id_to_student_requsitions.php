<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGlAccountIdToStudentRequsitions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_requsitions', function (Blueprint $table) {
            $table->bigInteger('gl_account_id')->nullable()->after('payable_amount');
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
