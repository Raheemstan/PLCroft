<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProfitLoss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('profit_loss', function (Blueprint $table){
            $table->id();
            $table->string('pl_id');
            $table->string('transaction_type');
            $table->double('amount', 10, 2);
            $table->timestamps('time_created');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('profit_loss');
    }
}
