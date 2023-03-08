{{--
    BUTTON TEXT ONLY NORMAL

    Component button ini digunakan untuk membuat button menu sidebar, memiliki beberapa atribute mulai dari

 --}}

<button class="btn {{ $class }} button-sidebar-text-only-{{$variant}} description-1-medium" type="button" id="{{ $id }}"  onclick= "changeContentInnerChild('http://127.0.0.1:8000/test3', 'GET', '{{ $id }}')">
    {{$text}}
</button>



