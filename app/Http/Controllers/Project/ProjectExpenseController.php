<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project\Project;
use App\Models\Project\Project_expense;
class ProjectExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Project_expense::with('project')->get();
        return view('project-management.project-setup.project-expense.index')->with(compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::where('status','Start')->orWhere('status','Ongoing')->get();
        return view('project-management.project-setup.project-expense.create')->with(compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $rules = [
            'project_id'=>'required',
            'title'=>'required',
            'amount'=>'required',
            'date'=>'required',
            ];
        $this->validate($request,$rules);
        $expense = new Project_expense();
        $expense->project_id = $request->project_id;
        $expense->title = $request->title;
        $expense->description = $request->description;
        $expense->amount = $request->amount;
        $expense->date = $request->date;
        $expense->save();

        return redirect(route('project-otherexpense.index'))->with('success','Expense Add In Project Successfully');
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
        $expense = Project_expense::findorFail($id);
        $projects = Project::where('status','Start')->orWhere('status','Ongoing')->get();
        return view('project-management.project-setup.project-expense.edit')->with(compact('expense','projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'project_id'=>'required',
            'title'=>'required',
            'amount'=>'required',
            'date'=>'required',
            ];
        $this->validate($request,$rules);
        $expense = Project_expense::findorFail($id);
        $expense->project_id = $request->project_id;
        $expense->title = $request->title;
        $expense->description = $request->description;
        $expense->amount = $request->amount;
        $expense->date = $request->date;
        $expense->update();

        return redirect(route('project-otherexpense.index'))->with('success','Expense Update from Project Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Project_expense::findorFail($id)->delete();
        return redirect(route('project-otherexpense.index'))->with('success','Expense Delete from Project Successfully');
    }
}
