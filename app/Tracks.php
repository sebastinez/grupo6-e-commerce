<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracks extends Model
{
    public $table = "tracks";
    public $primaryKey = "id";
    public $timestamps = false;
    //protected $fillable = [];
}
