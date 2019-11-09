<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artists extends Model
{
    public $table = "artists";
    public $primaryKey = "id";
    public $timestamps = false;
    //protected $fillable = [];
}
