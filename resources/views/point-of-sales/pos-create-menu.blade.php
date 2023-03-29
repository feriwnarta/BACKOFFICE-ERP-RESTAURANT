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

                {{-- Title --}}
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

                    <div id="divider" class="margin-top-32"></div>


                    <div class="margin-top-32">


                        {{-- Pricing --}}
                        <div id="pricingMenu">
                            <div class="subtitle-3-medium">Pricing</div>
                            <div id="divider" class="margin-top-12"></div>
                            <div class="row">
                                <div class="col">
                                    <x-form.input-default id="idInputPriceMenu" class="margin-top-12 input-from-right"
                                        name="" placeHolder="" label=""></x-form.input-default>
                                </div>
                                <div class="col">
                                    <x-form.input-default id="idInputCodeMenu" class="margin-top-12" name=""
                                        placeHolder="" label=""></x-form.input-default>
                                </div>
                            </div>

                            <x-button.icon-text-primary id="btn" class="container-fluid margin-top-8" icon="plus-icon"
                                text="Add Variant" toggle="modal" target="#addVariantModal"> </x-button.icon-text-primary>
                        </div>


                        <div id="divider" class="margin-top-32"></div>


                        {{-- Inventory --}}
                        <div id="inventoryMenu" class="margin-top-32">
                            <div class="subtitle-3-medium">Inventory</div>
                            <div id="divider" class="margin-top-12"></div>

                            <x-button.text-only-primary class="container-fluid margin-top-8" id="btnSettingInventory"
                                onClick="" text="Setting Inventory" toogle="modal" target="#manageInventoryModal">

                            </x-button.text-only-primary>
                        </div>


                        <div id="divider" class="margin-top-32"></div>

                        {{-- COGS --}}
                        <div id="cogsMenu" class="margin-top-32">
                            <div class="subtitle-3-medium">COGS</div>
                            <div id="divider" class="margin-top-12"></div>

                            <x-button.text-only-primary class="container-fluid margin-top-8" id="btnSettingInventory"
                                onClick="" text="Setting COGS">

                            </x-button.text-only-primary>
                        </div>


                        {{-- CTA --}}
                        <div id="ctaActionMenu" class="margin-top-32">

                            <div class="d-flex flex-row justify-content-end">

                                <x-button.text-only-outlined class="" id="" text="Cancel" onClick="">
                                </x-button.text-only-outlined>


                                <x-button.text-only-primary class="margin-left-16" id="btnSettingInventory" onClick=""
                                    text="Save"> </x-button.text-only-primary>

                            </div>
                        </div>



                        {{-- MODAL ADD VARIANT --}}
                        <x-modal.modal-input id="addVariantModal" title="Add Variant" icon="plus-icon">

                            <form id="variantForm">
                                <div class="d-flex flex-row">

                                    <input type="text" class="form-control table-input" id="exampleInputEmail1"
                                        placeholder="Variant Name" aria-describedby="emailHelp" autocomplete="off">
                                    <input type="text" class="form-control table-input input-from-right"
                                        id="inputPriceVariantModal" placeholder="Price" aria-describedby="emailHelp"
                                        autocomplete="off">
                                    <input type="text" class="form-control table-input" placeholder="SKU"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off">

                                </div>
                            </form>

                            <x-slot:footer>
                                <x-button.text-only-outlined class="" id="btnCancelVariant" text="Cancel"
                                    onClick="" dismiss="modal">
                                </x-button.text-only-outlined>

                                <x-button.text-only-primary class="" id="btnMoveSelectedItemsVariant"
                                    onClick="" text="Move Selected Items"> </x-button.text-only-primary>
                            </x-slot:footer>

                        </x-modal.modal-input>



                        {{-- MODAL MANAGE INVENTORY --}}
                        <x-modal.modal-input id="manageInventoryModal" title="Manage Inventory" icon="">
                            <table id="" class="table borderless table-manage-inventory">
                                <thead class="table-head-color-modal">
                                    <tr>
                                        <th>Variant</th>
                                        <th>Track Stock</th>
                                        <th>In Stock</th>
                                        <th>Minimum Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>BHP 01</td>
                                        <td>
                                            <input class="red-input" type="checkbox" />
                                        </td>
                                        <td>Bubur</td>
                                        <td>Rp 50.000</td>
                                    </tr>
                                </tbody>
                            </table>



                            <x-slot:footer>
                                <x-button.text-only-outlined class="" id="btnCancelVariant" text="Cancel"
                                    onClick="" dismiss="modal">
                                </x-button.text-only-outlined>

                                <x-button.text-only-primary class="" id="btnMoveSelectedItemsVariant"
                                    onClick="" text="Move Selected Items"> </x-button.text-only-primary>
                            </x-slot:footer>

                        </x-modal.modal-input>
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
