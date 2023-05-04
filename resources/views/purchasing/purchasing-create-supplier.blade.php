@extends('layouts.app')


@section('sidebar')
    @include('partials.sidebar')
@endsection


@section('appbar')
    <x-navbar.navbar search="false">
        <x-slot:title>
            <div class="navbar-title">Supplier</div>
        </x-slot:title>
    </x-navbar.navbar>
@endsection

@section('page')
    <div class="create-menu-content">
        <div class="row g-0">
            <div class="col-sm-7 offset-1 create-supplier">

                <div class="subtitle-2-medium">Create Supplier</div>

                <div class="content-information">
                    <x-form.input-default id="supplierName" class="" name="" placeHolder="Input your supplier name"
                        label="Supplier Name">
                    </x-form.input-default>

                    <x-form.input-default id="supplierPhone" class="" name="" placeHolder="+62"
                        label="Phone Number">
                    </x-form.input-default>

                    <x-form.input-email id="supplierEmail" class="" name=""
                        placeHolder="Input your supplier email" label="Email">
                    </x-form.input-email>

                    <x-form.input-default id="supplierAddress" class="" name=""
                        placeHolder="Input your supplier address" label="Address">
                    </x-form.input-default>

                    <x-form.input-default id="supplierCity" class="" name=""
                        placeHolder="Input your supplier city" label="City">
                    </x-form.input-default>

                    <div class="row">
                        <div class="col">
                            <x-form.input-default id="supplierState" class="" name=""
                                placeHolder="Input your supplier state" label="State">
                            </x-form.input-default>
                        </div>
                        <div class="col">
                            <x-form.input-default id="supplierZip" class="" name=""
                                placeHolder="Input your supplier Zip" label="Zip">
                            </x-form.input-default>
                        </div>
                    </div>

                    <div id="ctaActionSupplier" class="btn-action-create">

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
    <script src="{{ asset('js/create-supplier.js') }}"></script>
@endsection
