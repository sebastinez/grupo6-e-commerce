<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    public $table = "genres";
    public $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ["name"];

    public function albumes()
    {
        return $this->hasMany("App\Albums", "genres_id", "id");
    }
}
