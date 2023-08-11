@extends('layouts.app')


@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('appbar')
    <x-navbar.navbar search="false">
        <x-slot:title>
            <div class="navbar-title">Menu</div>
        </x-slot:title>
    </x-navbar.navbar>
@endsection

@section('page')
    <div class="create-menu-content">
        <div class="row g-0">
            <div class="col-sm-7 offset-1">
                {{-- Title --}}
                <div class="subtitle-2-medium">Create Recipes Menu</div>

                <div class="content-information">

                    {{-- Select menu item --}}
                    <div class="row">
                        <div class="col-sm-8">
                            <x-button.select-button placeHolder="" label="Select menu item" class="margin-top-16"
                                id="outlet">
                                <option value="senja1">Cahaya Senja Cafe 1</option>
                                <option value="senja2">Cahaya Senja Cafe 2</option>
                                <option value="senja3">Cahaya Senja Cafe 3</option>
                            </x-button.select-button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <x-button.select-button placeHolder="" label="Select menu variant" class="margin-top-16"
                                id="outlet">
                                <option value="senja1">Cahaya Senja Cafe 1</option>
                                <option value="senja2">Cahaya Senja Cafe 2</option>
                                <option value="senja3">Cahaya Senja Cafe 3</option>
                            </x-button.select-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
