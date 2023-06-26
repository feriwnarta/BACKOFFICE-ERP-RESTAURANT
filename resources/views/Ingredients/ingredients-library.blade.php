@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar')
@endsection


@section('appbar')

    <x-navbar.navbar>
        <x-slot:title>
            <div class="navbar-title">Ingredient Library</div>
        </x-slot:title>
        <x-button.icon-text-primary id="create-ingredients-btn" class="btn-nav" icon="plus-icon" text="Create Ingredients"
            onClick="changeContent('ingredients/library/create-ingredients')"></x-button.icon-text-primary>
    </x-navbar.navbar>
@endsection

@section('page')

    @if ($datas[0] !=null)
        <div id="content-loaded">
            <div class="row g-0">
                <table id="" class="table borderless table-hover">
                    <thead class="table-head-color">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Minimum Stock</th>
                        <th scope="col">Unit</th>
                    </tr>
                    </thead>
                    <tbody id="listPurchaseOrder">
                    @foreach ($datas as $data)
                        <tr class="items-table-head-color" id="po1" style="cursor: pointer">
                            <td>{{$data['name_ingredient']}}</td>
                            <td>{{$data['category_ingredient']}}</td>
                            <td>{{$data['minimum_stock']}}</td>
                            <td>{{$data['unit_ingredient']}}</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    @else

        <img src="{{ asset('img/no-data.png') }}" alt="no-data" width="200px" class="no-data">
    @endif
@endsection
