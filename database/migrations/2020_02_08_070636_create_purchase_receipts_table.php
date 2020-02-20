<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_receipts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id');
            $table->float('amount');
            $table->float('transport_cost')->nullable();
            $table->float('discount')->nullable();
            $table->float('gift_on_purchase')->nullable();
            $table->date('date');
            $table->integer('creator');
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
        Schema::dropIfExists('purchase_receipts');
    }
}
