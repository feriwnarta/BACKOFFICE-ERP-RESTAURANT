function changeContent(url) {
    window.location.pathname = url;
}

function changeContentInnerChild(url, method) {
    window.location.pathname = url;
}

function contentRequestNav(url, method, tag, idOnInit, idBeforeInit) {
    // switchNavTitle(idOnInit, idBeforeInit);

    window.location.pathname = url;

    // ajax setup laravel csrf token sebelum mengirim request
    // $.ajaxSetup({
    //     headers: {
    //         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //     },
    // });

    // $.ajax({
    //     url: url,
    //     method: method,
    //     processData: false,
    //     contentType: false,
    //     cache: false,
    //     async: false,
    //     beforeSend: function () {
    //         $("#progress-bar").width("20%");
    //         // $("#progress-bar").css("display", "block");
    //         $("#progress-bar").css("opacity", "100%");
    //     },
    //     success: function (response) {
    //         $("#section").html(response);
    //     },
    //     complete: function () {
    //         $("#progress-bar").width("100%");
    //         $("#progress-bar").animate({ opacity: 0 }, "slow");
    //     },
    //     error: function (statusCode, errorThrown) {
    //         // if (statusCode.status == 0) {
    //         //     alert("you're offline");
    //         // }
    //     },
    // }).done(function () {
    //     setTimeout(function() {
    //         $("#progress-bar").width('0%');
    //       }, 500);

    //     changeWidthTitle();
    //     // window.history.pushState(null, null, url); // -> untuk menyimpan url jquery ke history browser
    // });
}

function contentRequest(url, method) {
    // ajax setup laravel csrf token sebelum mengirim request
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: url,
        method: method,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        beforeSend: function () {
            $("#progress-bar").css("display", "block");
            $("#progress-bar").css("width", "20%");
        },
        success: function (response) {
            $("#page").html(response);
        },
        complete: function () {
            $("#progress-bar").width("100%");
            $("#progress-bar").animate({ opacity: 0 }, "slow");
        },
        error: function (statusCode, errorThrown) {
            // if (statusCode.status == 0) {
            //     alert("you're offline");
            // }
        },
    }).done(function () {
        changeWidthTitle();
        dataTableInit();
        // window.history.pushState(null, null, url); // -> untuk menyimpan url jquery ke history browser
    });
}
