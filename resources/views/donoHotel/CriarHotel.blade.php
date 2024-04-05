@extends('adminlte::page')

@section('title', 'Cadastrar cidade')

@section('content_header')
    <h1>Cadastrar Meu hotel</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <x-adminlte-card title="Registrar meu Hotel" theme="light" theme-mode="full" class="elevation-3 text-black"
        body-class="bg-light" header-class="bg-primary" footer-class="bg-primary border-top rounded border-light"
        icon="" collapsible>
                <form action="{{ route('hotel.store') }}" method="POST" id="form">
                @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            {{-- inputs --}}
                            <x-adminlte-input name="nome_hotel" placeholder="Digite o nome do seu Hotel"
                                        label="Digite o nome do seu Hotel:" value="{{ old('setor') }}" />
                                        
                                        
                                        
                        </div>
                        <div class="col-md-12">
                            {{-- inputs --}}
                            <x-adminlte-input name="cnpj" placeholder="Digite o cnpj do seu hotel"
                                        label="Digite o cnpj do seu hotel:" data-mask="00.000.000/0000-00" value="{{ old('setor') }}" />
                                        
                                        
                                        
                        </div>
                        <div class="col-md-6">
                            {{-- inputs --}}
                            <x-adminlte-input name="telefone1" placeholder="Digite o 1º telefone do Hotel"
                                        label="Digite o telefone do Hotel" data-mask="(00)00000-0000" value="{{ old('setor') }}" />
                                        
                                        
                                        
                        </div>
                        <div class="col-md-6">
                            {{-- inputs --}}
                            <x-adminlte-input name="telefone2" placeholder="Digite o 2º telefone do Hotel"
                                        label="Digite o 2º telefone do Hotel" data-mask="(00)00000-0000" value="{{ old('setor') }}" />
                                        
                                        
                                        
                        </div>
                        <div class="col-md-4">
                            {{-- inputs --}}
                            <x-adminlte-input name="cep"  placeholder="Digite o CEP de localização do Hotel"
                            label="Digite o CEP de localização do Hotel:"  value="{{ old('cep') }}" />
          
                                        
                                        
                                        
                        </div>
                        <div class="col-md-4">
                            {{-- inputs --}}
                            <x-adminlte-input name="cidade" id="localidade" placeholder="Cidade:"
                                        label="Cidade:" value="{{ old('localidade') }}" />
                                        
                                        
                                        
                        </div>
                        <div class="col-md-2">
                            {{-- inputs --}}
                            <x-adminlte-input name="estado" id="uf" placeholder="estado:"
                                        label="Estado:" value="{{ old('estado') }}" />
                                        
                                        
                                        
                        </div>
                        <div class="col-md-2">
                            {{-- inputs --}}
                            <x-adminlte-input name="bairro" id="bairro" placeholder="bairro:"
                                        label="Bairro:" value="{{ old('bairro') }}" />
                                        
                                        
                                        
                        </div>
                        <div class="col-md-8">
                            {{-- inputs --}}
                            <x-adminlte-input name="endereco" id="logradouro" placeholder="Endereço"
                                        label="Endereço" value="{{ old('logradouro') }}" />
                                        
                                        
                                        
                        </div>
                        <div class="col-md-4">
                            {{-- inputs --}}
                            <x-adminlte-input name="numero" placeholder="Numero"
                                        label="Numero:" value="{{ old('numero') }}" />
                                        
                                        
                                        
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
@endsection
@push('js')
<script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js') }}"></script>
<script src="{{ asset('resources/jquery.mask.js') }}"></script>

@endpush
@push('js')
<script>
    $(document).ready(function(){
        //seleciona a tag cep
        $("[name='cep']").on("blur", function () {
            var cep = $(this).val().replace(/\D/g, '');
            //confira se não é nulo

            if (cep !== "" && cep.length == 8) {
                $.ajax({
                    url: "https://viacep.com.br/ws/" + cep + "/json/",
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        if (data.erro !== undefined) {
                            alert("CEP inválido ou não encontrado");
                        } else {
                            $("#logradouro").val(data.logradouro); 
                            $("#complemento").val(data.complemento);
                            $("#bairro").val(data.bairro);
                            $("#localidade").val(data.localidade);
                            $("#uf").val(data.uf);
                            $("#unidade").val(data.unidade);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert("Algum erro ocorreu, consulte o log.");
                    }
                });
            } else {
                console.log('Erro ao encontrar CEP');
            }
        });
    });


</script>

    
@endpush