<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNidToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            if (!Schema::hasColumns('employees',['nid','tin'])) {
                $table->string('nid')->nullable()->after('dob');
                $table->string('tin')->nullable()->after('nid');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            if (Schema::hasColumns('employees',['nid','tin'])) {
                $table->dropColumn(['nid','tin']);
            }
        });
    }
}
