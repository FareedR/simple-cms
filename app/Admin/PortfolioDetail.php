<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Portfolio;
class PortfolioDetail extends Model
{
    protected $fillable = ['portfolio_id','image','url','client','duration'];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
}
