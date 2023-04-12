<div class=" {{ $class }}">

    <label for="dropdown" class="form-label input-label">{{ $label }}</label>
    <div class="dropdown" id="{{ $id }}">
        <button class="btn dropdown-toggle dropdown-default" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ $placeHolder }}
        </button>

        <ul class="dropdown-menu">

            {{ $slot }}
        </ul>

    </div>
</div>
