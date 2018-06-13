<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class session extends Model
{
    protected $fillable = ['session_key','ip','username','active'];
    //
}
