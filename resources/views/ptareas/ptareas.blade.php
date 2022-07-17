@extends('layouts.base')
@section('title', 'Tareas')
@section('content')
    @livewire('ptarea-component',['esc_id' => $esc_id])
@endsection

