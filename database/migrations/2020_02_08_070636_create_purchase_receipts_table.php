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
            $table->integer('amount');
            $table->integer('transport_cost')->nullable();
            $table->integer('gift_on_purchase')->nullable();
            $table->integer('paid')->nullable();
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
