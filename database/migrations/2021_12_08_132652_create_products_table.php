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
            $table->string('name');
            $table->string('slug');
            $table->integer('price_root');
            $table->integer('price_sell')->nullable();
            $table->string('code_product');
            $table->integer('category_id');
            $table->integer('rating')->nullable();
            $table->string('color')->default(0);
            $table->integer('is_view')->default(1);
            $table->integer('status');
            $table->integer('feature');
            $table->string('info_product');
            $table->string('image_product');
            $table->integer('qty')->nullable();
            $table->string('description')->nullable();
            $table->string('details')->nullable();
            $table->string('reviews')->nullable();
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
