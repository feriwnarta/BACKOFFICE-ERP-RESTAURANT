<x-navbar.navbar>
    <x-slot:title>
        <div class="navbar-title">Category Ingredients</div>
    </x-slot:title>

    <x-button.icon-text-primary id="create-category-ingredients-btn" class="btn-nav" icon="plus-icon" text="Create Category Ingredients" onClick="contentRequest('{{ url('/') }}/pos/create-menu', 'GET')"></x-button.icon-text-primary>
</x-navbar.navbar>

<div id="progress-bar"></div>
