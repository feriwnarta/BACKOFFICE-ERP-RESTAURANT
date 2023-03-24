@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('page')
<x-navbar.navbar search="false">
    <x-slot:title>
        <div class="navbar-title">Create Menu</div>
    </x-slot:title>
</x-navbar.navbar>

<div class="create-menu-content">
    <div class="row">

    
        <div class="col-sm-7 offset-1">
            <div class="subtitle-2-medium">General Information</div>
    
            <div class="content-information">
                <x-form.input-default id="Product Name" class="" name="" placeHolder="Chabihun Seafood XO " label="Product Name"></x-form.input-default>
            
                <x-form.dropdown-default placeHolder="Category" label="Category" class="margin-top-16">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </x-form.dropdown-default>
                
                <x-form.text-area id="description" class="margin-top-16" label="Description" placeHolder="Bihun goreng seafood dengan sauce XO, tauge, kucai, fishcake, udang, cumi dan telur bebek."></x-form.text-area>
            </div>
        </div> 

        <div class="col-sm-2 offset-1 d-flex flex-column align-items-start justify-content-start">
            <div class="image-information">
                <div class="body-text-regular">Image for POS</div>
                <div>
                    <img src="{{ asset('img/mie.png') }}" alt="" srcset="" class="img-fluid">
                </div>
            </div>
        </div>
    
</div>

</div>



@endsection
