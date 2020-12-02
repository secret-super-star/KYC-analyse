<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'address' => 'test address',
            'DOB' => '1999-12-12',
            'sex' => 'M',
            'documenttype_id' => '1',
            'documents' => '',
            'category_id' => '1',
            'is_admin' => '1',
            'password' => bcrypt('admin'),
        ]);
    }
}
