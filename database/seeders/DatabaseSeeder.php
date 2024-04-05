<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Estado;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       /* $usersData = [
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
            Estado::create($val);
            
            
            
        }*/
        Model::unguard( );
        $this->call(EstadosSeeder::class);
    }
}
