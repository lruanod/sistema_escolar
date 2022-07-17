@extends('layouts.base')
@section('title', 'cuestionarios')
@section('content')
    @livewire('calificarcuestionario-component',['cu_id' => $cu_id])
@endsection

