<?php

namespace App\Http\Controllers\Hotel\Quartos;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Imagem;
use App\Models\Quarto;
use Illuminate\Http\Request;

class QuartoController extends Controller
{
    public function index(Hotel $hotel){
        
        return view('donoHotel.Quartos.index',compact('hotel'));
    }
    public function create($hotel){
        return view('donoHotel.Quartos.create',compact('hotel'));
    }
    public function store(Request $request,$hotel){
        $data = $request->validate([
            'quarto'=>'required',
            'valor'=> 'required',
            'quantidade_pessoas'=> 'required',
            'tipo_quarto'=>'required',
            'descricao'=>'required'
        
        ]);
        $data['hotel_id']= $hotel;
        $dadosHotel = new Quarto($data);
        $quarto = $dadosHotel;

        if($dadosHotel->save()){
            if($request->json==1){
                return response()->json(['type'=>'success','message'=>'Quarto criado com sucesso'],200);
            }
            return redirect()->route('hotel.quartos.images.create', ['hotel'=>$hotel,'quarto'=>$quarto]);
        }
        if($request->json==1){
            return response()->json(['type'=>'error','message'=>'Erro ao criar quarto']);
        }
        /*
        $image = new Imagem();
        
        if ($request->hasFile('picture__input')) {
            $arquivoFiles = $request->file('picture__input');
            
            foreach ($arquivoFiles as $arquivoFile) {
                // Faça o que você precisa com cada arquivo aqui
                if($arquivoFile) {
                    $extensao = $arquivoFile->getClientOriginalExtension();
                    $arquivoNome = time() . '.' . $extensao;
                
                    // Salve o arquivo na pasta public/images
                    $arquivoFile->move(public_path('images'), $arquivoNome);
                
                    // Salve o nome do arquivo no banco de dados
                    $image->imagem = $arquivoNome;
            }
            dd($image);
        }
            
        }*/
        
       

        dd($data);
    }
    public function edit(){
        //
    }
    public function update(){
        //
    }
    public function destroy(){
        //
    }
}
