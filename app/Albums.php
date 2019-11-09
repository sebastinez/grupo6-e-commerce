<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    public $table = "albums";
    public $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ["name","label","cover","total_tracks", "release_date"];
}