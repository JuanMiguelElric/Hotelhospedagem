<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Imagem extends Model
{
    use HasFactory;
    protected $table = 'imagens_quartos';
    protected $fillable = [
        'imagem',
        'quartos_id',
    ];
    public function quarto():BelongsTo
    {
        return $this->belongsTo(Quarto::class,'quartos_id');
    }
}
