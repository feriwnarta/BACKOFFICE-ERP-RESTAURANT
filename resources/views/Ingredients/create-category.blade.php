@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('page')
<x-navbar.navbar search="false">
    <x-slot:title>
        <div class="navbar-title">Category Ingredients</div>
    </x-slot:title>
</x-navbar.navbar>    


@endsection
