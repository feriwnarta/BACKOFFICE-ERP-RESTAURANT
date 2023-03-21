@extends('layouts.app')


@section('sidebar')
    @include('partials.sidebar')
@endsection



@section('page')
<x-navbar.navbar>
    <x-slot:title>
        <x-button.text-only-text class="navbar-title" id="nav-title" text="Menu" onClick=""></x-button.text-only-text>
        <x-button.text-only-text class="navbar-subtitle" id="nav-subtitle" text="Semi-Finished Recipes" onClick="contentRequestNav('asd', 'asd', 'asd', 'nav-subtitle', 'nav-title')"></x-button.text-only-text>
    </x-slot:title>


    <x-button.icon-text-primary id="create-recipes-btn" class="btn-nav" icon="plus-icon" text="Create Recipes" onClick="contentRequest('{{ url('/') }}/ingredients/recipes/create-recipes', 'GET')"></x-button.icon-text-primary>

</x-navbar.navbar>

<div id="progress-bar"></div>
@endsection
