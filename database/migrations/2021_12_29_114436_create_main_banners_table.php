<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_banners', function (Blueprint $table) {
            $table->id();
            $table->string('main_banner_1');
            $table->string('start_price')->nullable();
            $table->string('name_product')->nullable();
            $table->string('sale_offer')->nullable();
            $table->integer('is_view')->default(1);
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
        Schema::dropIfExists('main_banners');
    }
}
