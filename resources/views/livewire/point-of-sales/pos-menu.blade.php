<x-page-layout>

   <x-slot name="sidebar">
        <x-sidebar.sidebar></x-sidebar.sidebar>
   </x-slot>

    <x-slot name="appBar">
        <x-navbar.navbar>
            <x-slot:title>
                <div class="navbar-title">Menu</div>
            </x-slot:title>

            <x-button.icon-text-primary id="create-menu-btn" class="btn-nav" icon="plus-icon" text="Create Menu" location="/pos/menu" wire:navigate>
            </x-button.icon-text-primary>

        </x-navbar.navbar>
    </x-slot>



</x-page-layout>
