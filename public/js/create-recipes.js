$(function () {
    addIngredientsOnClick();
    addItemEquipmentOnClick();
    addItemEquipmentServSuppliesOnClick();
});

let totalAvgAndLastCost = `
<tr id="totalAvgAndLastCost">
                                    <td colspan="4" class="span-all-columns"
                                        style="padding-bottom: 10px; border-right: none;">
                                        <div>Total Average & Last Cost</div>
                                    </td>
                                    <td colspan="1" style="border-right: none;">
                                        <p class="body-text-bold" id="totalAvgCost">Rp.</p>
                                    </td>
                                    <td colspan="1" style="border-right: none;">
                                        <p class="body-text-bold" id="totalLastCost">Rp.</p>
                                    </td>
                                    <td></td>
                                </tr>
`;

let item = `
<tr class="row-item">
                                                    <td>
                                                        <div class="">
                                                            <select class="form-select create-recipes-select">
                                                                <option selected>Select</option>
                                                                <option href="#">Action</option>
                                                                <option href="#">Another action</option>
                                                                <option href="#">Something else here</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </td>


                                                    <td class="delete-item">
                                                        <i class="x-icon" onclick="deleteItem(this)"></i>
                                                    </td>

                                                </tr>
`;

let itemServSupplies = `
<tr class="row-item">
                                                    <td>
                                                        <div class="">
                                                            <select class="form-select create-recipes-select">
                                                                <option selected>Select</option>
                                                                <option href="#">Action</option>
                                                                <option href="#">Another action</option>
                                                                <option href="#">Something else here</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </td>


                                                    <td class="delete-item">
                                                        <i class="x-icon" onclick="deleteItem(this)"></i>
                                                    </td>

                                                </tr>
`;

function addItemEquipmentOnClick() {
    $("#addItemEquipment").click(function () {
        $(item).insertBefore("#divideContentItem");
    });
}

function addItemEquipmentServSuppliesOnClick() {
    $("#addItemServingSupplies").click(function () {
        $(itemServSupplies).insertBefore("#divideContentItemServSupplies");
    });
}

function deleteItem(element) {
    $(element).closest(".row-item").remove();
}

let repcipe = `
<tr class="row-recipe">
                                    {{-- INGREDIENTS --}}
                                    <td>
                                        <div class="">
                                            <select class="form-select create-recipes-select">
                                                <option selected>Select</option>
                                                <option href="#">Action</option>
                                                <option href="#">Another action</option>
                                                <option href="#">Something else here</option>
                                                
                                            </select>
                                        </div>
                                    </td>

                                    {{-- USAGE --}}
                                    <td>

                                        <input type="number" class="form-control no-border" id="exampleFormControlInput1"
                                            placeholder="0">

                                    </td>

                                    {{-- UNIT --}}
                                    <td>
                                        <div class="">
                                                <select class="form-select create-recipes-select">
                                                    <option selected>Select</option>
                                                    <option href="#">Action</option>
                                                    <option href="#">Another action</option>
                                                    <option href="#">Something else here</option>
                                                    
                                                </select>
                                        </div>
                                    </td>

                                    {{-- COOKING TYPE --}}
                                    <td>
                                     <div class="">
                                            <select class="form-select create-recipes-select">
                                                <option selected>Select</option>
                                                <option href="#">Action</option>
                                                <option href="#">Another action</option>
                                                <option href="#">Something else here</option>
                                                
                                            </select>
                                    </div>
                                    </td>
                                    <td class="disabled col-avg-cost">
                                        <input type="text" disabled class="form-control input-disabled-recipes"
                                            id="avgCost" value="Rp. 15.000">
                                    </td>

                                    <td class="disabled col-last-cost">
                                        <input type="text" disabled class="form-control input-disabled-recipes"
                                            id="lastCost" value="Rp. 15.000">
                                    </td>

                                    <td class="delete-recipes">
                                        <i class="x-icon" onclick="deleteRow(this)"></i>
                                    </td>

                                </tr>
`;

// panggil ini untuk menghitung keseluruhan avg cost
let totalAvg = 0;
function sumAvgCost() {
    $(".table-create-recipes")
        .find("#avgCost")
        .each(function (index, element) {
            let avg = $(element).val();
            avg = onlyNumber(avg);

            totalAvg += avg;
        });

    let format = formatCurrency(totalAvg);

    $("#totalAvgCost").html(format);
}

// panggil ini untuk menghitung keseluruhan last cost
let totalLastCost = 0;
function sumLastCost() {
    $(".table-create-recipes")
        .find("#lastCost")
        .each(function (index, element) {
            let avg = $(element).val();
            avg = onlyNumber(avg);

            totalLastCost += avg;
        });

    let format = formatCurrency(totalLastCost);

    $("#totalLastCost").html(format);
}

function formatCurrency(amount) {
    if (amount >= 1000000000) {
        return (
            "Rp. " +
            (amount / 1000000000)
                .toFixed(2)
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".") +
            " Milyar"
        );
    } else if (amount >= 1000000) {
        return (
            "Rp. " +
            (amount / 1000000)
                .toFixed(2)
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".") +
            " Juta"
        );
    } else {
        return "Rp. " + amount.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
}

function onlyNumber(element) {
    return parseInt(element.replace(/\D/g, ""), 10);
}

function deleteRow(element) {
    // kurangi total avg cost dan last cost
    let avgCost = $(element)
        .closest(".row-recipe")
        .find(".col-avg-cost")
        .find("#avgCost")
        .val();
    let lastCost = $(element)
        .closest(".row-recipe")
        .find(".col-last-cost")
        .find("#lastCost")
        .val();

    avgCost = onlyNumber(avgCost);
    lastCost = onlyNumber(lastCost);

    // avg cost
    totalAvg -= avgCost;
    totalLastCost -= lastCost;

    let formatAvg = formatCurrency(totalAvg);
    let formatLastCost = formatCurrency(totalLastCost);

    $("#totalAvgCost").html(formatAvg);
    $("#totalLastCost").html(formatLastCost);

    let parent = $(element).closest(".row-recipe");
    parent.remove();
}

function addIngredientsOnClick() {
    $("#addIngredients").on("click", function () {
        $(repcipe).insertBefore("#divideContent");
        showTotalAvgAndLastCost();
        sumAvgCost();
        sumLastCost();
    });
}

function showTotalAvgAndLastCost() {
    if (totalAvg == 0 && totalLastCost == 0) {
        $(totalAvgAndLastCost).insertAfter("#divideContent");
    }
}
