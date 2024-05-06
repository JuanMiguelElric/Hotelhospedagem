@extends('welcome');
@section('title')
    Minhas Reservas
@endsection
@section('content')
<div class="container-fluid p-5">
    <div class="container">
        <div class="row">
            <div class="col-4 p-3">
                <div class=" d-flex border-bottom">
                    
                    <div class="p-3">
                        <i class="fa fa-user fa-lg" style="size: 30px;"></i>
                    </div>
                    <div class="p-3">
                        <h6>{{$usuario->name}}</h6>
                        <a href="">Editar Perfil</a>

                    </div>
    
                </div>
                <div class="mt-5">
                    <ul class="navbar-nav">
                        <li> <i class="fa fa-user fa-lg" style="size: 30px;"></i> Minha Conta</li>
                        <li><i class="fa fa-hotel fa-lg" style="color:rgba(38, 0, 255, 0.736)"></i>Minhas Reservas</li>
                        <li><i class="fa fa-bell fa-lg" style="color:rgba(255, 0, 0, 0.968);"></i> Notificações</li>
                        <li><i class="fa fa-money fa-lg" style="color:rgba(255, 255, 0, 0.736)"></i> Cupons</li>
                    </ul>
                </div>
    
            </div>
            <div class="col-8  p-3">
                <div class="shadow-lg p-4 mb-5 bg-light rounded">
                    <ul class="navbar-nav  d-flex flex-row d-flex justify-content-around"">
                        <li>Todas Reservas</li>
                        <li>Reservas Pagas</li>
                        <li>Reservas para pagar</li>
                        <li>Reservas Canceladas </li>
                    </ul>

                </div>
                <div class=" mb-5 bg-light rounded">
                    @foreach ($pedidos as $pedido)
                    <div class="quartosCardPedidos d-flex flex-nowrap">
                        <div class="Imagens">

                           @foreach ($pedido->quarto->imagens as $pedid)
    
                            @php
                                $path = $pedid->path;
                                $imagemUrl = Storage::url($path);
                            @endphp
                           @endforeach
                           <img src="{{$imagemUrl}}" class="imageQuartosPedidos" alt="{{$pedid->image}}">

                        </div>
                        <div>
                            <h2>{{$pedido->hotel->nome_hotel}}</h2>
                            <h3>{{$pedido->quarto->quarto}}</h3>
 
                            <p><strong>Data Inicial:</strong>{{$pedido->data_inicial}}</p>
                            <p><strong>Data Final:</strong>{{$pedido->data_final}}</p>
                            <h4>R${{number_format((float)$pedido->valor_Total, 2, ',', '')}}</h4>
                          
                            <button type="button" class="btn btn-danger float-right">Reservar Agora</button>

                                
                           

                        </div>
                    </div>
                       
                       
                            
                        
                        
                    @endforeach
                    
                </div>
            </div>
    
        </div>

    </div>
</div>

@endsection