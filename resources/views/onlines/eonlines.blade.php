@extends('layouts.base')
@section('title', 'clases virtuales')
@section('content')
    @livewire('eonline-component',['ec_id' => $ec_id])
@endsection

