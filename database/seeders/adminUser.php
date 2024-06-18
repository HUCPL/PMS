<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class adminUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name'=>'superAdmin',
            'email'=>'superAdmin@admin.com',
            'password'=>bcrypt('superAdmin@123456$#'),
            'role_as'=>10 //superAdmin
        ];
        User::create($data);
    }
}
