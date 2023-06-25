<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project\Client;
use App\Models\Project\Project;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::get();
        return view('project-management.project-setup.project.index')->with(compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::get();
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
        $project = Project::findorFail($id)->get()->first();
        return view('project-management.project-setup.project.edit')->with(compact('clients','project'));
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
        return redirect(route('project.index'))->with('success','Project Update Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
