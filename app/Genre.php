<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $table = "genre";
    public $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ["name"];

    public function album()
    {
        return $this->hasMany("App\Album");
    }
}
