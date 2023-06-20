<div class="{{ $class }}">

    @if ($label != '')
        <label for="form-select" class="form-label input-label">{{ $label }}</label>
    @endif

    <select class="form-select select-button" id="{{ $id }}" {{ $optional }}>

        {{ $slot }}

    </select>

</div>
