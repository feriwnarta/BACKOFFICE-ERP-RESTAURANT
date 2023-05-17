$(document).ready(function () {

    // Send Data to Create Supplier
    btnSettingInventory.addEventListener("click", function () {
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
            url: "../../purchasing/supplier/store-supplier",
            method: "POST",
            data: data,
            headers:
                "X-CSRF-TOKEN: $('meta[name='csrf-token']').attr('content')",
            success: function (data) {
                window.location.href = "../supplier";
            },
        });
    });

    validateEmail();
    validatePhoneNumber();
});

function validatePhoneNumber() {
    $(".content-information").click(function () {
        let previousIinput;

        $("#supplierPhone").on("input", function () {
            let value = $(this).val();

            mustNumber("input-supplier-phone");

            if (value.includes("+62")) {
                // Replace '+62' with '0'
                value = value.replace("+62", "");
            }

            if (value.includes("62")) {
                // Replace '+62' with '0'
                value = value.replace("62", "");
            }

            if (/[a-zA-Z]/.test(value)) {
                // Replace the letters with an empty string
                value = value.replace(/[a-zA-Z]/g, "");
            }

            if (value.length > 20) {
                $(".input-supplier-phone-error").html(
                    "Phone number should be less than 20 digits."
                );

                $(this).val(`${previousIinput}`);
            } else {
                if (value.length > 0) {
                    $(this).val(`+62${value}`);

                    previousIinput = `+62${value}`;
                } else {
                    $(this).val("");
                }
            }
        });
    });
}

function validateEmail() {
    $(".content-information").click(function () {
        let parent = $(this);
        $("#supplierEmail").on("input", function () {
            let value = $(this).val();
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(value)) {
                $(parent)
                    .find("div#supplierEmail")
                    .html(
                        "Please provide a valid email address with the correct format (e.g., example@example.com)."
                    ); // Display error message
            } else {
                $(parent).find("div#supplierEmail").html("");
            }
        });
    });
}
