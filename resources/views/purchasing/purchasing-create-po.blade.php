@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('page')
    <x-navbar.navbar search="false">
        <x-slot:title>
            <div class="navbar-title">Create Po</div>
        </x-slot:title>
    </x-navbar.navbar>



    <div class="create-menu-content">
        <div class="row g-0">
            <div class="col-sm-6 offset-1">
                
                {{-- Title --}}
                <div class="subtitle-2-medium">Create Purchase Order</div>

                
                <div class="content-information">
                    
                        <label for="form-select" class="form-label input-label">Tanggal</label>

                        <input type="date" disabled class="form-control input-default" id="dateInput" name="date">


                    {{-- Outlet --}}
                    <x-button.select-button placeHolder="" label="Outlet" class="margin-top-16">
                        <option value="chabihun1">Cahaya Senja Cafe</option>
                        <option value="chabihun1">Cahaya Senja Cafe</option>
                        <option value="chabihun1">Cahaya Senja Cafe</option>
                    </x-button.select-button>


                    {{-- Supplier --}}
                
                    <x-button.select-button placeHolder="" label="Supplier" class="margin-top-16">
                        <option value="chabihun1">PT Meet Fresh</option>
                        <option value="chabihun1">PT Meet Fresh</option>
                        <option value="chabihun1">PT Meet Fresh</option>
                        <option value="chabihun1">PT Meet Fresh</option>
                    </x-button.select-button>
                

                {{-- Note --}}
                <x-form.text-area id="note" class="margin-top-16" label="Note" placeHolder="Notes">
                </x-form.text-area>

                {{-- Purchase Order --}}
                <div class="subtitle-3-medium margin-top-32">Purchase Order</div>
                <div id="divider" class="margin-top-12"></div>

                <div class="margin-top-32">
                    <div class="row g-0 d-flex justify-content-between">
                        <div class="col-sm-1 subtitle-3-medium">Total</div>
                        <div class="col-sm-1 subtitle-3-medium total-price">0</div>
                    </div>
                </div>

                <x-button.text-only-primary class="container-fluid margin-top-8" id="btnManageRecipe"
                onClick="" text="Manage Recipe" toogle="modal" target="#manageInventoryModal"> </x-button.text-only-primary>
                </div>

                

            
            </div>
        </div>
    </div>


    <x-modal.modal-scrollable id="manageInventoryModal" title="Add Ingredients" icon="">

        <div class="body-modal-create-po">
            {{-- add ingredients body --}}
            <form class="d-flex ">
                <input class="form-control full-search-bar clear container-fluid" type="search" placeholder="Search" aria-label="Search">
            </form>

            {{-- list of ingredients --}}
            <div class="list-of-ingredients-modal">

                {{-- ini  --}}
                <x-list.list-of-ingredients idItem="" itemImage="" itemName=""></x-list.list-of-ingredients>
                <x-list.list-of-ingredients idItem="" itemImage="" itemName=""></x-list.list-of-ingredients>
            </div>
        </div>
        


        <x-slot:footer>
            <x-button.text-only-outlined class="" id="btnCancelVariant" text="Cancel"
                onClick="" dismiss="modal">
            </x-button.text-only-outlined>

            <x-button.text-only-primary class="" id="btnMoveSelectedItemsVariant"
                onClick="" text="Add"> </x-button.text-only-primary>
        </x-slot:footer>
    </x-modal.modal-scrollable>

@endsection

@section('footer-script')
    <script src="{{ asset('js/purchase-order.js') }}"></script>
@endsection
