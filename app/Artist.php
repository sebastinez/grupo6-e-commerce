<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public $table = "artist";
    public $primaryKey = "id";
    public $timestamps = false;
    //protected $fillable = [];
}
