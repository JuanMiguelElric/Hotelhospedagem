<?php

namespace App\Http\Controllers\Hotel\Quartos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
 
        foreach($data['image'] as $dat){
            dd($dat);
        }
    }
}
