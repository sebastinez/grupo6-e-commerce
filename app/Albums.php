<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    public $table = "albums";
    public $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ["name", "label", "cover", "total_tracks", "release_date"];

    public function artists()
    {
        return $this->belongsToMany("App\Artists", "artists_albums", "albums_id", "artists_id");
    }
    public function tracks()
    {
        return $this->hasMany("App\Tracks", "album_id", "id");
    }
}
