<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="PHRSSEC - Segurança da informação">
    <meta name="keywords" content="Segurança da informação, proteção de dados, DPO, serviços de DPO, empresa de segurança digital, Lei Geral de Proteção de Dados, LGPD, Dados Pessoais, Perícia, Perícia Forense">
    <meta name="description" content="Oferecemos soluções de segurança da informação e serviços de Data Protection Officer (DPO) para garantir a proteção dos seus dados. Saiba mais sobre nossos serviços!">
    <meta name="language" content="Português">
    <!-- <link rel="stylesheet" href="./assets/vendor/bootstrap/bootstrap.min.css"> -->
    @vite([
    'resources/sass/app.scss',
    'resources/sass/phrssec/app.scss',
    'resources/js/app.js',
    ]);
    <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('resources/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('resources/css/Estilo.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,400;6..12,700&display=swap" rel="stylesheet">
    <title>AlojaTur - @yield('title')</title>
    
        @yield('style')
</head>

<body >
    <!--
    



        <!-- FOOTER -->
        <div style="background-color:black;" class="container-fluid  ">
            <nav class="navbar navbar-dark bg-dark shadow fixed-top bg-header ">
                <div class="container">

                    <a class="navbar-brand text-light" href="#">
                        <img style="width: 40px;" class="rounded-circle" src="{{asset('resources/imagens/logo.jpg')}}" alt="">
                        AlojaTur
                    </a>
                    
                    
                    <div class=" float-right " >
                      <ul class="navbar-nav text-light row d-flex flex-row d-flex justify-content-around">
                        <li class=" col-3 nav-item mr-3 active">
                          <a class=" text-light nav-link " href="{{route('home')}}">Home </a>
                        </li>
                        <li class="col-3 nav-item ml-3">
                          <a class=" text-light nav-link " href="#"> Faça uma Doação </a>
                        </li>
                        <li class="col-3 nav-item mr-5">
                          <a class=" text-light nav-link " href="#">Quero Cadastrar meu Hotel</a>
                        </li>
                        @if (Route::has('acesso.create'))
                            <li class="col-3 nav-item mr-2">
                                    <div class="flex-row d-flex justify-content-around ">
                                        @auth
                                            <a href="{{ url('/') }}" >Home</a>
                                        @else
                                            <a href="{{ route('acesso.create') }}" class="text-light nav-link mr-3 ">Log in</a>
                    
                                            @if (Route::has('register'))
                                                
                                                <a href="{{ route('usuario.create') }}" class="  text-light nav-link">/Register</a>
                                            @endif
                                        @endauth
                                    </div>
                    
                            </li>
                            @endif
                            
                        
                      </ul>
                  
                    </div>
                </div>
            </nav>
        </div>
        <br>
        <br>
        <br>
        
        <!-- Deve ter um @yield('content') -->
        @yield('content')
        
        <div>
            @yield('conteudo')

        </div>
                

</body>

</html>