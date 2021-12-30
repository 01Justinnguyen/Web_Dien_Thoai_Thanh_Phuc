<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_banners', function (Blueprint $table) {
            $table->id();
            $table->string('small_banner_1');
            $table->string('small_banner_2');
            $table->string('sub_banner');
            $table->integer('is_view_1')->default(1);
            $table->integer('is_view_2')->default(1);
            $table->integer('is_view_sub')->default(1);
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
        Schema::dropIfExists('sub_banners');
    }
}
