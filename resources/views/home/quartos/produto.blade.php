@extends('welcome')
@section('title','Hotel')
@section('style')
<link rel="stylesheet" href="{{asset('resources/css/app.css')}}">
@endsection
@section('content')
<div class="container-fluid fundoQuartos shadow-lg d-flex flex-wrap">
    <div class="container border border-dark">
        <div class="row">
            <div class="col-6 ">

                @foreach ($quarto->imagens as $quart )
                @php
                    $imagem = $quart->path;
                    $imageUrl = Storage::url($imagem);
                @endphp
                    
                @endforeach
                <div class="border border-dark">
                    <img src="{{$imageUrl}}" class="imagem_unica" alt="">

                </div>
       
            </div>
            <div class="col-6">
                <h1>{{$hotel->nome_hotel}}</h1>
                <h1>Quarto:{{$quarto->quarto}}</h1>

                <ul class="list-unstyled">
                    <li><small><strong>Localidade: {{$hotel->cidade}}</strong></small></li>
                    <li><small><strong>Endereço: {{$hotel->endereco}}</strong></small></li>
                    <li><small><strong>Quantidade de pessoas : {{$quarto->quantidade_pessoas}}</strong></small></li>
                    <li><small><strong>Bairro: {{$hotel->bairro}}</strong></small></li>
                </ul>
                
                <div>
                    <h2>{{$quarto->valor}}<small>/noite</small>
                    </h2>
                    <small>{{$quarto->tipo_quarto}}</small>
                </div>

                <button class="btn btn-primary btn-lg btn-block">Adicionar ao carrinho</button>
                <br>
                <br>
                <button class="btn btn-success btn-lg btn-block">Comprar</button>

               
                
            </div>
        </div>
        <br>
        <br>
        <div class="col-8">
            <h3>Descrição</h3>
            <div>
                <p>Quantidade de pessoas: {{$quarto->quantidade_pessoas}}</p>
                <p>Descricao: {{$quarto->descricao}}</p>
            </div>
        </div>
    </div>
</div>
@endsection