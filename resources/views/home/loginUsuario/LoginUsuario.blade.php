@extends('welcome')

@section('title')
    Login
@endsection

@section('content')
<div class="container-fluid">
    <div class="container mt-5 justify-content-center">
        <div class="shadow-lg p-4 mb-5 bg-light rounded d-flex justify-content-center">
            <div class="shadow formulario rounded pb-5">
                <div class="text-center">
                    <h3>Login</h3>
                </div>
                <form class="form" method="POST" action="{{route('acesso.store')}}">
                    @csrf
                       
                 
                        <div class="form-group">
                            <label for="">Email:</label><br>
                            <input name="email" class="inputFor  form-control" id="email" onblur="validacaoEmail()"  type="text">
                            <span id="msgemail"></span>
                        </div>
                   
                        <div class="form-group">
                            <label for="">Password:</label><br>
                            <input class="inputFor form-control" name="password"  type="password">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Confirmo todos os dados listados acima</label>
                        </div>
                          <br>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Entrar</button>
                        </div>
                        
                        <div class="d-grid gap-2 mt-2">
                            <button class="btn btn-success" type="button">
                                <a class="text-light nav-link" href="{{route('usuario.create')}}">
                                    Não Possuo Conta 
                                </a>
                            
                            </button>
                        </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection