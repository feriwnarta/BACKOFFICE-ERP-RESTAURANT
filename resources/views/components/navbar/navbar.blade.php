<div class="navbar-app">
    <div class="content-navbar d-flex flex-row justify-content-between">

        <div id="nav-leading" class="d-flex flex-row align-items-center">

            {{-- Isi dari Navbar title dan subtitle --}}
            {{-- Contoh --}}
            {{-- <div class="navbar-title">Menu</div> --}}
            {{-- <div class="navbar-subtitle">Semi-Finished Recipes</div> --}}

            {{ $title }}

        </div>

        <div id="nav-action-button" class="d-flex flex-row align-items-center">

            <form class="d-flex">
                <input class="form-control search-bar clear" type="search" placeholder="Search" aria-label="Search">
            </form>

            {{-- Button Navbar --}}
            {{--  Contoh --}}

            {{--            <x-button.dropdown-no-icon id="all-status-btn" class="btn-nav" text="All Status">--}}
            {{--                        <li><a class="dropdown-item" href="#">Action</a></li>--}}
            {{--                        <li><a class="dropdown-item" href="#">Another action</a></li>--}}
            {{--                        <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
            {{--            </x-button.dropdown-no-icon>--}}
            {{--            <x-button.text-only-secondary id=export-btn class="btn-nav" text="Export"></x-button.text-only-secondary>--}}
            {{--            <x-button.text-only-primary id="create-recipes-btn" class="btn-nav" text="Create Recipes"></x-button.text-only-primary>--}}
            {{--            <x-button.icon-text-outlined id="pilih-tanggal-btn" class="btn-nav" text="Pilih Tanggal" icon="calendar-icon"></x-button.icon-text-outlined>--}}

            {{ $slot }}

        </div>

    </div>
    <div id="title-divider"></div>
    <div id="divider"></div>
</div>

