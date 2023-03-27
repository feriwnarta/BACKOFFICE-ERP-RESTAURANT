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
            <div class="col-sm-7 offset-1 g-0">
                <div class="subtitle-2-medium">General Information</div>

                <div class="content-information">
                    <x-form.input-default id="Product Name" class="" name="" placeHolder="" label="Product Name">
                    </x-form.input-default>
                    

                    <x-form.dropdown-default placeHolder="Category" label="Category" class="margin-top-16">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </x-form.dropdown-default>

                    <x-form.text-area id="description" class="margin-top-16" label="Description" placeHolder="">
                    </x-form.text-area>

                    <div id="divider" class="margin-top-36"></div>

                    <div class="margin-top-36">
                        <div id="pricing">
                            <div class="subtitle-3-medium">Pricing</div>
                            <div id="divider" class="margin-top-12"></div>
                            <div class="row">
                                <div class="col">
                                    <x-form.input-default id="idInputPriceMenu" class="margin-top-12 input-from-left"
                                        name="" placeHolder="" label=""></x-form.input-default>
                                </div>
                                <div class="col">
                                    <x-form.input-default id="idInputCodeMenu" class="margin-top-12" name=""
                                        placeHolder="" label=""></x-form.input-default>
                                </div>
                            </div>


                            <div class="row">
                                <x-button.icon-text-primary class="" id="idBtnAddVariant" onClick="" icon="plus-icon"
                                text="Add Variant"></x-button.icon-text-primary>
                            </div>

                        </div>
                    </div>
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
