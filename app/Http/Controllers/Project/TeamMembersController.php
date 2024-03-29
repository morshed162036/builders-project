<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Payroll\Info_user;
use App\Models\Project\Team;
use App\Models\Project\Team_member;
class TeamMembersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:team_member.index'])->only(['index']);
        $this->middleware(['permission:team_member.create'])->only(['create']);
        $this->middleware(['permission:team_member.edit'])->only(['edit']);
        $this->middleware(['permission:team_member.delete'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->all_member_cost();
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
        $employees = User::with(['designation','info'])->where('status','Active')->where('id','!=','1')->whereHas('info',function($q){
            $q->where('available_status','Available');})->get();
        //dd($employees);
        return view('project-management.team-setup.team-members.create')->with(compact('teams','employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'team_id'=>'required',
            'employee_id'=>'required',
            'join_date'=>'required',
            ];
        $this->validate($request,$rules);
        $team_member = new Team_member();
        $team_member->team_id = $request->team_id;
        $team_member->user_id = $request->employee_id;
        $team_member->join_date = $request->join_date;
        $team_member->save();

        $user = Info_user::where('user_id',$request->employee_id)->get()->first();
        $user->available_status = 'Project';
        $user->update();
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
        if($team_member->leave_date == null && $request->leave_date != null)
        {
            $user = Info_user::where('user_id',$request->employee_id)->get()->first();
            $user->available_status = 'Available';
            $user->update();
        }
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

    public static function all_member_cost():void
    {
        $members = Team_member::with('team','employee')->get();
        
        foreach ($members as $member) {
            if($member->leave_date)
            {
                $start = Carbon::parse($member->join_date);
                $end =  Carbon::parse($member->leave_date);
            
                $days = $end->diffInDays($start);

                $employee_salary = Info_user::select('salary')->where('user_id',$member->user_id)->get()->first();
                //dd($employee_salary->salary);
                $daily_salary = $employee_salary->salary / 26;

                $member->cost = $days * $daily_salary;
                $member->working_day = $days;
                $member->update();
            }
            else
            {
                $start = Carbon::parse($member->join_date);
                $end =  Carbon::now();
            
                $days = $end->diffInDays($start);

                $employee_salary = Info_user::select('salary')->where('user_id',$member->user_id)->get()->first();
                //dd($employee_salary->salary);
                $daily_salary = $employee_salary->salary / 26;

                $member->cost = $days * $daily_salary;
                $member->working_day = $days;
                $member->update();
            }
        }
    }
}
