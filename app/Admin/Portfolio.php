<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\PortfolioDetail;


class Portfolio extends Model
{
    protected $fillable = ['title'];

    public function details()
    {
        return $this->hasOne(PortfolioDetail::class);
    }
}
