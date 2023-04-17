@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('appbar')
    <x-navbar.navbar>
        <x-slot:title>
            <div class="navbar-title">Category</div>
        </x-slot:title>

        <x-button.text-only-primary id="create-category-btn" class="btn-nav" text="Create Category"
            onClick="changeContent('pos/category/create-category')">

        </x-button.text-only-primary>

    </x-navbar.navbar>
@endsection

@section('page')
    @if (!isset($categories))
        {{-- no data display --}}
        <img src="{{ asset('img/no-data.png') }}" alt="no-data" width="200px" class="no-data">
    @else
        <div id="content-loaded">
            <div class="row g-0">
                <table id="" class="table borderless table-hover">
                    <thead class="table-head-color">
                        <tr>
                            <th>Category Name</th>
                            <th>Item Stocks</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="listCategory">

                        @foreach ($categories as $dataCategory)
                            {{-- id nanti diisi dengan id po dari databse --}}
                            <tr class="items-table-head-color" id="{{ $dataCategory['id_category'] }}">
                                <td>{{ $dataCategory['category_name'] }}</td>
                                <td>{{ $dataCategory['item_stock'] }}</td>
                                <td class="d-flex flex-row justify-content-end">

                                    <x-button.text-only-outlined text="Assign to Menu" id=""
                                        class="assignToMenuBtn" onClick="" target="#assignItemModal" toogle="modal">
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
                <div class="list-of-ingredients-modal d-flex flex-column">

                </div>
            </div>


            <x-slot:footer>
                <x-button.text-only-outlined class="" id="btnCancelVariant" text="Cancel" onClick=""
                    dismiss="modal">
                </x-button.text-only-outlined>

                <x-button.text-only-primary class="" id="btnMoveSelectedItemsVariant" onClick=""
                    text="Move Selected Items"> </x-button.text-only-primary>
            </x-slot:footer>

        </x-modal.modal-input>
    @endif
@endsection

@section('footer-script')
    <script src="{{ asset('js/pos-category.js') }}"></script>
@endsection
