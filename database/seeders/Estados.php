<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Estados extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stateDados = 
        [
        
            ['estado'=> 'Acre'],
            ['estado'=> 'Alagoas'],
            ['estado'=>'Amapá'],
            ['estado'=>'Amazonas'],
            ['estado'=>'Bahia'],
            ['estado'=>'Ceará'],
            ['estado'=>'Espírito Santo'],
            ['estado'=>'Goiás'],
            ['estado'=>'Maranhão'],
            ['estado'=>'Mato Grosso'],
            ['estado'=>'Mato Grosso do Sul'],
            ['estado'=>'Minas Gerais'],
            ['estado'=>'Pará'],
            ['estado'=>'Paraíba'],
            ['estado'=>'Paraná'],
            ['estado'=>'Pernambuco'],
            ['estado'=>'Piauí'],
            ['estado'=>'Rio de Janeiro'],
            ['estado'=>'Rio Grande do Norte'],
            ['estado'=>'Rio Grande do Sul'],
            ['estado'=>'Rondônia'],
            ['estado'=>'Roraima'],
            ['estado'=>'Santa Catarina'],
            ['estado'=>'São Paulo'],
            ['estado'=>'Sergipe'],
            ['estado'=>'Tocantins'],
            ['estado'=>'Distrito Federal'],
        ];
        foreach ($stateDados as $key => $val) {
            Estado::create($val);
            
            
            
        }
    }
}
