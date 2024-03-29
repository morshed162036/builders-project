<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project\Team;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:team.index'])->only(['index']);
        $this->middleware(['permission:team.create'])->only(['create']);
        $this->middleware(['permission:team.edit'])->only(['edit']);
        $this->middleware(['permission:team.delete'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::with('project')->get();
        return view('project-management.team-setup.team.index')->with(compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project-management.team-setup.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $repeat = Team::where('name',$request->team_name)->get()->first();
        //dd($repeat);
        if($repeat != null){
            return redirect(route('team.index'))->with('error','Team Name Already Exist');
        }
        $team = new Team();
        $team->name = $request->team_name;
        // $team->team_type = $request->team_type;
        $team->description = $request->description;
        $team->save();
        return redirect(route('team.index'))->with('success','Team Create Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $team = Team::with('project')->findorFail($id);
        return view('project-management.team-setup.team.edit')->with(compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $repeat = Team::where('name',$request->team_name)->get()->first();
        //dd($repeat);
        if($repeat != null){
            if($id != $repeat->id){
                return redirect(route('team.index'))->with('error','Team Name Already Exist');
            }
        }
        $team = Team::findorFail($id);
        $team->name = $request->team_name;
        // $team->team_type = $request->team_type;
        if($team->project_id != 0){
            $team->project_id = $request->project_id;
        }
        
        $team->description = $request->description;
        $team->update();
        return redirect(route('team.index'))->with('success','Team Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Team::findorFail($id)->delete();
        return redirect(route('team.index'))->with('success','Team Delete Successfully');
    }

    public function updateTeamStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            //dd($data);
             //echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 'Inactive';
            }
            else{
                $status = 'Active';
            }
            Team::where('id',$data['team_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'team_id'=> $data['team_id']]);
        }
    }
}
