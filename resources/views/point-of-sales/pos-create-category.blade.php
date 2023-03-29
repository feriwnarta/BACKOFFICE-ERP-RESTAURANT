@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('page')

<x-navbar.navbar search="false">
    <x-slot:title>
        <div class="navbar-title">Category</div>
    </x-slot:title>

</x-navbar.navbar>

<div id="progress-bar"></div>

<div id="content-loaded">

    <div id="create-category">
        <div>Create Your Category</div>

        <form id="form-create-category">
            <div class="mb-3">
                <label for="itemName" class="form-label">Item Name</label>
                <input type="text" class="form-control" name="item-name" placeholder="Chamie">
            </div>

            <div class="space"></div>

            <div class="d-flex flex-row justify-content-end btn-action-create-category">
                <button type="submit" class="btn btn-primary me-2">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>

</div>
@endsection
