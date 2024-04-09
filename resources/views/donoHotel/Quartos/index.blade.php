@extends('adminlte::page')

@section('title', $hotel->nome_hotel)

@section('content')
<div class="container-fluid mt-5">
    <a href="{{route('hotel.quartos.index',$hotel->id)}}" class="btn btn-primary mb-2">Hoteis</a>
    <a href="{{route('hotel.quartos.create',$hotel)}}" class="btn btn-primary mb-2">Cadastrar novo Quarto</a>

</div>



@endsection