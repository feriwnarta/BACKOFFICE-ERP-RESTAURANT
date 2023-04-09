<div class="{{ $class }}" id="{{ $id }}">

    @if($label != '') 
    <label for="form-select" class="form-label input-label">{{ $label }}</label>
    @endif

    <select class="form-select select-button"">

        {{ $slot }}

    </select>

</div>


