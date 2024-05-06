<?php

namespace App\Http\Controllers\Pedidos;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\PedidosnaoFinalizado;
use App\Models\Quarto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidosnaofinalizadosController extends Controller
{
    //
    public function index(){
        $id = Auth::id();
        $pedidos = PedidosnaoFinalizado::where('usuario_id',$id)->get();
        foreach ($pedidos as $pedido) {
            $idQuarto = $pedido->quarto_id;
            $idHotel = $pedido->hotel_id;
            
        }
        $quartos = Quarto::where('id',$idQuarto)->get();

        $hoteis = Hotel::where('id', $idHotel)->get();
  

        $usuario = User::findOrfail($id);



        
        
        return view('usuario.pedidos.naofinalizados',compact(['usuario','pedidos','quartos', 'hoteis']));
    }
    public function create(){
        //
    }
    public function store(Request $request,$hotel, $quarto)
    {
        $data = $request->validate([
            'data_inicial'=> 'required',
            'data_final'=> 'required',
     
        ]);
        $data_inicial = Carbon::parse($data['data_inicial']);
        $data_final = Carbon::parse($data['data_final']);
        
        $valor = $request->input('valor');

        $result = $data_inicial->diff($data_final); 
        $conver = floatval($valor);
        
        $x = $result->days; 
        $y= $conver * $x;
        $data['quarto_id']= $quarto;
        $data['hotel_id']=$hotel;
        $data['valor_total'] = $y;
        $data['usuario_id']= Auth::id();
    
        $pedidosnaofinalizado = new PedidosnaoFinalizado($data);
        if($pedidosnaofinalizado->save())
        {
            if($request->json == 1){
                return response()->json(['type'=>'success','message'=>'Pedido Realizado com sucesso'],200);
            }
            return redirect()->route('pedidos.index');
        }
        
    }
    public function PedidosNaoFinalizadosJson()
    {
        $pedidos = PedidosnaoFinalizado::where('usuario_id',auth()->id())->get();
        if($pedidos->isEmpty()){
            return response()->json(["type" => "error", "hotel" => []], 200);


        }
        $pedidosList= [];
        
    
        foreach($pedidos as $pedido){
            $a = Hotel::findOrfail($pedido->hotel_id);
            $quarto = Quarto::findOrfail($pedido->quarto_id);
            $pedidosList[]=[
                'id'=>$pedido->id,
                'hotel'=> $a->nome_hotel,
                'quarto'=> $quarto->quarto,
                'descricao'=>$quarto->descricao,
                'dataInicial '=> $pedido->data_inicial,
                'dataFinal'=> $pedido->data_final,
                'valorTotal'=>$pedido->valor_Total
            ];
        }
        dd($pedidosList);
    }
}
