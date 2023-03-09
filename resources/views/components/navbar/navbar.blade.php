<div class="navbar-app">
    <div class="content-navbar d-flex flex-row justify-content-between">

        <div id="nav-leading" class="d-flex flex-row align-items-center">
            <div class="navbar-title">Menu</div>
            <div class="navbar-subtitle">Semi-Finished Recipes</div>
        </div>

        <div id="nav-action-button" class="d-flex flex-row align-items-center">
            <form class="d-flex">
                <input class="form-control search-bar clear" type="search" placeholder="Search" aria-label="Search">
            </form>

            {{-- Button Navbar --}}
            <x-button.dropdown-no-icon id="all-status" class="btn-nav" text="All Status"></x-button.dropdown-no-icon>
            <x-button.text-only-primary id="create-recipes-btn" class="btn-nav" text="Create Recipes"></x-button.text-only-primary>
            <x-button.icon-text-outlined id="pilih-tanggal-btn" class="btn-nav" text="Pilih Tanggal" icon="calendar-icon"></x-button.icon-text-outlined>
        </div>


    </div>
    <div id="divider"></div>
</div>

