@extends('adminlte::page')

@section('title',  $hotel->nome_hotel)
@section('content')
<div class="container">
    <div class="card-header">
        <h3 class="card-title">
            Editar {{$hotel->nome_hotel}}
        </h3>
    </div>
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title=" Editar {{$hotel->nome_hotel}}" theme="light" theme-mode="full" class="elevation-3 text-black"
            body-class="bg-light" header-class="bg-primary" footer-class="bg-primary border-top rounded border-light"
            icon="" collapsible>
                    <form action="{{ route('hotel.update',$hotel->id)  }}" method="POST" id="form">
                    @method('PUT')
                    @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                {{-- inputs --}}
                                <x-adminlte-input name="nome_hotel" placeholder="Digite o nome do seu Hotel"
                                            label="Digite o nome do seu Hotel:" value="{{$hotel->nome_hotel}}" />
                                            
                                            
                                            
                            </div>
                            <div class="col-md-12">
                                {{-- inputs --}}
                                <x-adminlte-input name="cnpj" placeholder="Digite o cnpj do seu hotel"
                                            label="Digite o cnpj do seu hotel:" data-mask="00.000.000/0000-00" value="{{$hotel->cnpj}}" />
                                            
                                            
                                            
                            </div>
                            <div class="col-md-6">
                                {{-- inputs --}}
                                <x-adminlte-input name="telefone1" placeholder="Digite o 1º telefone do Hotel"
                                            label="Digite o telefone do Hotel" data-mask="(00)00000-0000" value="{{$hotel->telefone1}}" />
                                            
                                            
                                            
                            </div>
                            <div class="col-md-6">
                                {{-- inputs --}}
                                <x-adminlte-input name="telefone2" placeholder="Digite o 2º telefone do Hotel"
                                            label="Digite o 2º telefone do Hotel" data-mask="(00)00000-0000" value="{{$hotel->telefone2}}" />
                                            
                                            
                                            
                            </div>
                            <div class="col-md-4">
                                {{-- inputs --}}
                                <x-adminlte-input name="cep"  placeholder="Digite o CEP de localização do Hotel"
                                label="Digite o CEP de localização do Hotel:"  value="{{$hotel->cep}}" />
              
                                            
                                            
                                            
                            </div>
                            <div class="col-md-4">
                                {{-- inputs --}}
                                <x-adminlte-input name="cidade" id="localidade" placeholder="Cidade:"
                                            label="Cidade:" value="{{$hotel->cidade}}" />
                                            
                                            
                                            
                            </div>
                            <div class="col-md-2">
                                {{-- inputs --}}
                                <x-adminlte-input name="estado" id="uf" placeholder="estado:"
                                            label="Estado:" value="{{$hotel->estado}}" />
                                            
                                            
                                            
                            </div>
                            <div class="col-md-2">
                                {{-- inputs --}}
                                <x-adminlte-input name="bairro" id="bairro" placeholder="bairro:"
                                            label="Bairro:" value="{{$hotel->bairro}}" />
                                            
                                            
                                            
                            </div>
                            <div class="col-md-8">
                                {{-- inputs --}}
                                <x-adminlte-input name="endereco" id="logradouro" placeholder="Endereço"
                                            label="Endereço" value="{{$hotel->endereco}}" />
                                            
                                            
                                            
                            </div>
                            <div class="col-md-4">
                                {{-- inputs --}}
                                <x-adminlte-input name="numero" placeholder="Numero"
                                            label="Numero:" value="{{$hotel->numero}}" />
                                            
                                            
                                            
                            </div>
    
                        </div>
     
                        <x-slot name="footerSlot">
                            <x-adminlte-button type="submit" form="form" class="d-flex ml-auto" theme="primary"
                                label="Enviar" icon="fas fa-sign-in" />
                        </x-slot>
                    </form>
            </x-adminlte-card>
        </div>
    </div>
</div>

@endsection