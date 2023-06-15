@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('appbar')
    <x-navbar.navbar search="false">
        <x-slot:title>
            <div class="navbar-title">Category Ingredients</div>
        </x-slot:title>
    </x-navbar.navbar>
@endsection

@section('page')
    <div id="content-loaded">

        <div id="row g-0">

            <div class="col-sm-7 offset-1 create-category">

                <div class="subtitle-2-medium">Create your category ingredients</div>
                <div class="content-information">
                    <x-form.input-default id="categoryName" class="" name="" placeHolder="Input your category name"
                        label="Item Name" required="required">
                    </x-form.input-default>
                    <div id="ctaActionCategory" class="btn-action-create">
                        <div class="d-flex flex-row justify-content-end">
                            <x-button.text-only-outlined class="" id="" text="Cancel" onClick="">
                            </x-button.text-only-outlined>
                            <x-button.text-only-primary class="margin-left-16" id="btnSettingInventory" onClick="saveMenu()"
                                text="Save"> </x-button.text-only-primary>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection

@section('footer-script')
    <script src="{{ asset('js/create-category.js') }}"></script>
@endsection
