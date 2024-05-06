@extends('welcome')
@section('title','Hotel')
@section('style')
<link rel="stylesheet" href="{{asset('resources/css/app.css')}}">
@endsection
@section('content')
<div class="container-fluid fundoQuartos shadow-lg mt-5 d-flex flex-wrap">
    <div class="container rounded  border border-dark">
        <div class="row mt-4">
            <div class="col-6   ">

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
            <div class="col-6 pt-3">
                <h2>{{$hotel->nome_hotel}}</h2>
                <h2>Quarto:{{$quarto->quarto}}</h2>

                <ul class="list-unstyled">
                    <p><strong>Sobre o Local:</strong></p>
                    <li><small><strong>Localidade: {{$hotel->cidade}}</strong></small></li>
                    <li><small><strong>Endereço: {{$hotel->endereco}}</strong></small></li>
                    <li><small><strong>Quantidade de pessoas : {{$quarto->quantidade_pessoas}}</strong></small></li>
                    <li><small><strong>Bairro: {{$hotel->bairro}}</strong></small></li>
                </ul>
                <form action="{{route('pedidos.store', [$hotel->id, $quarto->id])}}" method="POST">
                    @csrf

                    <div class="d-flex  gap-3">
                        <div class="mr-3">
                            <input type="date" id="start" class="data" name="data_inicial" value="" onchange="DataInicial()" min="2024-05-01" max="2025-12-31" />
        
                        </div>
                        <div class="ml-3">
                            <input type="date" id="finall" class="data" name="data_final" value="" onchange="DataFinal()" min="2024-05-01" max="2025-12-31" />
        
                        </div>
                    
                        
                    </div>
                    <div class="mt-3">
                        <small>dias de hospedagem:</small>
                        <div class="numero_dedias rounded border border-dark" >
                            <p id="valor"></p>
        
                        </div>
    
                    </div>
    
        
                    <br>
                    
                    <div>
                        <input type="text" name="valor" value="{{$quarto->valor}}">
                        <h2 id="quartovalor">{{$quarto->valor}}<small>/noite</small>
                        </h2>
                        <small>{{$quarto->tipo_quarto}}</small>
                    </div>
    
    
                    <br>
                    <button class="btn btn-success btn-lg btn-block" type="submit">Reservar</button>
                </form>

               
                
            </div>
        </div>
    </div>
    <br>
    <br>
    
</div>
<div class="container-fluid bg-light mt-5">
    <h2>Mais quartos do hotel : {{$hotel->nome_hotel}}</h2>
    
    <div class="row">
        
        <div class="col-12 d-flex gallery gap-3 border-dark rounded">
            
            @foreach ($maisquartos as $maisquart )
                @foreach ($maisquart->imagens as $maisquar )
                    @php
                        $imagem = $maisquar->path;
                        $imagemUrrl = Storage::url($imagem);
                    @endphp

                    
                @endforeach
                <div class="quartosCard d-flex flex-nowrap">
                    <div class="Imagens">
                        <img src="{{$imagemUrrl}}" class="imageQuartos" alt="">
    
                    </div>
                    <div class="p-1">
                        <p>Nº quarto{{$maisquart->quarto}}</p>
        
                        <p>quantidade:{{$maisquart->quantidade_pessoas}}</p>
                        <p>valor:{{$maisquart->valor}}</p>
        
                    </div>
                </div>
                
            @endforeach
        
        </div>
    </div>

</div>
<script>
    let data =0
    let data2 =0

    function DataInicial() {
        const inicio = document.getElementById("start").value;
        data = inicio;
        ValorTotal(data,data2);
    }

    function DataFinal() {
        const final = document.getElementById('finall').value;
        ValorTotal(data,final); // Passa o argumento correto
    }

    function ValorTotal(data, data2) {
        const primeiraData = new Date(data);
        const segundaData = new Date(data2);
        const number = document.getElementById("valor");


        const diferencaEmMilissegundos = Math.abs(segundaData - primeiraData); // Diferença em milissegundos
        const milissegundosPorDia = 1000 * 60 * 60 * 24; // Número de milissegundos em um dia

        const diferencaEmDias = Math.ceil(diferencaEmMilissegundos / milissegundosPorDia); // Calcular a diferença em dias
        if (Number.isNaN(diferencaEmDias) || diferencaEmDias <= 0 || Number.isNaN(diferencaEmDias) || diferencaEmDias > 1000 ) {
        // Se for `NaN` ou um valor negativo, exibe 0
            number.innerText = "1";
        } else {
            // Caso contrário, exibe o valor real
            number.innerText = diferencaEmDias;
        }


        
    }


    ValorTotal()
</script>
<script>
const slider = document.querySelector('.gallery');
let isDown = false;
let startX;
let scrollLeft;

slider.addEventListener('mousedown', e => {
  isDown = true;
  slider.classList.add('active');
  startX = e.pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
});
slider.addEventListener('mouseleave', _ => {
  isDown = false;
  slider.classList.remove('active');
});
slider.addEventListener('mouseup', _ => {
  isDown = false;
  slider.classList.remove('active');
});
slider.addEventListener('mousemove', e => {
  if (!isDown) return;
  e.preventDefault();
  const x = e.pageX - slider.offsetLeft;
  const SCROLL_SPEED = 3;
  const walk = (x - startX) * SCROLL_SPEED;
  slider.scrollLeft = scrollLeft - walk;
});


</script>

@endsection
@push('js')
    
@endpush