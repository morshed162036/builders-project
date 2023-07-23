<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project\Team;
use App\Models\Project\Team_member;
class TeamMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Team_member::with('team','employee')->get();
        //dd($members);
        return view('project-management.team-setup.team-members.index')->with(compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::where('status','Active')->get();
        $employees = User::with(['designation','info'])->where('status','Active')->whereHas('info',function($q){
            $q->where('available_status','Available');})->get();
        //dd($employees);
        return view('project-management.team-setup.team-members.create')->with(compact('teams','employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $team_member = new Team_member();
        $team_member->team_id = $request->team_id;
        $team_member->user_id = $request->employee_id;
        $team_member->join_date = $request->join_date;
        $team_member->save();
        return redirect(route('team-members.index'))->with('success','Member Add Successfully');
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
        $member = Team_member::with('team','employee')->findorFail($id);
        $teams = Team::where('status','Active')->get();
        $employees = User::with(['designation','info'])->where('status','Active')->whereHas('info',function($q){
            $q->where('available_status','Available');})->get();
        //dd($employees);
        return view('project-management.team-setup.team-members.edit')->with(compact('member','teams','employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $team_member = Team_member::findorFail($id);
        $team_member->join_date = $request->join_date;
        $team_member->leave_date = $request->leave_date;
        $team_member->update();
        return redirect(route('team-members.index'))->with('success','Member Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Team_member::findorFail($id)->delete();
        return redirect(route('team-members.index'))->with('success','Member Delete Successfully');

    }
}
