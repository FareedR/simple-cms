<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Skill;
class SkillController extends Controller
{
    public function listSkill()
    {
        $skills = Skill::all();
        return view('admin.skills.index',compact('skills'));
    }

    public function createSkill()
    {
        return view('admin.skills.create');
    }

    public function storeSkill(Request $request)
    {
        $skill = new Skill([
            'title' => $request->get('title'),
            'percentage' => $request->get('percentage')
        ]);
        $skill->save();

        toastr()->success('Skill has been added!');
        return redirect()->route('list-skill');
    }

    public function editSkill($id)
    {
        $skill = Skill::findOrFail($id);
        return view('admin.skills.edit',compact('skill'));
    }

    public function updateSkill(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);

        $skill->title = $request->get('title');
        $skill->percentage = $request->get('percentage');

        $skill->save();
        toastr()->success('Skill has been updated');
        return redirect()->route('list-skill');
    }

    public function deleteSkill($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();
    }
}
