<?php

namespace App\Http\Controllers\Pedidos\Pagamento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    //
    public function create()
    {
        return view('usuario.pagamento.pagamentos');
    }
}
