<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
        [
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'telepon' => '08938949483',
            'level' => 'admin',
            'status' => '1'
        ],
        [
            'nama' => ' User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
            'telepon' => '08383883822',
            'level' => 'user',
            'status' => '0'
        ]
        ];
            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
