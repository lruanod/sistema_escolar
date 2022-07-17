@extends('layouts.base')
@section('title', 'Cuestionarios')
@section('content')
    @livewire('cuestionarioestudiante-component',['ec_id' => $ec_id])
@endsection

