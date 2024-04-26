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
               'name'   =>'donohotel1',
               'cpf'=>'15979124098',
                'type' => 0,
                'email' => 'donohotel1@example.com',
               'password' => Hash::make('12345678')
            ],
            [
               'name'       => 'donohotel2',
               'email'      => 'donohotel2@example.com',
               'cpf'=>'11111111111',
               'type'   => 0,
               'password'   => Hash::make('12345678')
                
            ],
            [
               'name'       => 'Ricado',
               'email'      => 'donohotelricador1@example.com',
               'cpf'=>'148.302.640-04',
               'type'   => 0,
               'password'   => Hash::make('12345678')
                
            ],
            
        ];
        foreach ($usersData as $key => $val) {
            User::create($val);
            
            
        }
    }
}
