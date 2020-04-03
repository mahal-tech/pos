<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulkstocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulkstocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('amount');
            $table->float('product_id');
            $table->float('shop_id')->nullable();
            $table->float('bulk_unit_buy_price')->nullable();
            $table->float('bulk_unit_sale_price')->nullable();
            $table->float('general_unit_sale_price')->nullable();
            $table->float('bulk_alarming_stock')->nullable();
            $table->float('last_buy_price')->nullable();
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
        Schema::dropIfExists('bulkstocks');
    }
}
