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
        Schema::create("albums", function (Blueprint $table) {
            $table->increments("id");
            $table->string("spotify_id", 100);
            $table->string("name", 255);
            $table->date("release_date");
            $table->string("label", 255);
            $table->string("cover", 255);
            $table->unsignedSmallInteger("total_tracks");
        });
        Schema::create("albums_carts", function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedSmallInteger("genres_id");
            $table->unsignedSmallInteger("carts_id");
        });
        Schema::create("artists", function (Blueprint $table) {
            $table->increments("id");
            $table->string("spotify_id", 100);
            $table->string("name", 255);
        });
        Schema::create("artists_albums", function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedSmallInteger("artists_id");
            $table->unsignedSmallInteger("albums_id");
        });
        Schema::create("carts", function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedSmallInteger("user_id");
        });
        Schema::create("genres", function (Blueprint $table) {
            $table->increments("id");
            $table->string("name", 255);
        });
        Schema::create("genres_users", function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedSmallInteger("genres_id");
            $table->unsignedSmallInteger("users_id");
        });
        Schema::create("tracks", function (Blueprint $table) {
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
        Schema::dropIfExists("albums");
        Schema::dropIfExists("albums_carts");
        Schema::dropIfExists("artists");
        Schema::dropIfExists("artists_albums");
        Schema::dropIfExists("carts");
        Schema::dropIfExists("genres");
        Schema::dropIfExists("genres_users");
        Schema::dropIfExists("tracks");
    }
}
