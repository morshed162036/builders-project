<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = [
            ['id'=>1,'name'=>'Asad','company'=>'company1','phone'=>'017xxxxxxxx','Email'=>'client1@gmail.com','address'=>'mirpur','status'=>'Inquiry','remarks'=>'Get The Details'],
            ['id'=>2,'name'=>'bashir','company'=>'company2','phone'=>'017xxxxxxxx','Email'=>'client2@gmail.com','address'=>'','status'=>'Inquiry','remarks'=>'Get The Details']
        ];
        Client::Insert($client);
    }
}
