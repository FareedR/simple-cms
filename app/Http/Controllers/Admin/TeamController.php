<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\TeamFormRequest;
use App\Http\Controllers\Controller;
use App\Admin\Team;

class TeamController extends Controller
{
    public function listTeam()
    {
        $teams = Team::all();
        return view('admin.teams.index',compact('teams'));
    }

    public function createTeam()
    {
        return view('admin.teams.create');
    }

    public function storeTeam(TeamFormRequest $request)
    {
        if($request->hasFile('image')){
            $image = $request->file('image')->store('teams','public');
        }
        
        $team = new Team ([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'position' => $request->get('position'),
            'image' => $image
        ]);
        $team->save();

        toastr()->success('New team member has been added!');
        return redirect()->route('list-team');
    }

    public function editTeam($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.teams.edit',compact('team'));
    }

    public function updateTeam(TeamFormRequest $request,$id)
    {
        $team = Team::findOrFail($id);
        if($request->hasFile('image')){
            $oldImage = \Storage::disk('public')->delete($team->image);
            $image = $request->file('image')->store('teams','public');
            $team->image = $image;
        }

        $team->first_name = $request->get('first_name');
        $team->last_name = $request->get('last_name');
        $team->position = $request->get('position');
        $team->save();
        toastr()->success('Team Member has been updated!');
        return redirect()->route('list-team');
    }

    public function deleteTeam($id)
    {
        $team = Team::findOrFail($id);
        \Storage::disk('public')->delete($team->image);
        $team->delete();
    }
}
