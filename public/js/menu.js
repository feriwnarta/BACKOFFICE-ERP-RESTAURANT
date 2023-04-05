$(window).on("load", function () {
    convertInputToRupiah("input-format-price");
    changeWidthInputModaPrice();
    changeImagePos();
    convertRupiahModal("input-format-price-modal");
    test();
});

function test() {
    $("#test").on("input", function () {
        console.log("clicked");
    });
}

function convertRupiahModal(tag) {
    $(`.${tag}`).on("input", function () {
        let rs = $(`.${tag}`).val();

        rs = rs.replace(/\./g, "");

        if (!isNaN(rs)) {
            let format = convertCurrencyRupiah(rs);

            $(`.${tag}`).val(format);
        } else {
            $(`.${tag}`).val("");
        }
    });
}

// fungsi untuk mengubah isi tag input menjadi format rupiah
function convertInputToRupiah(tag) {
    $(`.${tag}`).on("input", function () {
        let rs = $(`.${tag}`).val();

        rs = rs.replace(/\./g, "");

        if (!isNaN(rs)) {
            $(`.${tag}-error`).html("");

            $(`.${tag}`).css({
                "background-image": "",
            });

            let format = convertCurrencyRupiah(rs);

            $(`.${tag}`).val(format);
        } else {
            $(`.${tag}`).css({
                "background-image": "url(/img/icons/exclamation-circle.png)",
                "background-repeat": "no-repeat",
                "background-size": "1rem",
                "vertical-align": "middle",
                "background-position": "right center",
                "padding-right": "1rem",
            });

            $(`.${tag}`).val("");

            $(`.${tag}-error`).html("Input harga harus menggunakan angka");
        }
    });
}

// fungsi untuk mengubah gambar image pos
function changeImagePos() {
    $(".image-picker").click(function () {
        $(
            "<input type='file' accept='image/jpg, image/png, image/jpeg' style='display:none;'>"
        )
            .change(function () {
                let file = this.files[0];

                let reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {
                    var imageDataUrl = reader.result;

                    $("#imagePos").attr("src", imageDataUrl);
                };
            })
            .click();
    });
}

// fungsi untuk mengubah lebar input price
function changeWidthInputModaPrice() {
    $("input .input-modal").click(function () {
        console.log("asd");
    });

    $(".input-modal").on("input", function () {
        if ($(this).val().length > 1) {
            let width = 32 + parseInt($(this).val().length * 8);
            $(this).css({
                width: `${width}px`,
            });
        } else if ($(this).val().length == 0) {
            $(this).css({
                width: `2rem`,
            });
        }
    });
}

let variants = [];

function addVariant() {
    let variantNameModal = $("#inputVariantNameModal").val();
    let priceVariantModal = $("#inputPriceVariantModal").val();
    let skuVariantModal = $("#inputSkuVariantModal").val();

    variants.push({
        variant: variantNameModal,
        price: priceVariantModal,
        sku: skuVariantModal,
    });

    let items = "";

    variants.forEach((item) => {
        items += `<div class='d-flex flex-row justify-content-between'>`;
        items += `<div>${item.variant}</div>`;
        items += `<div>${item.price}</div>`;
        items += `<div>${item.sku}</div>`;
        items += `</div>`;
    });

    $(".variant-list").html(items);

    $("#addVariantModal").modal("hide");
}

function settingInventory() {
    let items = "";
    variants.forEach((item) => {
        items += `
        <tr>
            <td>${item.variant}</td>
            <td>
                <input class="red-input checkbox" type="checkbox" />
            </td>
            <td>
                <div class="container-input-default">
                    <input type="name" class="form-control input-default input-modal"
                        placeholder="">
                </div>
            </td>
            <td>
                <div class="container-input-default">
                    <input type="name" class="form-control input-default input-modal"
                        placeholder="">
                </div>
            </td>
        </tr>;
        `;
    });

    $("#listVariant").html(items);

    changeWidthInputModaPrice();
}

// id product name
// id category
// description
// pricing dan sku
// inventory
// manage cogs
function saveMenu() {
    let productName = $("#productName").val();
    let category = $(".select-button").val();
    let description = $("#description").val();
    let price = $("#idInputPriceMenu").val();
    let codeMenu = $("#idInputCodeMenu").val();
    let variantNameModal = $("#inputVariantNameModal").val();
    let priceVariantModal = $("#inputPriceVariantModal").val();
    let skuVariantModal = $("#inputSkuVariantModal").val();
}
