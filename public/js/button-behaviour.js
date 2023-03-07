
function changeContent(url, method) {
    let content;

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
            beforeSend: function(){
                $("#progress-bar").width("10%");
            },
            success: function (response) {

                $('#page').html('asdasd');
            },
            complete: function(){
                $("#progress-bar").width('100%')
                $("#progress-bar").fadeOut(500);
            },
        }
    );




}
