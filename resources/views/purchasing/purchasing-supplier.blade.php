@extends('layouts.app')


@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('appbar')
    <x-navbar.navbar>
        <x-slot:title>
            <div class="navbar-title">Supplier</div>
        </x-slot:title>

        <x-button.text-only-secondary id=export-btn class="btn-nav" text="Export" onClick="">
        </x-button.text-only-secondary>
        <x-button.text-only-primary id="create-supplier-btn" class="btn-nav" text="Create Supplier"
            onClick="changeContent('purchasing/supplier/create-supplier')">
        </x-button.text-only-primary>

    </x-navbar.navbar>
@endsection

@section('page')

    @if (!isset($suppliers))
        {{-- no data display --}}
        <img src="{{ asset('img/no-data.png') }}" alt="no-data" width="200px" class="no-data">
    @else
        <div id="content-loaded">
            <div class="row g-0">
                <table id="" class="table borderless table-hover">
                    <thead class="table-head-color">
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody id="listPurchaseOrder">

                        @foreach ($suppliers as $dataSupplier)
                            {{-- id nanti diisi dengan id po dari databse --}}
                            <tr class="items-table-head-color" id="po1">
                                <td>{{ $dataSupplier['name'] }}</td>
                                <td>{{ $dataSupplier['address'] }}</td>
                                <td>{{ $dataSupplier['phone'] }}</td>
                                <td>{{ $dataSupplier['email'] }}</td>

                            </tr>
                        @endforeach



                    </tbody>
                </table>

            </div>
        </div>
    @endif

@endsection
