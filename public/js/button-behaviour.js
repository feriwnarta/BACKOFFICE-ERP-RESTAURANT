
function changeContent(url, method, tag) {

    // hapus kelas aktif menu terlebih dahulu
    $('.button-menu .button-icon-text').each(function () {
        $(this).removeClass('active');
    });


    // hapus collapse menu yang terbuka terlebih dahulu
    $('.button-menu .button-icon-text').each(function () {
        $(this).click(function () {
            var targetSidebar = $(this).data('bs-target');

            $('.button-menu div').each(function(){
                if ($(this).attr('id') !== targetSidebar) {
                    $(this).removeClass('show') // Hapus class 'show' dari sidebar yang tidak dituju
                }
            });
        });
    });

    tag = '.' + tag;

    // menambahkan kelas aktif di element button icon text
    $(tag).addClass('active');



    // ajax setup laravel csrf token sebelum mengirim request
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax(
        {
            url: url,
            method: method,
            processData: false,
            contentType:false,
            cache: false,
            async: false,
            beforeSend: function() {
                $("#progress-bar").css('display', 'block');
                $("#progress-bar").css('width', '20%');
            },
            success: function (response) {
                $('#page').html(response);
            },
            complete: function(){
                $("#progress-bar").width('100%');
                $('#progress-bar').fadeOut('0%');
            },
        }
    ).done(function () {
    });


}

