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
            ['id'=>'1','name'=>'Morshed Ahmed','email'=>'superadmin@gmail.com','phone'=>'017','type'=>'Admin','status'=>'Active','designation_id'=>'0','address'=>'abc','password'=>'$2a$12$2Cja7jRni1k.fQ7cc8Duv.7zOGzgZv4NGGkKY1S4xo7Zsy4b4aUGm'],
            ['id'=>'2','name'=>'IEET','email'=>'admin@gmail.com','phone'=>'018','type'=>'Admin','status'=>'Active','designation_id'=>'1','address'=>'abc','password'=>'$2a$12$HsPxTs/PqLDLPrUwTSNbHOILDt33hMtawItoe2i/7hVeRVeNNDfqu']
        ];
        $info = [['id'=>'1','user_id'=>'1','joining_date'=>'2023-07-23','salary'=>'100000','food_bill'=>'1000','total_salary'=>'101000','available_status'=>'Available'],
    [
        'id'=>'2','user_id'=>'2','joining_date'=>'2023-07-23','salary'=>'100000','food_bill'=>'1000','total_salary'=>'101000','available_status'=>'Available'
    ]];
        User::insert($superAdmin);
        User::find(1)->assignRole('Super Admin');
        User::find(2)->assignRole('Admin');
        Info_user::insert($info);
    }
}
