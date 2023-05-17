$(document).ready(function () {
    var btnSave = document.getElementById("btnSave");
    var url = document.URL;
    url = url.split("/")
    var uuid = url[6];

    // Send Data to Create Supplier
    btnSave.addEventListener("click", function () {
        var supplierName = document.getElementById("supplierName").value;
        var phoneNumber = document.getElementById("supplierPhone").value;
        var supplierEmail = document.getElementById("supplierEmail").value;
        var supplierAddress = document.getElementById("supplierAddress").value;
        var supplierCity = document.getElementById("supplierCity").value;
        var supplierState = document.getElementById("supplierState").value;
        var supplierZip = document.getElementById("supplierZip").value;
        var data;
        var token = $('meta[name="csrf-token"]').attr("content");
        data = {
            _token: token,
            uuid:uuid,
            supplierName: supplierName,
            phoneNumber: phoneNumber,
            supplierEmail: supplierEmail,
            supplierAddress: supplierAddress,
            supplierCity: supplierCity,
            supplierState: supplierState,
            supplierZip: supplierZip,
        };
        $.ajaxSetup({
            headers: {},
        });
        $.ajax({
            url: "../update-supplier",
            method: "POST",
            data: data,
            headers:
                "X-CSRF-TOKEN: $('meta[name='csrf-token']').attr('content')",
            success: function (data) {
                var result = JSON.parse(data);
                alert (result);

                // window.location.href = "../supplier";
            },
        });
    });

});
