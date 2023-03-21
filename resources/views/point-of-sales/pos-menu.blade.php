@extends('layouts.app')


@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('page')
<x-navbar.navbar>
    <x-slot:title>
         <div class="navbar-title">Menu</div>
    </x-slot:title>

    <x-button.icon-text-primary id="create-menu-btn" class="btn-nav" icon="plus-icon" text="Create Menu" onClick="contentRequest('{{ url('/') }}/pos/create-menu', 'GET')">

    </x-button.icon-text-primary>

</x-navbar.navbar>


<div id="content-loaded">
    <div class="">
        <table id="tableMenu" class="table table-hover">
            <thead class="text-center">
            <tr>
                <th>Kode</th>
                <th>Name</th>
                <th>Category</th>
                <th>Pricing</th>
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
                <td>70</td>
                <td>15</td>
            </tr>
            <tr>
                <td>BHP 02</td>
                <td>Bubur hotpot polos M </td>
                <td>Bubur</td>
                <td>Rp 55.000</td>
                <td>60</td>
                <td>20</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>


@endsection