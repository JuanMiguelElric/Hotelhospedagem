@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Meus Hoteis</h1>
@stop

@section('content')

<div class="row">
    <div class="col-3">
        <x-adminlte-small-box id="mySmallBox" title=""  text="Reservas realizadas"
        icon="fa fa-credit-card text-teal" />

    </div>
    <div class="col-3">
        <x-adminlte-small-box id="mySmallBox" title=""  text="Estádias Finalizadas"
        icon="fas fa-hourglass-end text-teal" />

    </div>
    <div class="col-3">
        <x-adminlte-small-box id="mySmallBox" title=""  text="Quartos Ocupados"
        icon="fas fa-bed text-teal" />

    </div>
    <div class="col-3">
        <x-adminlte-small-box id="mySmallBox" title=""  text="Quartos não ocupados"
        icon="fas fa-bed text-teal" />

    </div>
    <div class="col-12 mt-5">
        <div class="text-center h1">
            <x-adminlte-card title="Quartos de Hotel" theme="light" theme-mode="full" class="elevation-3 text-black"
            body-class="bg-light" header-class="bg-primary" footer-class="bg-primary border-top rounded border-light"
            icon="" collapsible >

            </x-adminlte-card>
           
        </div>
    </div>
</div>

@endsection