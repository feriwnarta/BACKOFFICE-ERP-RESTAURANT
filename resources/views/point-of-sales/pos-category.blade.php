@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('page')
<x-navbar.navbar>
    <x-slot:title>
        <div class="navbar-title">Category</div>
    </x-slot:title>

    <x-button.text-only-primary id="create-category-btn" class="btn-nav" text="Create Category" onClick="changeContent('pos/category/create-category')">

    </x-button.text-only-primary>

</x-navbar.navbar>

<div id="progress-bar"></div>
@endsection
