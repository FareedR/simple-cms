<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['first_name','last_name','image','position'];
}
