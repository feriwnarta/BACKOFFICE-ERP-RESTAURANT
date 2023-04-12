<button class="btn btn-dropdown-no-icon dropdown-toggle {{ $class }}" type="button" id=" {{ $id }}"
    data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
    {{ $text }}

</button>

<ul class="dropdown-menu" aria-labelledby="{{ $id }}">

    {{ $slot }}

</ul>
