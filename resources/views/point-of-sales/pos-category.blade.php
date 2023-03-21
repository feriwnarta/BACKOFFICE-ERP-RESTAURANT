<x-navbar.navbar>
    <x-slot:title>
        <div class="navbar-title">Category</div>
    </x-slot:title>

    <x-button.text-only-primary id="create-category-btn" class="btn-nav" text="Create Category" onClick="contentRequest('{{ url('/') }}/pos/create-category', 'GET')">

    </x-button.text-only-primary>

</x-navbar.navbar>

<div id="progress-bar"></div>

