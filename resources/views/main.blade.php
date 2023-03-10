@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar')
@endsection




@section('page')

{{--    <x-navbar.navbar>--}}
{{--        <x-slot:title>--}}
{{--            --}}{{-- <div class="navbar-title">Menu</div> --}}
{{--            --}}{{-- <div class="navbar-subtitle">Semi-Finished Recipes</div> --}}
{{--        </x-slot:title>--}}

{{--        asd--}}
{{--    </x-navbar.navbar>--}}

{{--    <div id="progress-bar"></div>--}}

    <h1>{{ url()->current() }}</h1>

@endsection

{{--@section('loader')--}}
{{--    <div id="progress-bar"></div>--}}
{{--@endsection--}}

{{--@section('page')--}}
{{--dashbord--}}
{{--@endsection--}}
