let itemPo = [];
let dataIngredientsPo = [];
let nextAdd = false;
let dataInputIngredients = [];

$(window).on("load", function () {
    changeInputDatePlaceHolder();
    btnManageRecipeClicked();
});

// ubah placeholder date input menjadi tanggal hari ini
function changeInputDatePlaceHolder() {
    var today = new Date().toISOString().split("T")[0];
    $("#dateInput").val(today);
}

// fungsi yang dijalankan ketika button manage recipe diklik
function addItems() {
    // bersihkan item po yang sudah diceklis, dan ambil ceklis terbaru
    itemPo = [];
    if (!nextAdd) {
        $(".list-of-ingredients-modal")
            .find(".items-ingredients")
            .each(function () {
                let checked =
                    $(this).find('input[type="checkbox"]').is(":checked") ==
                    true;
                if (checked) {
                    let idItem = $(this)
                        .find('input[type="checkbox"]')
                        .attr("id");
                    itemPo.push(idItem);

                }
            });
        if (itemPo !== undefined && itemPo !== null && itemPo.length > 0) {
           insertOrder(itemPo) ;
        }

    } else {
        let inputIngredients = [];
        let isEmpty = false;

        $(".list-of-ingredients-modal .input-ingredient-detail").each(
            function () {
                let id = $(this).attr("id");
                let name = $(this).find(".item-name").html();
                let inputOrder = "";
                let inputPrice = "";
                let inputTotal = "";
                let inStock = "";
                let unit = "";

                $(this)
                    .find(".wrapper-table-po .tables-po .table-po")
                    .each(function () {
                        let order = $(this).find(".input-order").val();
                        let price = $(this).find(".input-price").val();
                        let total = $(this).find(".input-total").val();

                        let stock = $(this).find(".input-in-stock").val();

                        if (stock !== undefined) {
                            inStock = stock;
                        }

                        let inputUnit = $(this).find(".input-unit").val();

                        if (inputUnit !== undefined) {
                            unit = inputUnit;
                        }

                        if (order !== undefined) {
                            inputOrder = order;
                        }

                        if (price !== undefined) {
                            inputPrice = price;
                        }

                        if (total !== undefined) {
                            inputTotal = total;
                        }
                    });

                if (
                    inputOrder !== "" &&
                    inputOrder !== undefined &&
                    inputPrice !== "" &&
                    inputPrice !== undefined &&
                    inputPrice !== "" &&
                    inputPrice !== undefined
                ) {
                    inputIngredients.push({
                        id: id,
                        name: name,
                        order: inputOrder,
                        price: inputPrice,
                        total: inputTotal,
                        stock: inStock,
                        unit: unit,
                    });
                } else {
                    isEmpty = !isEmpty;
                    alert("Order And Price Cannot Be Empty");
                }
            }
        );

        if (inputIngredients != undefined && inputIngredients.length > 0) {
            dataInputIngredients = inputIngredients;
        }

        if (!isEmpty) {
            makeListPo(dataInputIngredients);
            grandTotal(dataInputIngredients);

            nextAdd = false;
            $("#manageRecipePoModal").modal("hide");
        }
    }



}

function makeListPo(dataIngredientsPo) {

    let html = "";
    dataIngredientsPo.forEach((itemPo) => {
        html += `
        <div class="input-ingredient-detail margin-top-32" id="${itemPo.id}">
                    <div class="subtitle-3-bold item-name text-center">${itemPo.name}</div>
                    <div class="d-flex flex-row align-items-end margin-top-32 margin-bottom-32 wrapper-table-po">
                        <div class="tables-po">
                            <div class="table-po table-po-disabled table-po-rm-right">
                                <input type="text" disabled value="${itemPo.unit}"
                                    class="input-no-border make-input caption-medium input-unit">
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center tables-po">
                            <div class="caption-medium">In Stock</div>
                            <div class="table-po table-po-disabled table-po-rm-right margin-top-16">
                                <input type="text" disabled value="${itemPo.stock}"
                                    class="input-no-border make-input caption-medium input-in-stock">
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center tables-po">
                            <div class="caption-medium">Order</div>
                            <div class="table-po table-po-rm-right margin-top-16">
                                <input type="text"
                                    class="input-no-border input-order make-input caption-medium" value="${itemPo.order}">
                            </div>
                        </div>
                        <div class="tables-po">

                            <div class="table-po table-po-rm-right d-flex align-items-center">
                                <span class="caption-medium">Rp.</span>
                                <input type="text"
                                    class="input-no-border input-price make-input caption-medium input-format-price" value="${itemPo.price}">
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center tables-po">
                            <div class="caption-medium">Total</div>
                            <div class="table-po table-po-disabled margin-top-16 d-flex align-items-center">
                                <span class="caption-medium">Rp.</span>
                                <input type="text" disabled
                                    class="input-no-border make-input caption-medium input-total" value="${itemPo.total}">
                            </div>
                        </div>
                    </div>

                </div>
        `;
        html += "</div>";

        $(".list-items-po").html(html);
        countTotalItemIngredients();
    });
}

function insertOrder(itemPo) {

    $(".list-of-ingredients-modal").html('<div class="spinner"></div>');

    $(".spinner").addClass(
        "spinner-border align-self-center color-spinner-primary margin-top-24"
    );

    // insert order
    // fungsi request details ingredients menghasilkan data item ingredients dari database
    let dataDetailItems = requestDetailsIngredient({
        itemPo: itemPo,
    });

    console.log(dataDetailItems);





    // contoh data balikan item po
    // [
    //     {
    //         id_item: "1",
    //         item_name: "ayam jantan",
    //         unit: "Ekor",
    //         in_stock: "15",
    //     },
    //     {
    //         id_item: "2",
    //         item_name: "ayam broiler",
    //         unit: "Ekor",
    //         in_stock: "30",
    //     },
    // ];

    if (dataDetailItems !== undefined && dataDetailItems !== null) {
        setTimeout(function () {
            $(".spinner").removeClass(
                "spinner-border color-spinner-primary margin-top-24"
            );

            let itemsHtml = "";

            dataDetailItems.forEach((itemPo) => {
                itemsHtml += `

                <div class="input-ingredient-detail margin-top-32" id="${itemPo.id_item}">
                    <div class="subtitle-3-bold item-name">${itemPo.item_name}</div>
                    <div class="d-flex flex-row align-items-end margin-top-32 wrapper-table-po">
                        <div class="tables-po">
                            <div class="table-po table-po-disabled table-po-rm-right">
                                <input type="text" disabled value="${itemPo.unit}"
                                    class="input-no-border table-detail-item-ingredients caption-medium input-unit">
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center tables-po">
                            <div class="caption-medium">In Stock</div>
                            <div class="table-po table-po-disabled table-po-rm-right margin-top-16">
                                <input type="text" disabled value="${itemPo.in_stock}"
                                    class="input-no-border table-detail-item-ingredients caption-medium input-in-stock">
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center tables-po">
                            <div class="caption-medium">Order</div>
                            <div class="table-po table-po-rm-right margin-top-16">
                                <input type="text"
                                    class="input-no-border input-order table-detail-item-ingredients caption-medium">
                            </div>
                        </div>
                        <div class="tables-po">

                            <div class="table-po table-po-rm-right d-flex align-items-center">
                                <span class="caption-medium">Rp.</span>
                                <input type="text"
                                    class="input-no-border input-price table-detail-item-ingredients caption-medium input-format-price">
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center tables-po">
                            <div class="caption-medium">Total</div>
                            <div class="table-po table-po-disabled margin-top-16 d-flex align-items-center">
                                <span class="caption-medium">Rp.</span>
                                <input type="text" disabled
                                    class="input-no-border table-detail-item-ingredients caption-medium input-total">
                            </div>
                        </div>
                    </div>

                </div>
                `;
            });

            itemsHtml += "</div>";

            $(".list-of-ingredients-modal").html(itemsHtml);

            countTotalItemIngredients();
        }, 1000);
    }
}



function getAllIngredients() {

    $(".list-of-ingredients-modal").html('<div class="spinner"></div>');

    $(".spinner").addClass(
        "spinner-border align-self-center color-spinner-primary margin-top-24"
    );

    // request ajax untuk dapatkan item ingredients
    $.ajax({
        url:"../../ingredients/ingredients",
        method : "get",
        success:function (response){

            $(response).each(function (index,element){
                let result = [
                    {
                        id: element.uuidIngredient,
                        item_name: element.name_ingredient,
                        item_image: "/img/chicken.png",
                        in_stock: "10",
                    },
                ];
            dataIngredientsPo = result;
                setTimeout(function () {
                    // hapus efek loading jika sudah selesai
                    $(".spinner").removeClass(
                        "spinner-border color-spinner-primary margin-top-24"
                    );

                    let itemsHtml = ``;

                    result.forEach((item) => {
                        itemsHtml += `

        <div class="items-ingredients">
            <div class="row d-flex align-items-center">
                    <div class="col-sm-11">
                        <div class="item-ingredients d-flex flex-row align-items-center">
                        <div>
                            <img class="items-ingredient-img" src="${item.item_image}" alt="">
                        </div>
                        <div class="body-text-regular name-item-ingredient">${item.item_name}

                        </div>

                        </div>
                    </div>
                    <div class="col-sm-1">
                        <input  id="${item.id}" class="red-input checkbox" type="checkbox"/>
                    </div>

                </div>
            <div id="divider" class="margin-top-20"></div>
        </div>
        `;
                    });
                    $(".list-of-ingredients-modal").html(itemsHtml);
                }, 1500);
            });
        }
    })
    // save data result all ingredients dari databse ke array dataIngredientsPo


}

// fungsi untuk request dapatkan semua ingredients dari databse
function requestDataJson(url, method, data) {
    // format data berupa json
    // {
    //     '1','2','3'
    // }

    $.ajax({
        url: url,
        method: method,
        data: data,
        type: "JSON",
        processData: false,
        contentType: false,
        cache: false,
        async: false,

        success: function (response) {
            // return json
            // {
            //     {
            //         'id' : '1',
            //         'item_name' : 'ayam',
            //         'item_image' : 'img/ayam1.png'
            //     },
            //     {
            //         '.....'
            //     }
            // }
        },
        complete: function () {},
        error: function (statusCode, errorThrown) {},
    });
}

function
requestDetailsIngredient({ itemPo }) {
    // dummy data isi dari listIdIngredients

    // id dari checkbox item yang di check
    // {
    //     '1','2','3'
    // }
    // let url = 'po/details'

    // item po dikirim ke request data json untuk mendapatkan data instock per item dari database

    // let json = requestDataJson({url: url, method: 'GET', data : itemPo});


    // dummy data balikan dari requestDataJson

    let data=[];
    let token = $('meta[name="csrf-token"]').attr("content");
    $(itemPo).each(function (index,element){
        var dataApi = {
            _token : token,
            idIngredient : element
        };
        $.ajax({
            url:"../../ingredients/ingredient",
            method:"POST",
            data : dataApi,
            success:function (response){
               var result ={
                           id_item: response.idIngredient,
                           item_name: response.nameIngredient,
                           unit: response.unitIngredient,
                           in_stock: "15",
               };
               data.push(result);
            },
        })
    });
    return data;
}

function countTotalItemIngredients() {
    let order = "";
    let price = "";

    $(".input-ingredient-detail").click(function () {
        let parent = this;
        let id = $(this).attr("id");

        if (
            dataInputIngredients !== undefined &&
            dataInputIngredients.length > 0
        ) {
            price = $(this)
                .find(".wrapper-table-po")
                .find(".input-price")
                .val();
        }

        $(this)
            .find(".input-order")
            .on("input", function () {
                order = $(this).val();

                if (isNaN(order)) {
                    order = order.replace(/[^\d]/g, "");
                }

                order = order;

                $(this).val(order);

                if (order !== "" && price != "") {
                    order = order;
                    price = price.replace(/\./g, "").replace(",", ".");

                    let total = order * price;

                    total = convertCurrencyRupiah(total.toString());

                    $(parent).find(".input-total").val(total);
                }

                // update data input ingredients saat diupdate
                if (
                    dataInputIngredients !== undefined &&
                    dataInputIngredients.length > 0
                ) {
                    let data = dataInputIngredients.map(function (item) {
                        if (item.id == id) {
                            item.order = order;
                        }
                        return item;
                    });

                    dataInputIngredients = data;

                    grandTotal(dataInputIngredients);
                }
            });
    });

    $(".input-ingredient-detail").click(function () {
        let parent = this;
        let id = $(this).attr("id");

        if (
            dataInputIngredients !== undefined &&
            dataInputIngredients.length > 0
        ) {
            order = $(this)
                .find(".wrapper-table-po")
                .find(".input-order")
                .val();
        }

        $(this)
            .find(".input-price")
            .on("input", function () {
                price = $(this).val();
                if (isNaN(price)) {
                    price = price.replace(/[^\d]/g, "");
                }

                price = price;

                let format = convertCurrencyRupiah(price.toString());

                $(this).val(format);

                if (order !== "" && price != "") {
                    order = order;
                    price = price.replace(/\./g, "").replace(",", ".");

                    let total = order * price;

                    total = convertCurrencyRupiah(total.toString());

                    $(parent).find(".input-total").val(total);
                }

                // update data input ingredients saat diupdate
                if (
                    dataInputIngredients !== undefined &&
                    dataInputIngredients.length > 0
                ) {
                    let data = dataInputIngredients.map(function (item) {
                        if (item.id == id) {
                            item.price = price;
                        }
                        return item;
                    });
                    dataInputIngredients = data;
                    grandTotal(dataInputIngredients);
                }
            });
    });
    nextAdd = !nextAdd;
    btnManageRecipeClicked();
}

function grandTotal(dataInputIngredients) {
    let grandTotal = 0;
    dataInputIngredients.map((item) => {
        let order = item.order;
        let price = parseFloat(item.price.replace(/\./g, "").replace(",", "."));
        let total = order * price;
        grandTotal += total;
    });
    $(".total-price").html(grandTotal);
}

function btnManageRecipeClicked() {
    $("#btnManageRecipe").click(function () {
        getAllIngredients();
        $("#btnAddIngredients").click(function () {
            addItems();
            // console.log("testing");
        });
    });
}
function createPo() {
    let tanggal = $("#dateInput").val();
    let outlet = $("#outlet").val();
    let supplier = $("#supplier").val();
    let note = $("#note").val();
    let total_price =parseInt( $(".total-price").html());
    let token = $('meta[name="csrf-token"]').attr("content");



    // send data json

    let data=
        {
            _token:token,
            tanggal: tanggal,
            outlet: outlet,
            supplier: supplier,
            note: note,
            item_po: dataInputIngredients,
            total : total_price
        };

    $.ajax({
        url:"../../purchasing/purchase-order/store-po",
        method: "POST",
        headers:
            "X-CSRF-TOKEN: $('meta[name='csrf-token']').attr('content')",
        data:data,
        success:function (response){
            // console.log(response);
            if (response == true){
                alert("Add Purchase Order is Successful!");
                window.location.href="../purchase-order";
            }else{
                alert("Add Purchase Order is Failed!");
                window.location.href="../purchase-order";
            }
        }
    });

    // send json to api
}
