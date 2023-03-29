
<div class=" {{ $class }}">
    <label for="dropdown" class="form-label input-label">{{ $label }}</label>
    <div class="dropdown">
        <button class="btn dropdown-toggle dropdown-default" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ $placeHolder }}
        </button>
    
        <ul class="dropdown-menu">

            {{ $slot }}
          {{-- <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
        </ul>
    
      </div>
</div>
