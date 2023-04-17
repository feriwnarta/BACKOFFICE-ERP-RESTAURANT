@extends('layouts.app')


@section('sidebar')
    @include('partials.sidebar')
@endsection


@section('appbar')
    <x-navbar.navbar>
        <x-slot:title>
            <x-button.text-only-text class="navbar-title" id="nav-title" text="Menu"
                onClick="changeContent('ingredients/recipes')"></x-button.text-only-text>

            <x-button.text-only-text class="navbar-subtitle" id="nav-subtitle" text="Semi-Finished Recipes"
                onClick="changeContent('ingredients/recipes/semi-finished-recipes')"></x-button.text-only-text>
        </x-slot:title>


        <x-button.icon-text-primary id="create-recipes-btn" class="btn-nav" icon="plus-icon" text="Create Recipes"
            onClick="changeContent('ingredients/recipes/create-recipes')"></x-button.icon-text-primary>

    </x-navbar.navbar>
@endsection

@section('page')
@endsection
