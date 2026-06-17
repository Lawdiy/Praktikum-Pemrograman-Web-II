<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();
        $userModel->save([
            'username' => 'admin',
            'email'    => 'admin@admin.com',
            'password' => 'password123',
        ]);
    }
}