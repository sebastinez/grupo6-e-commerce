<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    public $table = "albums";
    public $primaryKey = "id";
    public $timestamps = false;
    public $guarded = [];
}
