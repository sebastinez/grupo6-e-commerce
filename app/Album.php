<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $table = "album";
    public $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ["name", "label", "cover", "total_tracks", "release_date"];

    public function artist()
    {
        return $this->belongsToMany("App\Artist");
    }
    public function track()
    {
        return $this->hasMany("App\Track");
    }
    public function genre()
    {
        return $this->belongsTo("App\Genre");
    }
}
