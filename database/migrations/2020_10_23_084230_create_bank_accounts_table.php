<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_name');
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('bank_address')->nullable();
            $table->bigInteger('account_gl_id');
            $table->bigInteger('charge_gl_id');
            $table->tinyInteger('type')->comment('0=Savings Account, 1=Current Account, 2=Credit Account, 3=Cash Account');
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
        Schema::dropIfExists('bank_accounts');
    }
}
