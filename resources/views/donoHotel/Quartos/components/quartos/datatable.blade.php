@php
$heads = [
    'Imagem',
    'Quarto',
    'Valor',
    'Tipo do quarto',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],

];


$config = [
    'ajax' => [
        'url'=>'/hotel/quartos/'. $hotel->id,
        'dataSrc' => "quartosdeHoteislist",
    ],
    'data' => [],
    'order' => [[0, 'asc']],
    'columns' => [

        ['data'=>'imagem'],
        ['data' => 'quarto'],
        ['data' => 'valor'],
        ['data'=>'tipo_quarto'],
        ['data'=>'btns']
    


    ],
];

@endphp   
<x-adminlte-datatable id="table2" :heads="$heads" :config="$config" striped hoverable bordered compressed  />

<x-adminlte-modal id="modalMin" title="Exclusão">
    <div>Tem certeza que deseja excluir?</div>
    <x-slot name="footerSlot">
        <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" id="cancel" />
        <x-adminlte-button class="mr-auto" theme="success" label="Confirmar" id="confirmation" />
    </x-slot>
</x-adminlte-modal>

@push('js')




<script>
    $("{{ $idBotao }}").click(function() {
        $("{{ $idTable }}").DataTable().ajax.reload();
    })
</script>

    <script src="{{ asset('resources/requisicaoAjax.js') }}"></script>
@endpush 
@push('js')
@include("donoHotel.Quartos.components.quartos.delete")
@endpush
    