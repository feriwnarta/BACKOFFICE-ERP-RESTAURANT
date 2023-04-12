@extends('layouts.app')


@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('page')
    <x-navbar.navbar>
        <x-slot:title>
            <div class="navbar-title">Purchase Order</div>
        </x-slot:title>

        <x-button.icon-text-outlined id="pilih-tanggal-btn" class="btn-nav" text="Pilih Tanggal" icon="calendar-icon">
        </x-button.icon-text-outlined>

        <x-button.dropdown-no-icon id="all-status-btn" class="btn-nav" text="All Status">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
        </x-button.dropdown-no-icon>

        <x-button.text-only-secondary id=export-btn class="btn-nav" text="Export" onClick="">
        </x-button.text-only-secondary>
        <x-button.text-only-primary id="create-po-btn" class="btn-nav" text="Create PO"
            onClick="changeContent('purchasing/purchase-order/create-po')"></x-button.text-only-primary>

    </x-navbar.navbar>


    {{-- {{ $supplier_data['name'] }} --}}


    <div class="create-menu-content">
        <div class="row g-0">
            <div class="col-sm-8 offset-1">

                <div class="purchase-order-details margin-top-19">
                    {{-- Title --}}
                    <div class="subtitle-2-medium">Purchase Order Details</div>
                    <div id="divider" class="margin-top-4"></div>


                    <div class="content-information">

                        <div class="supplier-data">
                            <div class="subtitle-3-medium">{{ $supplier_data['name'] }}</div>
                            <div class="po-table margin-top-8">
                                <div class="row g-0">
                                    <div class="col-sm-6 table-po">
                                        {{ $supplier_data['phone'] }}
                                    </div>
                                    <div class="col-sm-6 table-po table-po-rm-top">
                                        {{ $supplier_data['email'] }}
                                    </div>

                                </div>

                                <div class="row g-0">
                                    <div class="col-sm-12 table-po table-po-rm-top">
                                        {{ $supplier_data['address']['street'] }}
                                    </div>
                                </div>

                                <div class="row g-0">

                                    <div class="col-sm-4 table-po table-po-rm-top">
                                        {{ $supplier_data['address']['state'] }}
                                    </div>
                                    <div class="col-sm-4 table-po table-po-rm-top">
                                        {{ $supplier_data['address']['city'] }}
                                    </div>
                                    <div class="col-sm-4 table-po table-po-rm-top">
                                        {{ $supplier_data['address']['zip'] }}
                                    </div>

                                </div>
                            </div>

                        </div>


                        <div id="divider" class="margin-top-24"></div>

                        <div class="po-data margin-top-24">
                            <div class="subtitle-3-regular">PO Number {{ $po_data['po_number'] }}</div>
                            <div class="subtitle-3-regular">Created at : {{ $po_data['create_at'] }}</div>
                            <div class="subtitle-3-regular">Created by : {{ $po_data['create_by'] }}</div>
                            <div class="subtitle-3-regular">Email : {{ $po_data['email'] }}</div>
                            <div class="subtitle-3-regular">Outlet : {{ $po_data['outlet'] }}</div>
                            <div class="subtitle-3-regular">Phone : {{ $po_data['phone'] }}</div>
                            <div class="subtitle-3-regular">Address : {{ $po_data['address'] }} </div>


                            <div class="status-activity margin-top-24">
                                <div class="subtitle-3-medium">Status Activity</div>
                                <div id="divider" class="margin-top-8"></div>



                                {{-- status activity --}}
                                <x-button.select-button placeHolder="" label=""
                                    class="input-status-activity margin-top-18">
                                    @foreach ($po_data['status'] as $status)
                                        <option value="">{{ $status }}</option>
                                    @endforeach

                                </x-button.select-button>


                            </div>


                        </div>

                        <div class="po-items margin-top-24">
                            <div class="subtitle-3-medium">Purchase Order</div>
                            <div id="divider" class="margin-top-8"></div>

                        </div>


                    </div>
                </div>

            </div>

            <div class="col-sm-3">
                <x-button.text-only-primary id="create-po" class="margin-left-16" text="Done" onClick="">
                </x-button.text-only-primary>

                <x-button.text-only-secondary id=export-bt class="margin-left-16" text="Mark as fulfilled" onClick="">
                </x-button.text-only-secondary>

                <x-button.dropdown-no-icon id="all-s" class="margin-left-16" text="More">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </x-button.dropdown-no-icon>
            </div>

        </div>
    </div>
@endsection
