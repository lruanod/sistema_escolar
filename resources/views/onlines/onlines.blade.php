@extends('layouts.base')
@section('title', 'clases virtuales')
@section('content')
    @livewire('online-component',['mc_id' => $mc_id])
@endsection

