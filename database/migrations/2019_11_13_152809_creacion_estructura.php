<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreacionEstructura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("album", function (Blueprint $table) {
            $table->increments("id");
            $table->string("spotify_id", 100);
            $table->unsignedSmallInteger("genre_id");
            $table->string("name", 255);
            $table->date("release_date");
            $table->string("label", 255);
            $table->string("cover", 255);
            $table->unsignedSmallInteger("total_tracks");
        });
        Schema::create("album_cart", function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedSmallInteger("album_id");
            $table->unsignedSmallInteger("cart_id");
        });
        Schema::create("artist", function (Blueprint $table) {
            $table->increments("id");
            $table->string("spotify_id", 100);
            $table->string("name", 255);
        });
        Schema::create("album_artist", function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedSmallInteger("artist_id");
            $table->unsignedSmallInteger("album_id");
        });
        Schema::create("cart", function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedSmallInteger("user_id");
        });
        Schema::create("genre", function (Blueprint $table) {
            $table->increments("id");
            $table->string("name", 255);
        });
        Schema::create("genre_user", function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedSmallInteger("genre_id");
            $table->unsignedSmallInteger("user_id");
        });
        Schema::create("track", function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedSmallInteger("album_id");
            $table->string("spotify_id", 100);
            $table->string("name", 255);
            $table->string("preview_url", 255)->nullable($value = true);
            $table->unsignedSmallInteger("track_number");
            $table->unsignedMediumInteger("duration");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("album");
        Schema::dropIfExists("album_cart");
        Schema::dropIfExists("artist");
        Schema::dropIfExists("album_artist");
        Schema::dropIfExists("cart");
        Schema::dropIfExists("genre");
        Schema::dropIfExists("genre_user");
        Schema::dropIfExists("track");
    }
}
