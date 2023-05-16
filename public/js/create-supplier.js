$(document).ready(function() {
    // Send Data to Create Supplier
    btnSettingInventory.addEventListener("click",function (){
    var supplierName = document.getElementById("supplierName").value;
    var phoneNumber = document.getElementById("supplierPhone").value;
    var supplierEmail = document.getElementById("supplierEmail").value;
    var supplierAddress = document.getElementById("supplierAddress").value;
    var supplierCity = document.getElementById("supplierCity").value;
    var supplierState = document.getElementById("supplierState").value;
    var supplierZip = document.getElementById("supplierZip").value;
    var data;
    var token = $('meta[name="csrf-token"]').attr('content');
    data = {
        _token :token,
        supplierName: supplierName,
        phoneNumber: phoneNumber,
        supplierEmail : supplierEmail,
        supplierAddress : supplierAddress,
        supplierCity : supplierCity,
        supplierState : supplierState,
        supplierZip : supplierZip,
    }
    $.ajaxSetup({
            headers: {

            },
        });
    $.ajax({
            url: "../../purchasing/supplier/store-supplier",
            method: 'POST',
            data:data,
            headers: ("X-CSRF-TOKEN: $('meta[name='csrf-token']').attr('content')"),
            success: function(data) {
                window.location.href="../supplier";
            }
        });
    });

});





