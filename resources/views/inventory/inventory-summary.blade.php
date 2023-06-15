@extends('layouts.app')


@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('appbar')
    <x-navbar.navbar>
        <x-slot:title>
            <div class="navbar-title">Summary</div>
        </x-slot:title>

        <x-button.icon-text-outlined id="pilih-tanggal-btn" class="btn-nav" text="Pilih Tanggal" icon="calendar-icon">
        </x-button.icon-text-outlined>

        <x-button.dropdown-no-icon id="item-library-btn" class="btn-nav" text="Item Library">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
        </x-button.dropdown-no-icon>

        <x-button.text-only-primary id="export-btn" class="btn-nav" text="Export" onClick="">
        </x-button.text-only-primary>


    </x-navbar.navbar>
@endsection

@section('page')
    <div id="content-loaded">
        <div class="row g-0">
            <table id="" class="table borderless table-hover">
                <thead class="table-head-color">
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Last Purchase</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
                </thead>
{{--                <tbody id="listPurchaseOrder">--}}


{{--                @foreach ($datas as $data)--}}
{{--                    --}}{{-- id nanti diisi dengan id po dari databse --}}
{{--                    <tr class="items-table-head-color" id="po1">--}}
{{--                        <td>{{ $data['date'] }}</td>--}}
{{--                        <td>{{ $data['supplier'] }}</td>--}}
{{--                        <td>{{ $data['order_number'] }}</td>--}}
{{--                        <td>{{ $data['total'] }}</td>--}}
{{--                        <td>--}}
{{--                            <div class="status-po">--}}
{{--                                <div class="title-status-po">--}}
{{--                                    <i class="plus-circle-icon-bg"></i>--}}
{{--                                    {{ $data['status'] }}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}



{{--                </tbody>--}}
            </table>
        </div>
    </div>
@endsection
