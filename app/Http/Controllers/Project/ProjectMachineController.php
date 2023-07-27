<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project\Project;
use App\Models\Project\Project_machine;
use App\Models\Stock\Machine_stock;
use DateTime;
use Carbon\Carbon;
class ProjectMachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->all_cost_calculation();
        $project_machines = Project_machine::with('project','stock')->get();
        return view('project-management.project-setup.project-machine.index')->with(compact('project_machines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::where('status','Start')->orWhere('status','Ongoing')->get();
        $machines = Machine_stock::with('product')->get();
        return view('project-management.project-setup.project-machine.create')->with(compact('projects','machines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $rules = [
            'project_id'=>'required',
            'issue_date'=>'required',
            ];
        $this->validate($request,$rules);
        foreach ($request['group-machine'] as $machine) {
            if($machine['machine_id'] != 0)
            {
                if($machine['qnt'] != 0){
                    $stock_machine = Machine_stock::with('product')->findorFail($machine['machine_id']);
                    //dd($stock_machine->available);
                    if($stock_machine->available >= $machine['qnt'])
                    {
                        if($stock_machine->hourly_rent != 0 && $stock_machine->daily_hour != 0)
                        {
                            for($i = 1; $i <= $machine['qnt']; $i++)
                            {
                                $project_machine = new Project_machine();
                                $project_machine->project_id = $request->project_id;
                                $project_machine->issue_date = $request->issue_date;
                                $project_machine->stock_machine_id = $machine['machine_id'];
                                $project_machine->hourly_rent = $stock_machine->hourly_rent;
                                $project_machine->save();
                                
                            }
                                //dd($stock_machine->available);
                                $stock_machine->available -= $machine['qnt'];
                                $stock_machine->update();
                        }
                        else{
                            return redirect(route('project-machine.index'))->with('error', $stock_machine->product->title.' Hourly Rent Or Daily Hour Not Set Yet In Stock Table');
                        }
                    }
                    else{
                        return redirect(route('project-machine.index'))->with('error', $stock_machine->product->title.' has not available stock');
                    }
                    
                }
                else{
                    return redirect(route('project-machine.index'))->with('error', 'Please not set 0 as Machine Quantity');
                }
                
            }
            else{
                return redirect(route('project-machine.index')->with('error','Machine not selected'));
            }
        }
        return redirect(route('project-machine.index'))->with('success','Machine Add In Project Successfully');
        
        
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
        $project_machine = Project_machine::with('project','stock')->findorFail($id);
        return view('project-management.project-setup.project-machine.edit')->with(compact('project_machine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'release_date'=>'required',
            ];
        $this->validate($request,$rules);
        $project_machine = Project_machine::findorFail($id);
        $stock_id = $project_machine->stock_machine_id;
        $project_machine->release_date = $request->release_date;
        $project_machine->update();

        $stock = Machine_stock::findorFail($stock_id);
        $stock->available += 1;
        $stock->update();
        return redirect(route('project-machine.index'))->with('success','Machine Update In Project Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public static function all_cost_calculation():void
    {

        $project_machines = Project_machine::with('project','stock')->get();

        foreach ( $project_machines as $project_machine)
        {
            if($project_machine->release_date)
            {
                $start = Carbon::parse($project_machine->issue_date);
                $end =  Carbon::parse($project_machine->release_date);
            
                $days = $end->diffInDays($start);
                
                $stock = Machine_stock::findorfail($project_machine->stock_machine_id);

                // $project_machine->hourly_rent = $stock->hourly_rent;
                $project_machine->total_hour = $stock->daily_hour * $days;
                $project_machine->total_cost = $stock->daily_hour * $days * $project_machine->hourly_rent ;
                $project_machine->update();
            }
            else{
                $start = Carbon::parse($project_machine->issue_date);
                $end =  Carbon::now();
            
                $days = $end->diffInDays($start);
                
                $stock = Machine_stock::findorfail($project_machine->stock_machine_id);

                // $project_machine->hourly_rent = $stock->hourly_rent;
                $project_machine->total_hour = $stock->daily_hour * $days;
                $project_machine->total_cost = $stock->daily_hour * $days * $project_machine->hourly_rent ;
                $project_machine->update();
            }
        }
    }
}
