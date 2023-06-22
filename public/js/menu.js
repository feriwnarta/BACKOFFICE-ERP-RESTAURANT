let variants = [];
let inventory = [];
let cogs = [];

$(window).on("load", function () {
    convertInputToRupiah("input-format-price");
    changeWidthInputModaPrice();
    changeImagePos();
    convertRupiahModal("input-format-price-modal");
    convertRupiahModal("input-format-price-setting-modal");
    resetModal();
});

// function mustNumber(tag) {

//     $(`.${tag}`).on("input", function () {

//         console.log('test');
//         let rs = $(this).val();

//         if (isNaN(rs)) {
//             rs = rs.replace(/[^\d]/g, "");
//         }

//         $(this).val(rs);
//     });
// }

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
    $(".input-modal").on("input", function () {
        if ($(this).val().length < 5) {
            let width = 32 + parseInt($(this).val().length * 6);
            $(this).css({
                width: `${width}px`,
            });
        } else if ($(this).val().length == 0) {
            $(this).css({
                width: `2rem`,
            });
        } else {
            let width = 32 + parseInt($(this).val().length * 7);
            $(this).css({
                width: `${width}px`,
            });
        }
    });
}

// fungsi yang dijalankan saat button ad variant di klik
function addVariant() {
    // mengambil value dari input variant modal
    let variantNameModal = $("#inputVariantNameModal").val();
    let priceVariantModal = $("#inputPriceVariantModal").val();
    let skuVariantModal = $("#inputSkuVariantModal").val();

    if (
        variantNameModal !== "" &&
        priceVariantModal !== "" &&
        skuVariantModal !== ""
    ) {
        // simpan ke dalam array variants
        variants.push({
            variant: variantNameModal,
            price: priceVariantModal,
            sku: skuVariantModal,
        });

        let items = `
        <table class="table borderless table-modal margin-top-12">
        <thead class="table-head-color-modal">
            <tr>
                <th>Variant Name</th>
                <th>Price</th>
                <th>SKU</th>
            </tr>
        </thead>
        <tbody id="listVariant">
        `;

        // looping isinya, kemudian tampilkan format htmlnya sesuai design
        variants.forEach((item) => {
            items += `
            <tr>
            <td>
                <div class="container-input-default">
                    <input type="name" id="inStock" class="form-control input-default"
                        placeholder="" value="${item.variant}">
                </div>
            </td>
            
            <td>
                <div class="container-input-default">
                    <input type="name" id="inStock" class="form-control input-default item-price"
                        placeholder="" value="${item.price}">
                </div>
            </td>
            <td>
                <div class="container-input-default">
                    <input type="name" id="minimumStock" class="form-control input-default"
                        placeholder="" value="${item.sku}">
                </div>
            </td>
        </tr>
            `;
        });

        items += `
        </tbody>
        </table>
        `;

        $(".variant-list").html(items);
    }

    convertRupiahModal("item-price");

    $("#addVariantModal").modal("hide");

    resetModal();
}

// fungsi yang dijalankan saat button setting inventory diklik
function settingInventory() {
    let items = "";
    inventory = [];

    variants.forEach((item) => {
        items += `
        <tr>
            <td>${item.variant}</td>
            <td>
                <input id="trackStock" class="red-input checkbox" type="checkbox"/>
            </td>
            <td>
                <div class="container-input-default">
                    <input type="name" id="inStock" class="form-control input-default input-modal instock"
                        placeholder="">
                </div>
            </td>
            <td>
                <div class="container-input-default">
                    <input type="name" id="minimumStock" class="form-control input-default input-modal minimum-stock"
                        placeholder="">
                </div>
            </td>
        </tr>
        `;
    });

    $("#listVariantOnInventory").html(items);

    mustNumber("instock");
    mustNumber("minimum-stock");

    changeWidthInputModaPrice();
}

// fungsi yang dijalankan saat button move selected items diklik
function setInventory() {
    $("#listVariantOnInventory ")
        .find("tr")
        .each(function () {
            let variant = $(this).find("td:eq(0)").text();
            let trackStock = $(this)
                .find("td:eq(1)")
                .find('input[type="checkbox"]')
                .is(":checked");
            let inStock = $(this).find("td:eq(2)").find("input").val();
            let minimumStock = $(this).find("td:eq(3)").find("input").val();

            if (
                inStock != "" &&
                inStock != undefined &&
                minimumStock != "" &&
                minimumStock != undefined
            ) {
                inventory.push({
                    variant: variant,
                    trackStock: trackStock,
                    inStock: inStock,
                    minimumStock: minimumStock,
                });
            } else {
                alert("in stock dan minimum stock tidak boleh kosong");
                inventory = [];
                return false;
            }
        });

    if (inventory.length != 0) {
        let items = `
        <table class="table borderless table-modal margin-top-12">
        <thead class="table-head-color-modal">
            <tr>
                <th>Variant</th>
                <th>Track Stock</th>
                <th>In Stock</th>
                <th>Minimum Stock</th>
            </tr>
        </thead>
        <tbody>
        `;

        inventory.forEach((item) => {
            items += `
            
            <tr>
                <td>${item.variant}</td>
                <td>
                    <input id="trackStock" class="red-input checkbox" type="checkbox" value="${
                        item.trackStock
                    }" ${item.trackStock == true ? "checked" : ""}/>
                </td>
                <td>
                    <div class="container-input-default">
                        <input type="name" id="inStock" class="form-control input-default instock"
                            placeholder="" value="${item.inStock}" >
                    </div>
                </td>
                <td>
                    <div class="container-input-default">
                        <input type="name" id="minimumStock" class="form-control input-default minimum-stock"
                            placeholder="" value="${item.minimumStock}">
                    </div>
                </td>
            </tr>
            `;
        });

        items += `
        </tbody>
        </table>
        `;

        $(".inventory-list").html(items);
        $("#manageInventoryModal").modal("hide");

        // input tidak boleh huruf
        mustNumber("instock");
        mustNumber("minimum-stock");

        // reset isi modal
        resetModal();
    }
}

// fungsi yang dijalankan saat button setting cogs diklik
// mengambil isi array variants yang sudah diisi sebelumnya kemudian membuat isinya sesuai tampilan design
function settingCogs() {
    let items = `
    `;

    variants.forEach((item) => {
        items += `
        <tr>
            <td>${item.variant}</td>
            <td>
                <input class="red-input checkbox" type="checkbox" />
            </td>
            <td>
                <div class="container-input-default">
                    <input type="name" class="form-control input-default average-cost"
                        placeholder="">
                </div>
            </td>
        </tr>;
        `;
    });

    $("#listVariantOnCogs").html(items);

    convertRupiahModal("average-cost");
}

function confirmCogs() {
    cogs = [];

    $("#listVariantOnCogs ")
        .find("tr")
        .each(function () {
            let variant = $(this).find("td:eq(0)").text();
            let trackCogs = $(this)
                .find("td:eq(1)")
                .find('input[type="checkbox"]')
                .is(":checked");
            let averageCost = $(this).find("td:eq(2)").find("input").val();

            if (averageCost != "" && averageCost != undefined) {
                cogs.push({
                    variant: variant,
                    trackCogs: trackCogs,
                    averageCost: averageCost,
                });
            } else {
                alert("average cost tidak boleh kosong");
                inventory = [];
                return false;
            }
        });

    if (cogs.length != 0) {
        let items = `
            <table class="table borderless table-modal margin-top-12">
            <thead class="table-head-color-modal">
                <tr>
                    <th>Variant</th>
                    <th>Track COGS</th>
                    <th>Average Cost</th>
                </tr>
            </thead>
            <tbody>
            `;

        cogs.forEach((item) => {
            items += `
                
                <tr>
                    <td>${item.variant}</td>
                    <td>
                        <input id="trackCogs" class="red-input checkbox" type="checkbox" value="${
                            item.trackCogs
                        }" ${item.trackCogs == true ? "checked" : ""}/>
                    </td>
                    <td>
                        <div class="container-input-default">
                            <input type="name" id="averageCost" class="form-control input-default average-cost"
                                placeholder="" value="${item.averageCost}">
                        </div>
                    </td>
                </tr>
                `;
        });

        items += `
            </tbody>
            </table>
            `;

        $(".cogs-list").html(items);
        $("#manageCogsModal").modal("hide");

        // input tidak boleh huruf dan format rupiah
        convertRupiahModal("average-cost");

        // reset isi modal
        resetModal();
    }
}

function moveSelectedItems() {
    console.log("click");
}

// mereset isi modal, saat di dismiss
function resetModal() {
    $(".modal").on("hidden.bs.modal", function () {
        $(this)
            .find("input:not([type=hidden]),textarea,select")
            .val("")
            .end()
            .find("input[type=checkbox], input[type=radio]")
            .prop("checked", "")
            .end();
    });
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
