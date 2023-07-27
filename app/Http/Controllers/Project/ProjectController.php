<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project\Client;
use App\Models\Project\Project;
use App\Models\Project\Project_machine;
use App\Models\Project\Project_expense;
use App\Models\Project\Team;
use App\Models\Project\Team_member;
use App\Models\Invoice\Invoice;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->all_project_cost();
        $projects = Project::with('client','team')->get();
        //dd($projects);
        return view('project-management.project-setup.project.index')->with(compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::where('status','!=','Inactive')->get();
        return view('project-management.project-setup.project.create')->with(compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $project  = new Project();
        $project->name = $request->project_name;
        $project->client_id = $request->client_id;
        $project->save();
        return redirect(route('project.index'))->with('success','Project Create Successfully!!');
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
        $clients = Client::get();
        $project = Project::with('team')->findorFail($id);
        $teams = Team::where('status','Active')->where('project_id',0)->get();
        //dd($project);
        return view('project-management.project-setup.project.edit')->with(compact('clients','project','teams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::findorFail($id);
        $project->name = $request->project_name;
        $project->client_id = $request->client_id;
        $project->starting_date = $request->starting_date;
        $project->expected_finished_date = $request->expected_finished_date;
        $project->finished_date = $request->finished_date;
        $project->status = $request->status;
        $project->update();
        if($request->team_id){
            $team = Team::findorFail($request->team_id);
            $team->project_id = $id;
            $team->update();
        }
        
        return redirect(route('project.index'))->with('success','Project Update Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }

    public function projectSetup()
    {
        $projects = Project::where('status','Just Create')->orWhere('status','Estimate')->get();
        $teams = Team::where('status','Active')->where('project_id',0)->get();
        return view('project-management.project-setup.project-start.start')->with(compact('teams','projects'));
    }

    public function saveSetup(Request $request)
    {
        //dd($request->all());
        $project = Project::findorFail($request->project_id);
        $project->status = 'Start';
        $project->starting_date = $request->start_date;
        //dd($project->starting_date);
        $project->update();

        $team = Team::findorFail($request->team_id);
        $team->project_id = $request->project_id;
        $team->update();
        return redirect(route('project.index'))->with('success','Project Start Successfully!!');
    }

    public function all_project_cost():void
    {
        TeamMembersController::all_member_cost();
        ProjectMachineController::all_cost_calculation();
        $projects = Project::with('client','team')->get();

        foreach ($projects as $project) {
            //$project_cost = 0;
            $machine_cost = 0; $invoice_cost = 0; $expense_cost = 0; $employee_cost = 0;
            //dd($project);
            $machine_cost = Project_machine::where('project_id',$project->id)->sum('total_cost');
            //dd($machine_cost);
            $invoice_cost = Invoice::where('project_id',$project->id)->sum('total_amount');
            //dd($invoice_cost);
            $expense_cost = Project_expense::where('project_id',$project->id)->sum('amount');
            //dd($expense_cost);
            if($project->team)
            {
                $employee_cost = Team_member::where('team_id',$project->team->id)->sum('cost');
                //dd($employee_cost);
            }
            
            $project->actual_cost = $machine_cost + $invoice_cost + $expense_cost + $employee_cost;
            $project->update();
            
        }
    }
}
