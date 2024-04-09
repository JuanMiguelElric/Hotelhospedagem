@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-12">
        <x-adminlte-card title="Registrar meu Hotel" theme="light" theme-mode="full" class="elevation-3 text-black"
        body-class="bg-light" header-class="bg-primary" footer-class="bg-primary border-top rounded border-light"
        icon="" collapsible>
                <form action="" method="POST" id="form">
                @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            {{-- inputs --}}
                            <x-adminlte-input name="nome_hotel" placeholder="Informe aqui o numero do quarto:"
                                        label="Informe aqui o numero do quarto:" value="{{ old('setor') }}" />
                                        
                                        
                                        
                        </div>
                        <div class="col-md-6">
                            {{-- inputs --}}
                            <x-adminlte-input name="nome_hotel" placeholder="Informe aqui o valor do quarto:"
                                        label="Informe aqui o valor do quarto:" value="{{ old('setor') }}" />
                                        
                                        
                                        
                        </div>
                        <div class="col-12">
                            <label for="">Adicione imagens para esse quarto:</label>
                            <div class="col-12" id="campomarcao" >
                                
                                <a href="#" id="Adicionar_campo" data-num-opcoes="9"><i class="fa fa-plus"></i> Clique aqui para adicionar as imagens</a>
                                <div id="imendaHTMLemail"></div>
                            </div>
                        </div>
                        <!--
                        <div>
                            <label class="picture" for="picture__input" tabIndex="0">
                                <span class="picture__image"></span>
                            </label>
                            
                            <input type="file" name="picture__input" id="kifBasic">
                        </div>
                    -->
                      
                     
         

                        <div class="col-md-12">
                            {{-- inputs --}}
                            <x-adminlte-textarea name="cep"  placeholder="Digite o CEP de localização do Hotel"
                            label="Digite o CEP de localização do Hotel:"  value="{{ old('cep') }}" >
                            </x-adminlte-textarea>
          
                                        
                                        
                                        
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

@push('css')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endpush

@push('js')
<script>
    var idContador = 0;
    var idContador1 = 0;

    function exclui(id) {
        $("#" + id).parent().remove();
        idContador--; // Subtrai 1 do contador quando excluímos um campo
         // Subtrai 1 do contador quando excluímos um campo
    }


    $(document).ready(function() {
        $("#Adicionar_campo").click(function(e) {
            e.preventDefault();
            var tipoCampo = "email";
            adicionaCampo(tipoCampo);
        });



        function adicionaCampo(tipo) {
            idContador++;

            var idCampo = "campoExtra" + idContador;
            var idForm = "formExtra" + idContador;

            var html = `
                <div class="input-group" id="${idForm}">
                    <div class="input-group" id="${idCampo}">
                        <label class="picture" for="picture__input" tabIndex="0">
                            ${idContador}ª
                            <span class="picture__image${idContador}"></span>
                        </label>
                        
                        <input type="file" name="picture__input${idContador}" id="kifBasic${idContador}">
                        <button class='btn' onclick='exclui("${idCampo}")' type='button'><span class='fa fa-trash'></span></button>
                    </div>
                </div>
            `;
                    
            $("#imendaHTML" + tipo).append(html);

            const inputFile = document.querySelector("#kifBasic" + idContador);
    
            const pictureImage = document.querySelector(".picture__image" + idContador);
            const pictureImageTxt = "Choose an image";
            pictureImage.innerHTML = pictureImageTxt;

            inputFile.addEventListener("change", function (e) {
                const inputTarget = e.target;
                const file = inputTarget.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.addEventListener("load", function (e) {
                        const readerTarget = e.target;

                        const img = document.createElement("img");
                        img.src = readerTarget.result;
                        img.classList.add("picture__img");

                        pictureImage.innerHTML = "";
                        pictureImage.appendChild(img);
                    });

                    reader.readAsDataURL(file);
                } else {
                    pictureImage.innerHTML = pictureImageTxt;
                }
            });
        }
    });
</script>
@endpush

