<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PrecioStockCantidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('album', function (Blueprint $table) {
            $table->unsignedSmallInteger('precio');
            $table->unsignedSmallInteger('stock');
        });
        Schema::table('album_cart', function (Blueprint $table) {
            $table->unsignedSmallInteger('cantidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('album', function (Blueprint $table) {
            $table->dropColumn('precio');
            $table->dropColumn('stock');
        });
        Schema::table('album_cart', function (Blueprint $table) {
            $table->dropColumn('cantidad');
        });
    }
}
