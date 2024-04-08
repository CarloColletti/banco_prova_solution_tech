<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Carlo',
            'lastname' => 'Colletti',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$E/9Cf8BBsZ5XAIx/XrTx.On4bZRCJL/VwPxQLE1a0Ybhxr4uyscm.',
            'fiscal_code' => 'CLCLCLCLCLCLCLCL',
            'address' => 'Via dei geranei',
            'province' => 'roma',
            'city' => 'anzio',
            'country' => 'italia',
            'zip_code' => '00042',
            'phone' => '3888888888',
        ]);


        $user = User::create([
            'name' => 'Marco',
            'lastname' => 'Colletti',
            'email' => 'customer@mail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$E/9Cf8BBsZ5XAIx/XrTx.On4bZRCJL/VwPxQLE1a0Ybhxr4uyscm.',
            'fiscal_code' => 'CLCLCLCLCLCLCLCC',
            'address' => 'Via dei geranei',
            'province' => 'roma',
            'city' => 'Tiburtina',
            'country' => 'italia',
            'zip_code' => '00011',
            'phone' => '388888802',
        ]);


        $user = User::create([
            'name' => 'Gino',
            'lastname' => 'Colletti',
            'email' => 'seller@mail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$E/9Cf8BBsZ5XAIx/XrTx.On4bZRCJL/VwPxQLE1a0Ybhxr4uyscm.',
            'fiscal_code' => 'CLCLCLCLCLCLCLSS',
            'address' => 'Via dei geranei',
            'province' => 'roma',
            'city' => 'Colonia',
            'country' => 'italia',
            'zip_code' => '00182',
            'phone' => '388888804',
        ]);
    }
}
