<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    // filhas
    public function quartos():HasMany
    {
        return $this->hasMany(Quarto::class);
    }
}
