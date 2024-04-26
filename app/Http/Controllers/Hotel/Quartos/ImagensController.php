<?php

namespace App\Http\Controllers\Hotel\Quartos;

use App\Http\Controllers\Controller;
use App\Models\Imagem;
use App\Models\Quarto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

class ImagensController extends Controller
{
    public function index(){

    }
    public function create($hotel,$quarto){
        return view('donoHotel.Quartos.imagens.createImagens', ['hotel'=>$hotel, 'quarto'=> $quarto
    ]);
    }
    public function store(Request $request,$hotel,$quarto){
        $data = $request->validate([
            'image.*'=>'required|image|mimes:png,jpg',
        ]);
        //recebe o arquivo que foi adicionado no campo input no meu front end

        

        if ($request->hasFile('image')) {
            $extensoesImage = ['jpeg', 'png', 'jpg', 'pdf'];
        
            foreach ($request->file('image') as $img) {
                $extension = $img->getClientOriginalExtension();
                $check = in_array($extension, $extensoesImage);
        
                if ($check) {
                
                    $nameImage = $img->getClientOriginalName();
                    $path = $img->store('public'); // Armazena a imagem no diretório storage/app/images
                   // $img->move(public_path('images'), $nameImage); // Move a imagem para public/images
                    // Salve o nome do arquivo no banco de dados, se necessário
                    // Imagem::create(['nome' => $nameImage, 'path' => $path]);
                    Imagem::create(
                        [
                            'imagen'=>$nameImage,
                            'path'=>$path,
                            'quartos_id'=> $quarto,
                        ]
                        );
                }
            }
            return redirect()->route('hotel.quartos.index',['hotel'=>$hotel,'quarto'=>$quarto]);
        }
            
        
    }
    
    public function ImageJson($id){
        $quartos = Imagem::where('quartos_id', $id)->get();
        if($quartos->isEmpty()){
            return response()->json(["type"=>"error","imagens_quartos"=>[]],200);
        }
        $imageQuartoslist=[];
        foreach($quartos as $quarto){
            $imageQuartoslist[]=[
                "imagen"=> $quarto->imagen,
                "path"=> $quarto->path,
            ];

        }
        return response()->json(compact('imageQuartoslist'));

    }
    public function show(){
        //
    }
    public function destroy(){
        //
    }
}
