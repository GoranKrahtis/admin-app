<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urltoproduct', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->string('url');
            $table->string('sku');
            $table->string('description')->null();
            $table->foreign('url')->references('url')->on('url');
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
        Schema::dropIfExists('productoturl');
    }
}
