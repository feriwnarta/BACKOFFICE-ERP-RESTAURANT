let itemPo = [];

let dataIngredientsPo = [];

$(window).on("load", function () {
    changeInputDatePlaceHolder();
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

    $(".list-of-ingredients-modal")
        .find(".items-ingredients")
        .each(function () {
            let checked =
                $(this).find('input[type="checkbox"]').is(":checked") == true;

            if (checked) {
                let idItem = $(this).find('input[type="checkbox"]').attr("id");
                itemPo.push(idItem);
            }
        });

    if (itemPo !== undefined && itemPo !== null && itemPo.length > 0) {
        insertOrder(itemPo);
    }
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

    if (dataDetailItems !== undefined && dataDetailItems !== null) {
        setTimeout(function () {
            $(".spinner").removeClass(
                "spinner-border color-spinner-primary margin-top-24"
            );

            let itemsHtml = "";

            dataDetailItems.forEach((itemPo) => {
                itemsHtml += `<div>${itemPo.item_name}</div>`;
            });

            $(".list-of-ingredients-modal").html(itemsHtml);
        }, 1000);
    }
}

function getAllIngredients() {
    $(".list-of-ingredients-modal").html('<div class="spinner"></div>');

    $(".spinner").addClass(
        "spinner-border align-self-center color-spinner-primary margin-top-24"
    );

    // request ajax untuk dapatkan item ingredients
    // requestAllIngredients();
    // dummy data
    let result = [
        {
            id: "1",
            item_name: "ayam",
            item_image: "/img/chicken.png",
            in_stock: "10",
        },
        {
            id: "2",
            item_name: "ayam 2",
            item_image: "/img/chicken.png",
            in_stock: "20",
        },
    ];

    // save data result all ingredients dari databse ke array dataIngredientsPo
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

function requestDetailsIngredient({ itemPo }) {
    // dummy data isi dari listIdIngredients

    // id dari checkbox item yang di check
    // {
    //     '1','2','3'
    // }
    // let url = 'po/details'

    // item po dikirim ke request data json untuk mendapatkan data instock per item dari database
    // let json = requestDataJson({url: url, method: 'GET', data : itemPo});
    // dummy data balikan dari requestDataJson

    return [
        {
            id_item: "1",
            id_item: "1",
            item_name: "ayam jantan",
            unit: "Ekor",
            in_stock: "15",
        },
        {
            id_item: "2",
            id_item: "2",
            item_name: "ayam broiler",
            unit: "Ekor",
            in_stock: "30",
        },
    ];
}
