<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Banner;
use App\Admin\Wysiwyg;
use App\Admin\Skill;
use App\Admin\Service;
use App\Admin\Portfolio;
use App\Admin\Team;
use App\Admin\Contact;

class HomeController extends Controller
{
    public function home()
    {
        $banners = Banner::where('status',1)->get();
        $aboutWysiwyg = Wysiwyg::find(1);
        $skillWysiwyg = Wysiwyg::find(2);
        $skills = Skill::all();
        $services = Service::all();
        $portfolios = Portfolio::all();
        $teams = Team::all();
        $contact = Contact::find(1);
        return view('home',compact('banners','aboutWysiwyg','skillWysiwyg','skills','services','portfolios','teams','contact'));
    }

    public function portfolioDetail($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('portfolio-detail',compact('portfolio'));
    }
}
