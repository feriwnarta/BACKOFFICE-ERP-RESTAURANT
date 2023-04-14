@extends('layouts.app')


@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('appbar')
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
@endsection

@section('page')

    @if (!isset($po))
        {{-- no data display --}}
        <img src="{{ asset('img/no-data.png') }}" alt="no-data" width="200px" class="no-data">
    @else
        <div id="content-loaded">
            <div class="row g-0">
                <table id="" class="table borderless table-hover">
                    <thead class="table-head-color">
                        <tr>
                            <th>Date</th>
                            <th>Supplier</th>
                            <th>Order No.</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="listPurchaseOrder">

                        @foreach ($po as $itemPo)
                            {{-- id nanti diisi dengan id po dari databse --}}
                            <tr class="items-table-head-color" id="po1">
                                <td>{{ $itemPo['date'] }}</td>
                                <td>{{ $itemPo['supplier'] }}</td>
                                <td>{{ $itemPo['order_no'] }}</td>
                                <td>{{ $itemPo['total'] }}</td>
                                <td>
                                    <div class="status-po">
                                        <div class="title-status-po">
                                            <i class="plus-circle-icon-bg"></i>
                                            {{ $itemPo['status'] }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
