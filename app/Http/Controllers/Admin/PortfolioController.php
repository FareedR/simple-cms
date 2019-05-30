<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Portfolio;
use App\Admin\PortfolioDetail;

class PortfolioController extends Controller
{
    public function listPortfolio()
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolios.index',compact('portfolios'));
    }

    public function createPortfolio()
    {
        return view('admin.portfolios.create');
    }

    public function storePortfolio(Request $request)
    {
        if($request->hasFile('image')){
            $image = $request->file('image')->store('portfolios','public');            
        }

        $portfolio = new Portfolio([
            'title' => $request->get('title'),
        ]);
        $portfolio->save();

        $portfolioDetail = new PortfolioDetail([
            'portfolio_id' => $portfolio->id,
            'image' => $image,
            'client' => $request->get('client'),
            'url' => $request->get('url'),
            'duration' => $request->get('duration'),
        ]);
        $portfolioDetail->save();

        toastr()->success('Portfolio has been added!');
        return redirect()->route('list-portfolio');
    }

    public function editPortfolio($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolios.edit',compact('portfolio'));
    }

    public function updatePortfolio(Request $request,$id)
    {
        $portfolio = Portfolio::findOrFail($id);

        if($request->hasFile('image')){
            $oldImage = Storage::disk('public')->delete($portfolio->details()->first()->image);
            $image = $request->file('image')->store('portfolios','public');
            $portfolio->details()->update([
                'image' => $image
            ]);
        }
        $portfolio->title = $request->get('title');
        $portfolio->details()->update([
            'url' => $request->get('url'),
            'client' => $request->get('client'),
            'duration' => $request->get('duration')
        ]);
        
        $portfolio->save();

        toastr()->success('Portfolio has been updated');
        return redirect()->route('list-portfolio');
    }

    public function deletePortfolio($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        \Storage::disk('public')->delete($portfolio->details()->first()->image);
        $portfolio->details()->delete();
        $portfolio->delete();
    }
}
