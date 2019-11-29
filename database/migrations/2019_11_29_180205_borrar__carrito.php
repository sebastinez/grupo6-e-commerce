<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BorrarCarrito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists("album_cart");
        Schema::dropIfExists("cart");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create("album_cart", function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedSmallInteger("album_id");
            $table->unsignedSmallInteger("cart_id");
        });
        Schema::create("cart", function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedSmallInteger("user_id");
        });
    }
}
