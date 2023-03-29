@extends('layouts.app')


@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('page')

<x-navbar.navbar>
    <x-slot:title>
        <div class="navbar-title">Supplier</div>
    </x-slot:title>

    <x-button.text-only-secondary id=export-btn class="btn-nav" text="Export" onClick=""></x-button.text-only-secondary>
    <x-button.text-only-primary id="create-supplier-btn" class="btn-nav" text="Create Supplier" onClick=""></x-button.text-only-primary>

</x-navbar.navbar>

<div id="progress-bar"></div>

@endsection
