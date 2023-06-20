$(window).on("load", function () {
    mustNumber("input-quantity");
    saveIngredient();
    Toast.success(
        $("body"),
        "Data berhasil disimpan",
        "Data Anda berhasil disimpan.Terima kasih!"
    );
});

function saveIngredient() {
    $("#formSaveIngredient").submit(function (event) {
        event.preventDefault();

        /**
         *  proses simpan ingredients
         */
        let itemName = $("#productName").val();
        let category = $("#categorySelect").val();
        let quantity = $("#idInputPriceQuantity").val();
        let unit = $("#unit").val();

        /**
         * data inventory
         * FORMAT DATA
         * [
         *  {
         *      trackStock : on,
         *      inStock : 1,
         *      minimumStock : 2,
         *  }
         * ]
         */

        let inventory = [];

        $(".inventory-list")
            .find("td")
            .each(function (index, element) {
                if (index == 1) {
                    inventory.push({ trackStock: $(this).find("input").val() });
                } else if (index == 2) {
                    inventory[0].inStock = $(this).find("input").val();
                } else if (index == 3) {
                    inventory[0].minimumStock = $(this).find("input").val();
                }
            });

        // console.table(inventory);

        /**
         * data cogs
         *  {
         *      trackCogs : on,
         *      averageCost : 112.000,
         *  }
         */

        let cogs = [];
        $(".cogs-list")
            .find("td")
            .each(function (index) {
                if (index == 1) {
                    cogs.push({
                        trackStock: $(this).find("input").val(),
                    });
                } else if (index == 2) {
                    cogs[0].averageCost = $(this).find("input").val();
                }
            });

        if (
            !(
                itemName !== null &&
                category !== "null" &&
                quantity !== null &&
                unit !== null &&
                inventory.length > 0 &&
                cogs.length > 0
            )
        ) {
            Toast.success($("body"));

            return;
        }

        //* data yang perlu dikirim ke db
        let formatData = {
            itemName: itemName,
            category: category,
            quantity: quantity,
            unit: unit,
            inventory: inventory[0],
            cogs: cogs[0],
        };

        console.log(formatData);
    });
}
/**
 * button move selected item modal diklik
 */
function setInventory() {
    let inStock = $("#inStock").val();
    let minimumStock = $("#minimumStock").val();
    let trackStock = $("#trackStock").prop("checked");
    let productName = $("td.product-name").html();

    let inStockWidth = $("#inStock").width();
    let minStockWidth = $("#minimumStock").width();

    $(".inventory-list").empty();

    $(".inventory-list").html(
        `
        <table class="table borderless table-modal mt-2">
            <thead class="table-head-color-modal">
                        <tr>
                            <th>Variant</th>
                            <th>Track Stock</th>
                            <th>In Stock</th>
                            <th>Minimum Stock</th>
                        </tr>
            </thead>

            <tbody id="listVariantOnInventorys">
                <tr>
                ${
                    productName == "Masukan item name terlebih dahulu"
                        ? `<td class="product-name-replace text-danger">${productName}</td>`
                        : `<td class="product-name-replace">${productName}</td>`
                }
                    
                    <td>
                        <input id="trackStockReplace" class="red-input checkbox" type="checkbox" ${
                            trackStock ? "checked" : ""
                        }/>
                    </td>
                    <td>
                        <div class="container-input-default">
                            <input type="name" id="inStockReplace" class="form-control input-default input-modal instock"
                                placeholder="" value="${inStock}">
                        </div>
                    </td>
                    <td>
                        <div class="container-input-default">
                            <input type="name" id="minimumStockReplace" class="form-control input-default input-modal minimum-stock"
                                placeholder="" value="${minimumStock}">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        `
    );

    // ubah lebar inputan
    $("#inStockReplace").css("width", `${inStockWidth * 2.5}px`);
    $("#minimumStockReplace").css("width", `${minStockWidth * 2.5}px`);

    // tutup modal
    $(".modal").modal("hide");

    // reset modal
    resetModal();

    changeWidthInputModaPrice();
}

function confirmCogs() {
    let productName = $(".product-name").html();
    let trackStock = $("#trackStockSetCogs").prop("checked");
    let averageCost = $(".average-cost").val();

    $(".cogs-list").empty();

    let html = `
    <table id="" class="table borderless table-modal mt-2">
        <thead class="table-head-color-modal">
                <tr>
                    <th>Variant</th>
                    <th>Track COGS</th>
                    <th>Average Cost</th> 
                </tr>
        </thead>

        ${
            productName == "Masukan item name terlebih dahulu"
                ? `<td class="product-name-replace text-danger">${productName}</td>`
                : `<td class="product-name-replace">${productName}</td>`
        }
        <td>
            <input id="trackStockReplaces" class="red-input checkbox" type="checkbox" ${
                trackStock ? "checked" : ""
            }>
        </td>
        <td>
            <div class="container-input-default">
                <input type="name" class="form-control input-default average-cost-replace" placeholder="" value="${averageCost}">
            </div>
        </td>
        </tr></tbody>
    </table>
    `;

    $(".cogs-list").html(html);

    // tutup modal
    $(".modal").modal("hide");

    // reset modal
    resetModal();

    changeWidthInputModaPrice();
}

function settingInventory() {
    let productName = $("#productName").val();

    let html = `
    <tr>
    ${
        productName == ""
            ? "<td class='product-name text-danger'>Masukan item name terlebih dahulu</td>"
            : `<td class="product-name">${productName}</td>`
    }
 
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

    $("#listVariantOnInventory").html(html);
    changeWidthInputModaPrice();
    mustNumberId("inStock");
    mustNumberId("minimumStock");
}

function settingCogs() {
    let productName = $("#productName").val();

    let items = `
    `;

    items += `
        <tr>
            ${
                productName == ""
                    ? '<td class="product-name text-danger">Masukan item name terlebih dahulu</td>'
                    : `<td class="product-name">${productName}</td>`
            }
            <td>
                <input id="trackStockSetCogs" class="red-input checkbox" type="checkbox" />
            </td>
            <td>
                <div class="container-input-default">
                    <input type="name" class="form-control input-default average-cost"
                        placeholder="">
                </div>
            </td>
        </tr>;
        `;

    $("#listVariantOnCogs").html(items);

    convertRupiahModal("average-cost");
}

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
