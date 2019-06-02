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
use App\Http\Requests\SendEmailFormRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

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

    public function sendEmail(SendEmailFormRequest $request)
    {
        $from = $request->get('email');
        $subject = $request->get('subject');
        $message = $request->get('message');
        Mail::to('fareedramly@yahoo.com')->send(new SendEmail($from,$subject,$message));
        alert()->success('Your e-mail has been sent!','We will reach you soon!')->autoClose(3000);
        return redirect()->route('home');
    }
}
