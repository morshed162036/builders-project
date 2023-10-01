<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Payroll\Info_user;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = [
            ['id'=>'1','name'=>'Morshed Ahmed','email'=>'superadmin@gmail.com','phone'=>'017','status'=>'Active','designation_id'=>1,'address'=>'abc','password'=>'$2a$12$/Wla/XJzQB7ZdUl/eCCxtOnndvu/8If2xyCTdddOyD1gDhdNN7TyC']
        ];
        $info = ['id'=>'1','user_id'=>'4','joining_date'=>'2023-07-23','salary'=>'100000','available_status'=>'Available'];
        User::insert($superAdmin);
        User::find(1)->assignRole('Super Admin');
        Info_user::insert($info);
    }
}
