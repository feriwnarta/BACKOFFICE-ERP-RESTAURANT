@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar')
@endsection


@section('appbar')
    <x-navbar.navbar>
        <x-slot:title>
            <div class="navbar-title">Ingredient Library</div>
        </x-slot:title>

        <x-button.icon-text-primary id="create-ingredients-btn" class="btn-nav" icon="plus-icon" text="Create Ingredients"
            onClick="changeContent('ingredients/library/create-ingredients')"></x-button.icon-text-primary>
    </x-navbar.navbar>
@endsection

@section('page')
    @if (!isset($ingredient_library))
        {{-- no data display --}}
        <img src="{{ asset('img/no-data.png') }}" alt="no-data" width="200px" class="no-data">
    @else
    @endif
@endsection
