<x-navbar.navbar>
    <x-slot:title>
        <div class="navbar-title">Ingredient Library</div>
    </x-slot:title>

    <x-button.icon-text-primary id="create-ingredients-btn" class="btn-nav" icon="plus-icon" text="Create Ingredients" onClick="contentRequest('{{ url('/') }}/pos/create-menu', 'GET')"></x-button.icon-text-primary>
</x-navbar.navbar>

<div id="progress-bar"></div>

