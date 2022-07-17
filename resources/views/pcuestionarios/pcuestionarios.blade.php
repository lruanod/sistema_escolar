@extends('layouts.base')
@section('title', 'Cuestionarios')
@section('content')
    @livewire('pcuestionario-component',['esc_id' => $esc_id])
@endsection

