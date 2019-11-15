<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    public $table = "track";
    public $primaryKey = "id";
    public $timestamps = false;
    //protected $fillable = [];
}
