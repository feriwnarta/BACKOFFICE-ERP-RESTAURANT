<x-navbar.navbar>
    <x-slot:title>
        <div class="navbar-title">Menu</div>
         <div class="navbar-subtitle">Semi-Finished Recipes</div>
    </x-slot:title>


    <x-button.icon-text-primary id="create-recipes-btn" class="btn-nav" icon="plus-icon" text="Create Recipes" onClick="contentRequest('{{ url('/') }}/pos/create-menu', 'GET')"></x-button.icon-text-primary>

</x-navbar.navbar>

<div id="progress-bar"></div>

