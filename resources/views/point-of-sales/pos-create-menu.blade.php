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
                    <x-form.input-default id="productName" class="" name="" placeHolder="" label="Product Name">
                    </x-form.input-default>


                    <x-button.select-button placeHolder="" label="Category" class="">
                        <option value="chabihun1">Chabihun 1</option>
                        <option value="chabihun2">Chabihun 2</option>
                        <option value="chabihun3">Chabihun 3</option>
                    </x-button.select-button>

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
                                    <x-form.input-default id="idInputPriceMenu"
                                        class="margin-top-12 input-from-right input-format-price" name=""
                                        placeHolder="" label=""></x-form.input-default>
                                </div>
                                <div class="col">
                                    <x-form.input-default id="idInputCodeMenu" class="margin-top-12" name=""
                                        placeHolder="" label=""></x-form.input-default>
                                </div>
                            </div>

                            <div class="variant-list">

                            </div>

                            <x-button.icon-text-primary id="btn" class="container-fluid margin-top-8" icon="plus-icon"
                                text="Add Variant" toggle="modal" target="#addVariantModal"> </x-button.icon-text-primary>
                        </div>


                        <div id="divider" class="margin-top-32"></div>


                        {{-- Inventory --}}
                        <div id="inventoryMenu" class="margin-top-32">
                            <div class="subtitle-3-medium">Inventory</div>
                            <div id="divider" class="margin-top-12"></div>

                            <div class="inventory-list">

                            </div>

                            <x-button.text-only-primary class="container-fluid margin-top-8" id="btnSettingInventory"
                                onClick="settingInventory()" text="Setting Inventory" toogle="modal"
                                target="#manageInventoryModal">

                            </x-button.text-only-primary>
                        </div>


                        <div id="divider" class="margin-top-32"></div>

                        {{-- COGS --}}
                        <div id="cogsMenu" class="margin-top-32">
                            <div class="subtitle-3-medium">COGS</div>
                            <div id="divider" class="margin-top-12"></div>

                            <x-button.text-only-primary class="container-fluid margin-top-8" id="btnSettingInventory"
                                onClick="settingCogs()" text="Setting COGS" toogle="modal" target="#manageCogsModal">

                            </x-button.text-only-primary>
                        </div>


                        {{-- CTA --}}
                        <div id="ctaActionMenu" class="margin-top-32">

                            <div class="d-flex flex-row justify-content-end">

                                <x-button.text-only-outlined class="" id="" text="Cancel" onClick="">
                                </x-button.text-only-outlined>


                                <x-button.text-only-primary class="margin-left-16" id="btnSettingInventory"
                                    onClick="saveMenu()" text="Save"> </x-button.text-only-primary>

                            </div>
                        </div>



                        {{-- MODAL ADD VARIANT --}}
                        <x-modal.modal-input id="addVariantModal" title="Add Variant" icon="plus-icon">

                            <form id="variantForm">
                                <div class="d-flex flex-row">

                                    <input type="text" class="form-control table-input" id="inputVariantNameModal"
                                        placeholder="Variant Name" autocomplete="off">
                                    <input type="text" class="form-control table-input input-format-price-modal"
                                        id="inputPriceVariantModal" placeholder="Price" autocomplete="off">
                                    <input type="text" class="form-control table-input" placeholder="SKU"
                                        id="inputSkuVariantModal" autocomplete="off">

                                </div>
                            </form>

                            <x-slot:footer>
                                <x-button.text-only-outlined class="" id="btnCancelVariant" text="Cancel"
                                    onClick="" dismiss="modal">
                                </x-button.text-only-outlined>

                                <x-button.text-only-primary class="" id="btnMoveSelectedItemsVariant"
                                    onClick="addVariant()" text="Move Selected Items"> </x-button.text-only-primary>
                            </x-slot:footer>

                        </x-modal.modal-input>



                        {{-- MODAL MANAGE INVENTORY --}}
                        <x-modal.modal-input id="manageInventoryModal" title="Manage Inventory" icon="">
                            <table id="" class="table borderless table-modal">
                                <thead class="table-head-color-modal">
                                    <tr>
                                        <th>Variant</th>
                                        <th>Track Stock</th>
                                        <th>In Stock</th>
                                        <th>Minimum Stock</th>
                                    </tr>
                                </thead>
                                <tbody id="listVariantOnInventory">

                                </tbody>
                            </table>



                            <x-slot:footer>
                                <x-button.text-only-outlined class="" id="btnCancelVariant" text="Cancel"
                                    onClick="" dismiss="modal">
                                </x-button.text-only-outlined>

                                <x-button.text-only-primary class="" id="btnMoveSelectedItemsVariant"
                                    onClick="setInventory()" text="Move Selected Items"> </x-button.text-only-primary>
                            </x-slot:footer>

                        </x-modal.modal-input>




                        {{-- MODAL MANAGE COGS --}}
                        <x-modal.modal-input id="manageCogsModal" title="Manage COGS" icon="">
                            <table id="" class="table borderless table-modal">
                                <thead class="table-head-color-modal">
                                    <tr>
                                        <th>Variant</th>
                                        <th>Track COGS</th>
                                        <th>Average Cost</th>
                                    </tr>
                                </thead>
                                <tbody id="listVariantOnCogs">
                                    {{-- <tr>
                                        <td>BHP 01</td>
                                        <td>
                                            <input class="red-input checkbox" type="checkbox" />
                                        </td>
                                        <td>
                                            <x-form.input-default id="" class="input-format-price-setting-modal" name=""
                                                placeHolder="" label=""></x-form.input-default>
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>



                            <x-slot:footer>
                                <x-button.text-only-outlined class="" id="btnCancelVariant" text="Cancel"
                                    onClick="" dismiss="modal">
                                </x-button.text-only-outlined>

                                <x-button.text-only-primary class="" id="btnMoveSelectedItemsVariant"
                                    onClick="" text="Confirm"> </x-button.text-only-primary>
                            </x-slot:footer>

                        </x-modal.modal-input>
                    </div>
                </div>
            </div>

            <div class="col-sm-2 offset-1 d-flex flex-column align-items-start justify-content-start">
                <div class="image-information">
                    <div class="body-text-regular">Image for POS</div>
                    <div class="image-picker">
                        <img id="imagePos" src="{{ asset('img/image-pos.png') }}" alt="" srcset=""
                            class="img-fluid">
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection


@section('footer-script')
    <script src="{{ asset('js/menu.js') }}"></script>
@endsection
