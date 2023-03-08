@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar')
@endsection




@section('page')
    @include('components.navbar.navbar')

    <div id="progress-bar"></div>

    <h1>Dashboard</h1>
@endsection

{{--@section('loader')--}}
{{--    <div id="progress-bar"></div>--}}
{{--@endsection--}}

{{--@section('page')--}}
{{--dashbord--}}
{{--@endsection--}}
