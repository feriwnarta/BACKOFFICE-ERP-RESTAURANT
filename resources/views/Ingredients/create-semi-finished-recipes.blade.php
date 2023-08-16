@extends('layouts.app')


@section('sidebar')
    @include('partials.sidebar')
@endsection


@section('appbar')
    <x-navbar.navbar search="false">
        <x-slot:title>
            <div class="navbar-title">Semi-Finished Recipes</div>
        </x-slot:title>
    </x-navbar.navbar>
@endsection


@section('page')
    <div class="row g-0">
        <div class="col-sm-8 offset-1">
            <div class="create-semi-finished margin-top-19">

                {{-- title  --}}
                <div class="subtitle-2-medium">Create Semi-Finished Ingredients</div>


                <div class="content-information">
                    <div class="row align-items-start">
                        <div class="col-sm-2">
                            <div class="image-picker">
                                <img id="" src="{{ asset('img/image-pos.png') }}" alt="" srcset=""
                                    class="img-fluid">
                            </div>
                        </div>

                        <div class="col-sm-10">
                            <x-form.input-default id="itemName" optional="required" class="" name=""
                                placeHolder="Daging ayam cincang" label="Item Name">
                            </x-form.input-default>

                            <x-button.select-button placeHolder="" label="Category" class="" optional="required"
                                id="categorySelect">
                                <option value="null">Select</option>
                            </x-button.select-button>

                        </div>


                        <div id="manageRecipe" class="margin-top-32">
                            <div class="subtitle-3-medium">Recipe</div>
                            <div id="divider" class="margin-top-12"></div>

                            <div class="recipe-table">
                               
                            </div>

                            <x-button.text-only-primary class="container-fluid margin-top-8" id="btnManageRecipe"
                                onClick="" text="Manage Recipe">

                            </x-button.text-only-primary>
                        </div>


                        <div id="settingInventory" class="margin-top-32">
                            <div class="subtitle-3-medium">Inventory</div>
                            <div id="divider" class="margin-top-12"></div>

                            <div class="setting-inventory">

                            </div>

                            <x-button.text-only-primary class="container-fluid margin-top-8" id="btnSettingInventory"
                                onClick="" text="Setting Inventory" toogle="modal" target="#settingInventory">

                            </x-button.text-only-primary>
                        </div>

                        <div id="settingInventory" class="margin-top-32">
                            <div class="subtitle-3-medium">Production</div>
                            <div id="divider" class="margin-top-12"></div>

                            <div class="production">

                            </div>

                            <x-button.text-only-primary class="container-fluid margin-top-8" id="btnProduce" onClick=""
                                text="Produce" toogle="modal" target="#produce">

                            </x-button.text-only-primary>
                        </div>

                        <div id="settingInventory" class="margin-top-32">
                            <div class="subtitle-3-medium">COGS</div>
                            <div id="divider" class="margin-top-12"></div>

                            <div class="production">

                            </div>

                            <x-button.text-only-primary class="container-fluid margin-top-8" id="btnSettingCogs"
                                onClick="" text="Setting COGS" toogle="modal" target="#settingCogs">

                            </x-button.text-only-primary>
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection


@section('footer-script')
    <script src="{{ asset('js/create-semi-recipes.js') }}"></script>
@endsection
