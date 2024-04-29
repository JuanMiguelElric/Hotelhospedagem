@extends('welcome')

@section('title')
    Página de Exemplo
@endsection

@section('content')
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
                    <p class="ml-2"><strong>Valor:</strong> {{ $quarto->valor }}<strong>/noite</strong></p>
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

@endsection
