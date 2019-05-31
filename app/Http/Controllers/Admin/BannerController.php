<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\BannerFormRequest;
use App\Http\Controllers\Controller;
use App\Admin\Banner;

class BannerController extends Controller
{
    public function listBanner()
    {
        $banners = Banner::all();
        return view('admin.banners.index',compact('banners'));
    }

    public function createBanner()
    {
        return view('admin.banners.create');
    }

    public function storeBanner(BannerFormRequest $request)
    {
        if($request->hasFile('image')){
            $image = $request->file('image')->store('banners','public');
        }

        $banner = new Banner ([
            'title' => $request->get('title'),
            'image' => $image,
            'description' => $request->get('description'),
            'status' => $request->get('status')
        ]);

        $banner->save();
        toastr()->success('New banner has been created');
        return redirect()->route('list-banner');
    }

    public function editBanner($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banners.edit',compact('banner'));
    }

    public function updateBanner(BannerFormRequest $request,$id)
    {
        $banner = Banner::findOrFail($id);

        if($request->hasFile('image')){
            $oldImage = \Storage::disk('public')->delete($banner->image);
            $image = $request->file('image')->store('banners','public');
            $banner->image = $image;
        }

        $banner->title = $request->get('title');
        $banner->description = $request->get('description');
        $banner->status = $request->get('status');
        $banner->save();

        toastr()->success('Banner has been updated');
        return redirect()->route('list-banner');
    }

    public function deleteBanner($id)
    {
        $banner = Banner::findOrFail($id);
        \Storage::disk('public')->delete($banner->image);
        $banner->delete();
    }
}
