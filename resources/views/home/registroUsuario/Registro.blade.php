@extends('welcome')

@section('title')
    Cadastrar-se
@endsection
@section('content')
<div class="container-fluid">
    <div class="container mt-5 justify-content-center">
        <div class="shadow-lg p-4 mb-5 bg-light rounded d-flex justify-content-center">
            <div class=" shadow formulario  rounded pb-5">
                <div class="text-center">
                    <h3>Cadastrar-se</h3>

                </div>
                <form class="form" method="POST" action="{{route('usuario.store')}}">
                @csrf
                    <div class="form-group">
                        <label for="">Nome Completo:</label><br>
                        <input id="inputNome" name="name" class="inputFor form-control" onchange="NomeCompleto()" type="text">
                        <span id="message"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Cpf:</label><br>
                        <input name="cpf" class="inputFor form-control"  id="cpf"  type="text">
                    </div>
                    <div class="form-group">
                        <label for="">Email:</label><br>
                        <input name="email" class="inputFor  form-control" id="email" onblur="validacaoEmail()"  type="text">
                        <span id="msgemail"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Confimar Email:</label><br>
                        <input class="inputFor form-control" id="emailCon" onblur="emailConfirm()"  type="text">
                        <span id="msgemailconfirm"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Password:</label><br>
                        <input class="inputFor form-control"  type="password">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Confirmo todos os dados listados acima</label>
                    </div>
                      <br>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Cadastrar-se</button>
                    </div>
                    
                    <div class="d-grid gap-2 mt-2">
                        <button class="btn btn-success" type="button">
                            <a href="{{route('login')}}">
                                Possuo Conta já
                            </a>
                        
                        </button>
                    </div>
                      
                  


            </div>

        </div>
    </div>
</div>

<script src="{{asset('resources/jquery.mask.js')}}"></script>
<script type="text/javascript">

	$(document).ready(function(){
		$("#cpf").mask("999.999.999-99");
	});
</script>
<script>
    function NomeCompleto(){
        const nome = document.getElementById("inputNome").value;
        const message = document.getElementById("message");
        if(nome.length <=1){
            message.innerText = "Digite seu nome";
            message.className = "error"

        }else if(nome.length >= 30){
            message.innerText = "Campo nome muito grande";
            message.className = "warning";

        }else{
            message.innerText = "Campo correto";
            message.className = "success"
        }
      
    }
    function validacaoEmail() {
        const email = document.getElementById('email').value;
        const usuario = email.substring(0, email.indexOf("@")); // Substring antes do "@"
        const dominio = email.substring(email.indexOf("@") + 1, email.length); // Substring após o "@"


        if ((usuario.length >=1) &&
            (dominio.length >=3) &&
            (usuario.search("@")==-1) &&
            (dominio.search("@")==-1) &&
            (usuario.search(" ")==-1) &&
            (dominio.search(" ")==-1) &&
            (dominio.search(".")!=-1) &&
            (dominio.indexOf(".") >=1)&&
            (dominio.lastIndexOf(".") < dominio.length - 1)) {
           
            document.getElementById("msgemail").innerText="E-mail válido";
    
        }
        else{
            document.getElementById("msgemail").innerHTML="<font color='red'>E-mail inválido </font>";
        }
    }   
    function emailConfirm(){
        const email1 = document.getElementById('email').value;
        const email2 = document.getElementById('emailCon').value;
        let emailmsg = document.getElementById('msgemailconfirm');
        if(email2 === email1){
            emailmsg.innerText = "Email Confirmado"
            alert('Emal correto')
        }else{
            document.getElementById("msgemailconfirm").innerHTML="<font color='red'>Esse e-mail não confere com o outro </font>";
            
        }
    }

</script>

@endsection