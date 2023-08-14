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

                    <div class="subtitle-3-medium margin-top-32">Recipe</div>

                    <div id="divider" class="margin-top-8"></div>

                    <div class="margin-top-8">
                        <table class="table table-bordered only-underline table-create-recipes body-text-regular">
                            <thead>
                                <tr class="no-border-side">
                                    <th scope="col">Ingredients</th>
                                    <th scope="col">Usage</th>
                                    <th scope="col">Unit</th>
                                    <th scope="col">Cooking Type</th>
                                    <th scope="col">Avg Cost</th>
                                    <th scope="col">Last Cost</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">




                                <tr id="divideContent">
                                    <td colspan="6" class="span-all-columns"
                                        style="padding-bottom: 5px; padding-top: 5px;">
                                        <button class="btn icon-text" type="button" id="addIngredients">
                                            + Add ingredients
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="4" class="span-all-columns"
                                        style="padding-bottom: 10px; border-right: none;">
                                        <div>Total Average & Last Cost</div>
                                    </td>
                                    <td colspan="1" style="border-right: none;">
                                        <p class="body-text-bold" id="totalAvgCost">Rp.</p>
                                    </td>
                                    <td colspan="1" style="border-right: none;">
                                        <p class="body-text-bold" id="totalLastCost">Rp.</p>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <div class="margin-top-32">
                        <div class="row">
                            <div class="col">
                                <div class="equipment ">
                                    <p class="subtitle-3-medium">Equipment</p>
                                    <div id="divider"></div>

                                    <div class="item" style="padding-right: 185px;">
                                        <table class="table table-bordered table-equipment body-text-regular">
                                            <thead>
                                                <tr class="">
                                                    <th>Item</th>
                                                    <th></th>

                                                </tr>
                                            </thead>
                                            <tbody class="table-group-divider">

                                                <tr id="divideContentItem">
                                                    <td colspan="2" class="span-all-columns"
                                                        style="padding-bottom: 5px; padding-top: 5px; border-right: none;">
                                                        <button class="btn icon-text" type="button" id="addItemEquipment">
                                                            + Add item equipment
                                                        </button>
                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                            </div>
                            <div class="col">
                                <div class="serving-supplies  margin-left-16">
                                    <div class="serving-supplies ">
                                        <p class="subtitle-3-medium">Serving Supplies</p>
                                        <div id="divider"></div>

                                        <div class="item" style="padding-right: 185px;">
                                            <table class="table table-bordered table-equipment body-text-regular">
                                                <thead>
                                                    <tr class="">
                                                        <th>Item</th>
                                                        <th></th>

                                                    </tr>
                                                </thead>
                                                <tbody class="table-group-divider">

                                                    <tr id="divideContentItemServSupplies">
                                                        <td colspan="2" class="span-all-columns"
                                                            style="padding-bottom: 5px; padding-top: 5px; border-right: none;">
                                                            <button class="btn icon-text" type="button"
                                                                id="addItemServingSupplies">
                                                                + Add item equipment
                                                            </button>
                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="margin-top-32">
                        <p class="subtitle-3-medium">How to cook</p>
                        <div id="divider" class="margin-top-8"></div>

                        <x-form.text-area id="howToCook" class="margin-top-16" label="write how this recipe was made"
                            placeHolder="Textarea placeholder">
                        </x-form.text-area>
                    </div>



                </div>



                <div class="d-flex flex-row justify-content-end margin-bottom-32">

                    <x-button.text-only-outlined class="" id="" text="Cancel" onClick="">
                    </x-button.text-only-outlined>
                    <x-button.text-only-primary class="margin-left-16" id="btnSave" onClick="" text="Save">
                    </x-button.text-only-primary>

                </div>



            </div>
        </div>
    </div>
@endsection


@section('footer-script')
    <script src="{{ asset('js/create-recipes.js') }}"></script>
@endsection
