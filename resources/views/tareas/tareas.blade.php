@extends('layouts.base')
@section('title', 'Tareas')
@section('content')
    @livewire('tarea-component',['mc_id' => $mc_id])
@endsection

