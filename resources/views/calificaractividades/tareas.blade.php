@extends('layouts.base')
@section('title', 'tareas')
@section('content')
    @livewire('calificartarea-component',['ta_id' => $ta_id])
@endsection

