<?php

namespace App\Http\Controllers\Hotel\Quartos;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class QuartoController extends Controller
{
    public function index(Hotel $hotel){
        
        return view('donoHotel.Quartos.index',compact('hotel'));
    }
    public function create(){
        return view('donoHotel.Quartos.create');
    }
    public function store(){
        //
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
