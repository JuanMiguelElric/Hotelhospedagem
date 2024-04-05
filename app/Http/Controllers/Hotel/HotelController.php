<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    public function index(){
        //
    }
    public function create(){
     
        return view('donoHotel.CriarHotel');
    }
    public function store(Request $request){
        $data = $request->validate([
            "nome_hotel"=>"required|string|max:255",
            "cnpj"=>"required",
            "telefone1"=>"required",
            "telefone2"=>"required",
            "cep"=>"required",
            "cidade"=>"required",
            "endereco"=>"required",
            "estado"=>"required",
            "numero"=> "required",
            "bairro"=>"required"

        ]);
        $data['dono_hotel_id'] = Auth::id();
        $hoteis = new Hotel($data);
  
        if($hoteis->save()){
            if($request->json==1){
                return response()->json(["type"=>"success","message"=>"Hotel criado com sucesso"],200);
            }
            return redirect()->route('home.donohotel');
        }
        if($request->json ==1){
            return response()->json(["type"=>"error","message"=>"erro ao criar o Htel"],400);
        }
        return back()->withErros("Erro ao processsar");
        //
    }
    public function edit(){
        return view('donoHotel.EditarHotel')

    }
}
