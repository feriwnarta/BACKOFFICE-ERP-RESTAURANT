@extends('layouts.app')


@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('appbar')
    <x-navbar.navbar>
        <x-slot:title>
            <div class="navbar-title">Category Ingredients</div>
        </x-slot:title>

        <x-button.icon-text-primary id="create-category-ingredients-btn" class="btn-nav" icon="plus-icon"
            text="Create Category Ingredients" onClick="changeContent('ingredients/category/create-category')">
        </x-button.icon-text-primary>
    </x-navbar.navbar>
@endsection

@section('page')
    @if (!isset($category_ingredients))
        {{-- no data display --}}
        <img src="{{ asset('img/no-data.png') }}" alt="no-data" width="200px" class="no-data">
    @else
        <div id="content-loaded">
            <div class="row g-0">
                <table id="" class="table borderless table-hover">
                    <thead class="table-head-color">
                        <tr>
                            <th>Ingredients Category Name</th>
                            <th>Item Stocks</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="listCategory">

                        @foreach ($category_ingredients as $dataCategoryIngredients)
                            {{-- id nanti diisi dengan id po dari databse --}}
                            <tr class="items-table-head-color" id="po1">
                                <td>{{ $dataCategoryIngredients['category_name'] }}</td>
                                <td>{{ $dataCategoryIngredients['item_stock'] }}</td>
                                <td class="d-flex flex-row justify-content-end">

                                    <x-button.text-only-outlined text="Assign to Menu" id="" class=""
                                        onClick="" target="#assignItemModal" toogle="modal">
                                    </x-button.text-only-outlined>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>

        <x-modal.modal-input id="assignItemModal" title="Assign To Item" icon="">

            <div class="body-modal">
                {{-- add ingredients body --}}
                <form class="d-flex ">
                    <input class="form-control full-search-bar clear container-fluid" type="search" placeholder="Search"
                        aria-label="Search">
                </form>

                {{-- list of ingredients --}}
                <div class="list-of-item-modal d-flex flex-column">
                    <div class="spinner"></div>
                </div>
            </div>


            <x-slot:footer>
                <x-button.text-only-outlined class="" id="btnCancelVariant" text="Cancel" onClick=""
                    dismiss="modal">
                </x-button.text-only-outlined>

                <x-button.text-only-primary class="" id="btnMoveSelectedItemsVariant" onClick="setInventory()"
                    text="Move Selected Items"> </x-button.text-only-primary>
            </x-slot:footer>

        </x-modal.modal-input>
    @endif
@endsection
