<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllowedUser extends Model
{
    public $timestamps = false;
    protected $connection = 'mysql2';
    //
}
