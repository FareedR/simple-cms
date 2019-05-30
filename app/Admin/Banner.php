<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['title','image','description','status'];
}
