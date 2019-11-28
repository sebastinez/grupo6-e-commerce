<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $table = "cart";
    public $primaryKey = "id";
    public $timestamps = false;
    //protected $fillable = [];

    public function user()
    {
        return $this->belongsTo("App\User");
    }
    public function album()
    {
        return $this->belongsToMany("App\Album", "album_cart");
    }
}
