<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Quarto;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function Index(Request $request){
        $search = $request->input('search');

        
        $quartos = Quarto::query()
        ->where('quarto', 'LIKE', "%{$search}%")

        ->orWhere('descricao','LIKE',"%{$search}%")
        ->get();
       

        return view('welcome', compact('quartos'));
    }
 
}
