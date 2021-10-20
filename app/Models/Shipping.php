<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable=['type','small','status','region','medium','large','xlarge'];
}
