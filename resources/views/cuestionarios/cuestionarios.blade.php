@extends('layouts.base')
@section('title', 'Cuestionarios')
@section('content')
    @livewire('cuestionario-component',['mc_id' => $mc_id])
@endsection

