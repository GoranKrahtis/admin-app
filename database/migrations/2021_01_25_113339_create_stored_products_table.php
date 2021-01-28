<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoredProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stored_product', function (Blueprint $table) {
            $table->string('product_url')->primary();
            $table->string('base_url');
            $table->string('sku');
            $table->foreign('base_url')->references('base_url')->on('store');
            $table->foreign('sku')->references('sku')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stored_product');
    }
}
