@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('page')
    <x-navbar.navbar>
        <x-slot:title>
            <div class="navbar-title">Category</div>
        </x-slot:title>

        <x-button.text-only-primary id="create-category-btn" class="btn-nav" text="Create Category"
            onClick="changeContent('pos/category/create-category')">

        </x-button.text-only-primary>

    </x-navbar.navbar>

    <table id="" class="table borderless">
        <thead class="table-head-color-modal">
            <tr>
                <th>Variant</th>
                <th>Track Stock</th>
                <th>In Stock</th>
                <th>Minimum Stock</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>BHP 01</td>
                <td>Bubur hotpot polos M </td>
                <td>Bubur</td>
                <td>Rp 50.000</td>
            </tr>
        </tbody>
    </table>

    <div id="progress-bar"></div>
@endsection
