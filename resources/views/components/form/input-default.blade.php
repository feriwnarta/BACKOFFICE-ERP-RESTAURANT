<div class="container-input-default">
    @if (!empty($label))
        <label for="{{ $id }}" class="form-label input-label">{{ $label }}</label>
    @endif

    <input type="name" name="{{ $name }}" class="form-control input-default {{ $class }}"
        id="{{ $id }}" placeholder="{{ $placeHolder }}" value="{{ $val }}" {{ $optional }}>

    {{-- <div class="invalid-feedback">
        Invalid Feedback: Nama harus diisi.
    </div> --}}

    <div id="{{ $id }}" class="{{ $class }}-error input-error">
    </div>

</div>
