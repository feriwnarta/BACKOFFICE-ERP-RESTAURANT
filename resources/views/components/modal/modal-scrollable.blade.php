<!-- Modal -->


{{-- Modal input digunakan untuk menerima inputan dari add variant, manage inventory, manage cogs dll --}}
{{-- $id = memberikan id ke modal --}}
{{-- $title = memberikan nama title ke modal --}}
{{-- $icon = leading icon title --}}

<div class="modal-input modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header d-flex flex-row justify-content-center bg-primary-main">
                <i class="{{ $icon }}"></i>
                <h1 class="modal-title modal-input-title" id="exampleModalLabel">{{ $title }}</h1>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">

                {{ $footer }}

            </div>
        </div>
    </div>
</div>
