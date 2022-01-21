<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('sales', function (Blueprint $table){
            $table->id();
            $table->string('product_desc');
            $table->double('sell_price', 10,2);
            $table->integer('quantity');
            $table->string('created_by');
            $table->date('sales_date');
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
        //
        Schema::dropIfExists('sales');
    }
}
