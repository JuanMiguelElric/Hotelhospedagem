<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PedidosnaoFinalizado extends Model
{
    use HasFactory;
    protected $table = 'pedidosnaofinalizados';
    protected $fillable =[
        'quarto_id',
        'hotel_id',
        'usuario_id',
        'valor_total',
        'data_inicial',
        'data_final',
    ];
    public function quarto():BelongsTo
    {
        return $this->belongsTo(Quarto::class);
    }
    public function hotel():BelongsTo
    {
        return $this->belongsTo(Hotel::class);

    }
    public function usuario():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
