<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\settings\Unit;
use App\Models\Project\Project;
use App\Models\Project\Project_estimation;
use App\Models\Project\Estimation_product;
use App\Models\Project\Estimation_machine;
use App\Models\Project\Estimation_employee;
use App\Models\Project\Estimation_laborer;
use App\Models\Project\Estimation_otherexpense;
use App\Models\Designation;

class ProjectEstimationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estimations = Project_estimation::with('project')->get();
        //dd($estimations);
        return view('project-management.project-setup.estimation.index')->with(compact('estimations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::where('status','Active')->get();
        $projects = Project::where('status','Just Create')->get();
        $products = Product::where('type','Product')->where('status','Active')->get();
        $machines = Product::where('type','Machine')->where('status','Active')->get();
        $employees = Designation::where('type','Employee')->where('status','Active')->get();
        $laborers = Designation::where('type','Laborer')->where('status','Active')->get();
        //dd($products);
        return view('project-management.project-setup.estimation.create')->with(compact('units','projects','products','machines','employees','laborers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $estimate_cost = 0;
        //dd($request['group-product']);
        $project_estimation = new Project_estimation();
        $project_estimation->project_id = $request->project_id;
        $project_estimation->starting_date = $request->start_date;
        $project_estimation->ending_date = $request->end_date;
        $project_estimation->holy_days = $request->holy_days;
        $project_estimation->save();
        $last_id = $project_estimation->id;

        foreach( $request['group-product'] as $product){
            //dd($product['product_id']);
            $product_cost = 0;
            $estimate_product = new Estimation_product();
            $estimate_product->estimation_id = $last_id;
            $estimate_product->product_id = $product['product_id'];
            $estimate_product->unit_id = $product['unit_id'];
            $estimate_product->qnt = $product['qnt'];
            $estimate_product->unit_price = $product['unit_price'];
            $product_cost = $product['unit_price'] * $product['qnt'];
            $estimate_cost += $product_cost;
            $estimate_product->total_cost = $product_cost;
            //dd($product_cost);
            //dd($last_id);
            $estimate_product->save();
        }
        foreach( $request['group-machine'] as $machine){
            $machine_cost = 0;
            $estimate_machine = new Estimation_machine();
            $estimate_machine->estimation_id = $last_id;
            $estimate_machine->product_id = $machine['machine_id'];
            $estimate_machine->qnt = $machine['qnt'];
            $estimate_machine->using_days = $machine['using_days'];
            $estimate_machine->daily_hours = $machine['daily_hours'];
            $estimate_machine->hourly_cost = $machine['hourly_price'];
            $machine_cost = $machine['qnt'] * $machine['using_days'] * $machine['daily_hours'] * $machine['hourly_price'];
            $estimate_cost += $machine_cost;
            $estimate_machine->total_cost = $machine_cost;
            $estimate_machine->save();
        }
        foreach( $request['group-employee'] as $employee){
            $employee_cost = 0;
            $estimate_employee = new Estimation_employee();
            $estimate_employee->estimation_id = $last_id;
            $estimate_employee->designation_id = $employee['employee_designation'];
            $estimate_employee->head_count = $employee['employee_head_count'];
            $estimate_employee->working_days = $employee['employee_working_days'];
            $estimate_employee->working_hours = $employee['employee_daily_working_hours'];
            $estimate_employee->hourly_salary = $employee['employee_hourly_salary'];
            $employee_cost = $employee['employee_head_count'] * $employee['employee_working_days'] * $employee['employee_daily_working_hours'] * $employee['employee_hourly_salary'];
            $estimate_cost += $employee_cost;
            $estimate_employee->Total_cost = $employee_cost;
            $estimate_employee->save();
        }
        foreach( $request['group-laborer'] as $laborer){
            $laborer_cost = 0;
            $estimate_laborer = new Estimation_laborer();
            $estimate_laborer->estimation_id = $last_id;
            $estimate_laborer->designation_id = $laborer['laborer_designation'];
            $estimate_laborer->head_count = $laborer['laborer_head_count'];
            $estimate_laborer->working_days = $laborer['laborer_working_days'];
            $estimate_laborer->daily_salary = $laborer['laborer_daily_salary'];
            $laborer_cost = $laborer['laborer_head_count'] * $laborer['laborer_working_days'] * $laborer['laborer_daily_salary'];
            $estimate_cost += $laborer_cost;
            $estimate_laborer->Total_cost = $laborer_cost;
            $estimate_laborer->save();
        }
        foreach( $request['group-other_expense'] as $expense){

            $estimate_expense = new Estimation_otherexpense();
            $estimate_expense->estimation_id = $last_id;
            $estimate_expense->expense_head = $expense['expense_head'];
            $estimate_expense->details = $expense['expense_details'];
            $estimate_expense->cost = $expense['expense_expected_cost'];
            $estimate_cost += $expense['expense_expected_cost'];
            $estimate_expense->save();
        }
        $estimation = Project_estimation::findorFail($last_id);
        $estimation->cost = $estimate_cost;
        $estimation->update();

        $project = Project::findorFail($request->project_id);
        $project->estimate_cost = $estimate_cost;
        $project->expected_finished_date = $request->end_date;
        $project->status = 'Estimate';
        $project->update();
        return redirect(route('project-estimation.index'))->with('success','Project Estimation Complete');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $estimation = Project_estimation::with(['project','product','machine','employee','laborer','otherexpense'])->FindorFail($id);
        //dd($estimation);
        return view('project-management.project-setup.estimation.show')->with(compact('estimation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $estimation = Project_estimation::FindorFail($id);
        dd($estimation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
