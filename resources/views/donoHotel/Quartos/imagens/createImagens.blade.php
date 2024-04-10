@extends('adminlte::page')

@section('title', 'adicionar Imagens')

@section('content')
<div class="row mt-5">
    <div class="container-fluid">
        <x-adminlte-card title="Adicionar Imagens" theme="light" theme-mode="full" class="elevation-3 text-black"
        body-class="bg-light" header-class="bg-primary" footer-class="bg-primary border-top rounded border-light"
        icon="" collapsible>
        <form action="{{route('hotel.quartos.images.store', [$hotel, $quarto]) }}" method="POST" id="form">
            @csrf
            <div class="col-12">
                <label for="">Adicione imagens para esse quarto:</label>
                <div class="col-12" id="campomarcao" >
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <a href="#" id="Adicionar_campo" data-num-opcoes="9"><i class="fa fa-plus"></i> Clique aqui para adicionar as imagens</a>
                        </div>
                    </div>
                    
                    <div class="d-flex flex-wrap" id="imendaHTMLemail"></div>
                 
                </div>
            </div>
            <x-slot name="footerSlot">
                <x-adminlte-button type="submit" form="form" class="d-flex  ml-auto" theme="primary"
                    label="Cadastrar imagens do quarto" icon="fas fa-sign-in" />
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
                <div class=" d-flex flex-wrap" id="${idForm}">
                    <div class="card mr-2" id="${idCampo}">
                        <div class="card-img-top">
                            <label class="picture" for="picture__input" tabIndex="0">
                              
                                <span class="picture__image${idContador}"></span>
                            </label>
                        </div>
                                
                                <input type="file" name="image[${idContador}]" value="" id="kifBasic${idContador}">
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