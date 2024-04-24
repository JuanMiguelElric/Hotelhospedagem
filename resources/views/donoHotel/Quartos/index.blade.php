@extends('adminlte::page')

@section('title', $hotel->nome_hotel)

@section('content')
<div class="container-fluid mt-5">
    <a href="{{route('hotel.quartos.index',$hotel->id)}}" class="btn btn-primary mb-2">Hoteis</a>
    <a href="{{route('hotel.quartos.create',$hotel)}}" class="btn btn-primary mb-2">Cadastrar novo Quarto</a>

</div>
<div class="col-12 mt-3">
    @include('donoHotel.Quartos.components.quartos.datatable',[
        'idBotao'=>'refresh',
        'idTable' => '#table5',
    ])
</div>



@endsection
@push('js')
<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    
@endpush
@section('plugins.Datatables', true)
@section('plugins.DatatablesExport', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Toastr', true)