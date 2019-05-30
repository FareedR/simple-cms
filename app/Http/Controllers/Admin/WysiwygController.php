<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Wysiwyg;

class WysiwygController extends Controller
{
    public function listWYSIWYG()
    {
        $aboutWysiwyg = Wysiwyg::firstOrNew(
            ['id' => 1],
            ['content' => '']
        );
        $skillWysiwyg = Wysiwyg::firstOrNew(
            ['id' => 2],
            ['content' => '']
        );
        return view('admin.wysiwyg',compact('aboutWysiwyg','skillWysiwyg'));
    }

    public function updateAboutWYSIWYG(Request $request)
    {
        $aboutWysiwyg = Wysiwyg::updateOrCreate(
            ['id' => 1],
            ['content' => $request->get('content')]
        );

        toastr()->success('About Us page has been updated');
        return redirect()->route('list-wysiwyg');
    }

    public function updateSkillWYSIWYG(Request $request)
    {
        $skillWysiwyg = Wysiwyg::updateOrCreate(
            ['id' => 1],
            ['content' => $request->get('content')]
        );

        toastr()->success('Our Skills page has been updated');
        return redirect()->route('list-wysiwyg');
    }
}
