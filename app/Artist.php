<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public $table = "artist";
    public $primaryKey = "id";
    public $timestamps = false;
    //protected $fillable = [];

    public function album()
    {
        return $this->belongsToMany("App\Album", "album_artist");
    }
}
