@extends('layouts.app')


@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('page')
<x-navbar.navbar>
    <x-slot:title>
        <div class="navbar-title">Summary</div>
    </x-slot:title>

    <x-button.icon-text-outlined id="pilih-tanggal-btn" class="btn-nav" text="Pilih Tanggal" icon="calendar-icon"></x-button.icon-text-outlined>

    <x-button.dropdown-no-icon id="item-library-btn" class="btn-nav" text="Item Library">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
    </x-button.dropdown-no-icon>

    <x-button.text-only-primary id="export-btn" class="btn-nav" text="Export" onClick=""></x-button.text-only-primary>


</x-navbar.navbar>

<div id="progress-bar"></div>
@endsection



