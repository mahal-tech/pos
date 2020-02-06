<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('company_id');
            $table->integer('unit_id');
            $table->string('name');
            $table->string('model')->nullable();
            $table->string('size')->nullable();
            $table->string('image')->nullable();
            $table->integer('is_warranty')->default(0);
            $table->integer('warranty_month')->default(0);
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
        Schema::dropIfExists('products');
    }
}
