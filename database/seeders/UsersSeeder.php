<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersData = [
            [
               'name'   =>'Admin',
               'cpf'=>'15979124098',
                'type' => 1,
               'email'  =>'admin@example.com',
               'password' => Hash::make('12345678')
            ],
            [
               'name'       => 'donohotel',
               'email'      => 'donohotel@example.com',
               'cpf'=>'11111111111',
               'type'   => 0,
               'password'   => Hash::make('12345678')
                
            ],
        ];
        foreach ($usersData as $key => $val) {
            User::create($val);
            
            
        }
    }
}
