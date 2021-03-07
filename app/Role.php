<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Codec\TimestampLastCombCodec;

class Role extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;
}
