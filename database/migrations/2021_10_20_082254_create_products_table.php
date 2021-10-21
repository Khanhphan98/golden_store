<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('itemName', 100);
            $table->string('itemCode', 40);
            $table->integer('newPrice');
            $table->integer('oldPrice')->nullable();
            $table->string('size')->nullable();
            $table->integer('countItems')->default(0);
            $table->string('category')->nullable();
            $table->string('brand')->nullable();
            $table->string('itemSex')->nullable();
            $table->string('itemNote')->nullable();
            $table->string('itemImage')->nullable();
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
