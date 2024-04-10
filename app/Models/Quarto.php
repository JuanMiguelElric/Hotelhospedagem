<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quarto extends Model
{
    use HasFactory;
    protected $table = 'quartos';
    protected $fillable = [
        'quarto',
        'descricao',
        'valor',
        'quantidade_pessoas',
        'tipo_quarto',
        'hotel_id',
    ];
    public function imagens():HasMany
    {
        return $this->hasMany(Imagem::class);
    }
}
