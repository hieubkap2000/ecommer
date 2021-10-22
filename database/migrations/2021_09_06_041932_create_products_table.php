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
            $table->string('product_name');
            $table->string('product_code');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('thumbnail');
            $table->text('images');
            $table->string('price');
            $table->string('discount')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->integer('quantity');
            $table->text('short_description')->nullable();
            $table->text('content')->nullable();
            $table->string('quantity_sold')->nullable();
            $table->string('number_favorites')->nullable();
            $table->string('sort_order');
            $table->string('slug');
            $table->string('status');
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
