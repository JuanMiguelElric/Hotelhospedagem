<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginUsuarioController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function create(){
        return view('home.loginUsuario.LoginUsuario');
    }

    protected function store(Request $request){
        
        $input = $request->all();
  

        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ]);

        
   
     
        if(auth()->attempt(array('email'=> $input['email'], 'password' =>$input['password']))){
            if(auth()->user()->type=='user'){
                return redirect()->route('home');
                
            }
            
        
        }else{
           
            return redirect()->back()->withErrors(['email' => 'Credenciais inválidas. Tente novamente.']);
        }
    }
}
