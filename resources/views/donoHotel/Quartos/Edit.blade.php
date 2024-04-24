@extends('adminlte::page')

@section('title', 'Editar quarto')
@section('content')

<div class="row">
    <div class="col-12">
        <x-adminlte-card title="Registrar meu Hotel" theme="light" theme-mode="full" class="elevation-3 text-black"
        body-class="bg-light" header-class="bg-primary" footer-class="bg-light border-top rounded border-light"
        icon="" collapsible>
                <form action="{{route('quartos.update', $quarto) }}" method="POST" id="form">
                @csrf
                @method('PUT')
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            {{-- inputs --}}
                            <x-adminlte-input name="quarto" placeholder="Informe aqui o numero do quarto:"
                                        label="Informe aqui o numero do quarto:" value="{{ $quarto->quarto}}" />
                                        
                                        
                                        
                        </div>
                        <div class="col-md-3">
                            {{-- inputs --}}
                            <x-adminlte-input name="valor" placeholder="R$00.00"
                                        label="Informe aqui o valor do quarto:" data-mask="R$00.000.00" value="{{ $quarto->valor }}" />
                                        
                                        
                                        
                        </div>
                        <div class="col-md-3">
                            {{-- inputs --}}
                            <x-adminlte-input name="quantidade_pessoas" placeholder="000"
                                        label="quantidade de pessoas para esse quarto" data-mask="0000" value="{{ $quarto->quantidade_pessoas }}" />
                                        
                                        
                                        
                        </div>
                        <!--
                        <div class="col-12">
                            <label for="">Adicione imagens para esse quarto:</label>
                            <div class="col-12" id="campomarcao" >
                                
                                <a href="#" id="Adicionar_campo" data-num-opcoes="9"><i class="fa fa-plus"></i> Clique aqui para adicionar as imagens</a>
                                <div id="imendaHTMLemail"></div>
                            </div>
                        </div>-->
                        <div class="col-12">
                            

                            <x-adminlte-select label="Selecione aqui o tipo do quarto:" id="tipo_pergunta" name="tipo_quarto"
                            class="select-options">
                            
                                    
                                        <option value="Quarto Solteiro">Quarto Solteiro</option>
                                        <option value="Quarto Casal">Quarto Casal</option>
                                        <option value="Dormitório">Dormitório</option>
                                        <option value="Simples">Simples</option>
                                        <option value="Master">Master</option>
                            
                            </x-adminlte-select>
                        </div>
                      
                     
         

                        <div class="col-md-12">
                            {{-- inputs --}}
                            <x-adminlte-textarea name="descricao"  placeholder="Informações adicionais do quarto"
                            label="Informações adicionais do quarto"  >
                            {{$quarto->descricao}}
                            </x-adminlte-textarea>
          
                                        
                                        
                                        
                        </div>
                     

                    </div>
 
                    <x-slot name="footerSlot">
                        <x-adminlte-button type="submit" form="form" class="d-flex ml-auto" theme="primary"
                            label="Editar Quarto" icon="fas fa-sign-in" />
                    </x-slot>
                </form>
        </x-adminlte-card>
    </div>
</div>

@endsection
@push('js')
<script>
    const textDesc = document.querySelector('#descricao');
        textDesc .addEventListener("keyup", e =>{
            let cHeight = e.target.scrollHeight;
            console.log(cHeight)
            textDesc.style.height = `${cHeight}px`
    })

</script>
<script src="{{ asset('resources/jquery.mask.js') }}"></script>

@endpush