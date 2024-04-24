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
    public function edit(Hotel $hotel){
        return view('donoHotel.EditarHotel',compact('hotel'));

    }
    public function update(Request $request, Hotel $hotel){
        $dados = $request->validate([
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

        if( $hotel->update($dados)){
            if($request->json==1){
                return response()->json(['type'=>"success","message"=>"Hotel editado com sucesso"],200);
            }
            return redirect()->route('home.donohotel');
        }
        if($request->json==1){
            return response()->json(['type'=>'success','message'=>"Erro ao criar Hotel"],400);
        }
    }

    public function HotelJson(){
        $hoteis =  Hotel::all();

        if($hoteis->isEmpty()){
            return response()->json(["type" => "error", "empresas" => []], 200);

        }
     

        $hotellistdesc =[];
        foreach($hoteis as $hotel ){
            $routeEdit = route('hotel.edit', $hotel->id);
            $routeQuartos = route('hotel.quartos.index',$hotel->id);
            $routedetalhes = route('hotel.show', $hotel->id);
            $btnEdit = "<a href=' $routeEdit' id='$hotel->id' class='btn btn-xs btn-default text-primary mx-1 shadow' title='Editar'><i class='fa fa-lg fa-fw fa-pen'></i></a>";
            
            $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow excluir-dado btn-delete" title="Excluir" data-dado-id="' . $hotel->id . '"><i class="fa fa-lg fa-fw fa-trash"></i></button>';
            
            $btnDetails = '<a href="'.$routedetalhes.'" class="btn btn-xs btn-default text-teal mx-1 shadow show-dado" data-dado-id="' . $hotel->id . '" title="todos usuarios"><i class="fas fa-fw fa-user" aria-hidden="true"></i></a>';

            $btnAdminQuartos = '<a href="'.$routeQuartos.'" class="btn btn-xs btn-default text-teal mx-1 shadow show-dado" data-dado-id="' . $hotel->id . '" title="todo" ><i class="fas fa-bed text-teal" aria-hidden="true"></i></a>';
            $hotellistdesc[]= [
          
                'nome_hotel'=>$hotel->nome_hotel,
                'cnpj'=>$hotel->cnpj,
                'cidade'=>$hotel->cidade,
                'btns'=> '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>',
                'btnsAdmin'=> '<nobr>' . $btnAdminQuartos. '</nobr>',
            ];
        }
        return response()->json(compact('hotellistdesc'));

    }
    public function show(){
        //
    }
    public function destroy(Hotel $hotel){
        if($hotel->delete()){
            return response()->json(['type'=>"success","message"=>"Hotel apagado com sucesso"],200);

        }
        
    }
}
