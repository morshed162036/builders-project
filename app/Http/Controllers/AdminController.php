<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use Illuminate\Support\Facades\File;
use App\Models\Designation;
use App\Models\Payroll\Benefit;
use App\Models\Payroll\Benefits_user;
use App\Models\Payroll\Info_user;
use App\Models\User;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('designation')->get();
        //dd($users);
        return view('payroll.user.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $designations = Designation::where('status','Active')->Where('type','Employee')->get();
        $benefits = Benefit::get();
        return view('payroll.user.create')->with(compact('designations','benefits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->email);
        $user->designation_id = $request->designation_id;
        $user->address = $request->address;
        $user->type = $request->type;
        if($request->hasFile('image')){
            $image_temp = $request->file('image');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/profile_image/'.$imageName;
                Image::make($image_temp)->save($imagePath);
                $user->image = $imageName;
            }
        }

        $user->save();
        $user_id = $user->id;

        $info = new Info_user();
        $info->user_id = $user_id;
        $info->joining_date = $request->joining_date;
        $info->salary = $request->salary;
        $info->food_bill = $request->food_bill;
        $info->total_salary = $request->food_bill + $request->salary;
        $info->save();

        foreach ($request['group-benefit'] as $benefit) {
            if($benefit['benefit_id'] != 0)
            {
                $benefit_user = new Benefits_user();
                $benefit_user->user_id = $user_id;
                $benefit_user->benefit_id = $benefit['benefit_id'];
                $benefit_user->save();
            }
            
        }

        return redirect(route('user.index'))->with('success','User Create Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('designation','info','benefits')->where('id',$id)->get()->first();
        //dd($user);
        return view('payroll.user.show')->with(compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::with('designation','info','benefits')->where('id',$id)->get()->first();
        //dd($user);
        $designations = Designation::where('status','Active')->Where('type','Employee')->get();
        $benefits = Benefit::get();
        return view('payroll.user.edit')->with(compact('user','designations','benefits'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd(count($request['group-benefit']));
        $user = User::findorFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->designation_id = $request->designation_id;
        $user->address = $request->address;
        
        //dd($user);
        if($request->hasFile('image')){
            $exists = 'images/profile_image/'.$user->image;
            if(File::exists($exists))
            {
                File::delete($exists);
            }
            $image_temp = $request->file('image');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/profile_image/'.$imageName;
                Image::make($image_temp)->save($imagePath);
                $user->image = $imageName;
            }
        }
        $user->update();

        $info = Info_user::where('user_id',$id)->get()->first();
        //dd($info);
        $info->joining_date = $request->joining_date;
        $info->resign_date = $request->resign_date;
        $info->salary = $request->salary;
        $info->food_bill = $request->food_bill;
        $info->total_salary = $request->food_bill + $request->salary;
        $info->update();
        Benefits_user::where('user_id',$id)->delete();
        
        foreach ($request['group-benefit'] as $benefit) {
            if($benefit['benefit_id'] != 0)
            {
                $benefit_user = new Benefits_user();
                $benefit_user->user_id = $id;
                $benefit_user->benefit_id = $benefit['benefit_id'];
                $benefit_user->save();
            }
            
        }
        return redirect(route('user.index'))->with('success','User Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findorFail('id',$id);
        $exists = 'images/profile_image/'.$user->image;
        if(File::exists($exists))
        {
            File::delete($exists);
        }
        $user->delete();
        Info_user::where('user_id',$id)->delete();
        Benefit_user::where('user_id',$id)->delete();
    }
    public function updateUserStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 'Inactive';
            }
            else{
                $status = 'Active';
            }
            User::where('id',$data['user_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'user_id'=> $data['user_id']]);
        }
    }
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $valodate = $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required',
            ]);

            if(Auth::guard('web')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>'Active','type'=>'Admin'])){
                return redirect('dashboard');
                }
            else{
                return redirect()->back()->with('error','Invalid Email or Password');
            }
        }
        return view('login');
    }
    public function logout(){
        Auth::guard('web')->logout();
        return redirect('login');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
}
