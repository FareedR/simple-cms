<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['address','tel_no','phone_no','email','weekdays','saturday','sunday'];
}
