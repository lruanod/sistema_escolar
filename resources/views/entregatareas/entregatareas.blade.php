@extends('layouts.base')
@section('title', 'Tareas')
@section('content')
    @livewire('entregatarea-component',['ec_id' => $ec_id])
@endsection

