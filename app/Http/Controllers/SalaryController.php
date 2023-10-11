<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\User;
class SalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:salary_sheet.index'])->only(['index']);
        $this->middleware(['permission:salary_sheet.create'])->only(['create']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->isMethod('post'))
        {
            //dd($request->month);
            $salary_sheets = Salary::with('employee')->where('year',$request->year)->where('month',$request->month)->whereHas('employee',function($q){
                $q->where('id','!=','1');})->get()->all();
        }
        else{
            $salary_sheets = Salary::with('employee')->where('year',date('Y'))->where('month',date('m'))->whereHas('employee',function($q){
                $q->where('id','!=','1');})->get()->all();
        }
        
        //dd(date('m'));
        //d($salary_sheets);
        return view('payroll.salary.salary_sheet')->with(compact('salary_sheets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $check = Salary::where('year',date('Y'))->where('month',date('m'))->get()->all();
        return view('payroll.salary.generate_salary')->with(compact('check'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employee_list = User::with('info')->where('id','!=','1')->get()->all();
        //dd(date('Y-m-d'));
        //dd($employee_list);
        $check = Salary::where('year',date('Y'))->where('month',date('m'))->get()->all();
        if(!$check)
        {
            foreach ($employee_list as $employee) {
            $salary_sheet = new Salary();
            $salary_sheet->user_id = $employee->id;
            $salary_sheet->date = date('Y-m-d');
            $salary_sheet->year = date('Y');
            $salary_sheet->month = date('m');
            $salary_sheet->basic = $employee->info->salary;
            $salary_sheet->food_bill = $employee->info->food_bill;
            $salary_sheet->amount = $employee->info->salary + $employee->info->food_bill;
            $salary_sheet->current_balance = $employee->info->salary + $employee->info->food_bill;
            $salary_sheet->save();
            }
            return redirect(route('salary.create'))->with('success','Salary Generate Successfully');
        }
        else{
            return redirect(route('salary.create'))->with('error','Salary Already Generate for This Month');
        }
        
       
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    public function updateAdvance(Request $request){

        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data);die;
            $salary = Salary::findorFail($data['pk']);
            $salary->advance = $data['value'];
            $salary->current_balance = $salary->basic + $salary->food_bill - $data['value'];
            $current =  $salary->current_balance;
            $salary->update();
            //Salary::where('id',$data['pk'])->update(['advance'=>$data['value']]);
            return response()->json(['value'=>$data['value'],'pk'=> $data['pk'], 'current'=>$current]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
