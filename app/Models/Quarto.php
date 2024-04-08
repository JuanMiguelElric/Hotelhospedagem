<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quarto extends Model
{
    use HasFactory;
    protected $table = 'quartos';
    protected $fillable = [
        'quarto',
        'imagens',
        'descricao',
        'valor',
        'hotel_id',
    ];
}
