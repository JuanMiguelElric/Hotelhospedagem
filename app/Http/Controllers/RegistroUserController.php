<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


use function Laravel\Prompts\password;

class RegistroUserController extends Controller
{
    public function create(){
        return view('home.registroUsuario.Registro');
    }
     /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string',
            'cpf'=>'required|string',
            'email'=>'required|string',
           // 'password'=> 'required'
            

        ]);
        $data['type'] = 2;
        $password = $request->input('password');
        $data['password'] = Hash::make($password); // Hash da senha
    

        $usuario = new User($data);
 
        if($usuario->save()){
            if($request->json == 1){
                return response()->json(['type'=>'succes','message'=>'Usuario criado com sucesso'],200);
            }
            return redirect()->route('acesso.create');
        }
        if($request->json ==1){
            return response()->json(['type'=> 'error', 'message' =>'Erro ao criar usuario'],400);
        }


      
        dd($data);
        
        
        
    }
}
