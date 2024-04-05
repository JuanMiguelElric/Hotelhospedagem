<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'hoteis';
    protected $fillable = [
        'nome_hotel',
        'cnpj',
        'telefone1',
        'telefone2',
        'cep',
        'cidade',
        'estado',
        'endereco',
        'bairro',
        'numero', 
        'dono_hotel_id'
    ];
}
