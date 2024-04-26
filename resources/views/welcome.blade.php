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
    ])
    <link rel="stylesheet" href="{{asset('resources/css/app.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,400;6..12,700&display=swap" rel="stylesheet">
    <title>AlojaTur @yield('title')</title>
    
        @yield('style')
</head>

<body >
    



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
                          <a class=" text-light nav-link " href="#">Home </a>
                        </li>
                        <li class="col-3 nav-item ml-3">
                          <a class=" text-light nav-link " href="#">Features </a>
                        </li>
                        <li class="col-3 nav-item mr-5">
                          <a class=" text-light nav-link " href="#">Pricing</a>
                        </li>
                        @if (Route::has('login'))
                            <li class="col-3 nav-item mr-2">
                                    <div class="flex-row d-flex justify-content-around ">
                                        @auth
                                            <a href="{{ url('/') }}" >Home</a>
                                        @else
                                            <a href="{{ route('login') }}" class="text-light nav-link mr-3 ">Log in</a>
                    
                                            @if (Route::has('register'))
                                                
                                                <a href="{{ route('register') }}" class="  text-light nav-link">/Register</a>
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
        <div class="container mt-5 justify-content-center">
            <div class="shadow-lg p-4 mb-5 bg-light rounded">
                <div class="row">
                    <div class="col-4">
                        
                        <div class="input-group rounded">
                            <form action="{{ route('home') }}" method="GET">
                                <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                <span class="input-group-text border-0" id="search-addon">
                                  <i class="fas fa-search"></i>
                                </span>
                                <button type="submit">Search</button>

                            </form>
                        </div>

                    </div>
                    <div class="col-4">
                        Observaraa
                    </div>
                    <div class="col-4">
                        Observara
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid fundoQuartos shadow-lg d-flex flex-wrap ">
 
            @if($quartos->isNotEmpty())
                @foreach ($quartos as $quarto)
                    @foreach ($quarto->imagens as $quart)
                        @php
                            $imagen = $quart->path;
                            $imagenUrl = Storage::url($imagen);
                        @endphp
                    @endforeach
                
                    <div class="quartosCard d-flex flex-nowrap">
                        <div class=" Imagens">
                            <img src="{{ $imagenUrl }}" class="imageQuartos" alt="">
                        </div>
                        <div class="p-1">
                            <p class="ml-2"><strong>Quarto:</strong> {{ $quarto->quarto }} </p>
                            <p class="ml-2"><strong>Hotel:</strong> {{ $quarto->hotel->nome_hotel }}</p>
                            <p class="ml-2"><strong>Cidade:</strong> {{ $quarto->hotel->cidade }}</p>
                            <p class="ml-2"><strong>Valor:</strong> {{ $quarto->valor }}</p>
                            <button class="btn btn-outline-primary btn-info">Observar</button>
                        </div>
                    </div>
                @endforeach
            @else 
               
                @foreach ($quartos as $quarto)
                    @foreach ($quarto->imagens as $quart)
                        @php
                            $imagen = $quart->path;
                            $imagenUrl = Storage::url($imagen);
                        @endphp
                    @endforeach
                
                    <div class="quartosCard d-flex flex-nowrap">
                        <div class=" Imagens">
                            <img src="{{ $imagenUrl }}" class="imageQuartos" alt="">
                        </div>
                        <div class="">
                            <p class="ml-2"><strong>Quarto:</strong> {{ $quarto->quarto }} </p>
                            <p class="ml-2"><strong>Hotel:</strong> {{ $quarto->hotel->nome_hotel }}</p>
                            <p class="ml-2"><strong>Cidade:</strong> {{ $quarto->hotel->cidade }}</p>
                            <p class="ml-2"><strong>Valor:</strong> {{ $quarto->valor }}</p>
                            <button class="btn btn-outline-primary btn-info ">Observar</button>
                        </div>
                    </div>
                @endforeach
    
            @endif
 
        </div>
     
                

</body>

</html>