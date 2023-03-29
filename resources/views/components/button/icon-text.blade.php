{{--
    BUTTON ICON TEXT NORMAL

    Component button ini digunakan untuk membuat button menu sidebar, memiliki beberapa atribute mulai dari

    class = untuk memberikan nama kelas pada element html
    toogle = untuk menentukan apakah button ini bersifat collapse, value (collapse atau none)
    idTarget = untuk menentukan element collapse mana yang akan terbuka
    link = digunakan untuk menjalakan fungsi change content, dimana fungsi ini akan mengubah id page web dengan hasil dari request
    method = digunakan untuk menentukan method apa yang akan digunakan untuk melakukan ajax request

 --}}

<button class="btn {{ $class }} button-icon-text description-1-medium" type="button" data-bs-toggle="{{$toggle}}" data-bs-target="#{{$idTarget}}" aria-expanded="false" aria-controls="{{$idTarget}}"  onclick= " {{ ($link == '') ? '' : "changeContent('$link', '$method', '$class')"  }}">
    <i class="{{$icon}}"></i>
    {{$text}}
</button>

<div class="collapse" id="{{$idTarget}}">
    {{$slot}}
</div>


