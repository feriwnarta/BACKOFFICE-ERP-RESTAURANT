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


    @if (!isset($data))
        {{-- no data display --}}
        <img src="{{ asset('img/no-data.png') }}" alt="no-data" width="200px" class="no-data">
    @else
        <div id="content-loaded">
            <div class="row g-0">
                <table id="" class="table borderless table-hover">
                    <thead class="table-head-color">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody id="listPurchaseOrder">
{{--                    @dd($suppliers)--}}
                        @foreach ($data as $dataSupplier)
{{--                             id nanti diisi dengan id po dari databse--}}
                            <tr class="items-table-head-color" id="po1" style="cursor: pointer">
                                <td scope="row" onclick="getUuid(this)" data-uuid="{{$dataSupplier['uuid']}}">{{ $dataSupplier['name'] }}</td>
                                <td scope="row" onclick="getUuid(this)" data-uuid="{{$dataSupplier['uuid']}}">{{ $dataSupplier['address'] }}</td>
                                <td scope="row" onclick="getUuid(this)" data-uuid="{{$dataSupplier['uuid']}}">{{ $dataSupplier['phone'] }}</td>
                                <td scope="row" onclick="getUuid(this)" data-uuid="{{$dataSupplier['uuid']}}">{{ $dataSupplier['email'] }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection

@section('footer-script')
    <script src="{{asset("js/supplier.js")}}"></script>
@endsection
