<div>
    <h1>{{ $count }}</h1>

    <button wire:click="increment">+</button>

    <button wire:click="decrement">-</button>

    <x-button.text-only-outlined text="Assign to Menu" id=""
                                 class="assignToMenuBtn" onClick="" target="#assignItemModal" toogle="modal" wire:click="increment">
    </x-button.text-only-outlined>

</div>
