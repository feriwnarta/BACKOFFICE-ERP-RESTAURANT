const semiFinishedRowData = `
<tr class="row-semi-recipe">
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

    <input type="number" class="form-control no-border"
        id="exampleFormControlInput1" placeholder="0">

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

let semiFinishedRecipeTable = `
<table class="table table-bordered only-underline table-create-recipes body-text-regular">
<thead>
    <tr class="no-border-side">
        <th scope="col">Ingredients</th>
        <th scope="col">Usage</th>
        <th scope="col">Unit</th>
        <th scope="col">Avg Cost</th>
        <th scope="col">Last Cost</th>
    </tr>
</thead>
<tbody class="table-group-divider">

    <tr id="divideContent">
        <td colspan="6" class="span-all-columns"
            style="padding-bottom: 5px; padding-top: 5px;">
            <button class="btn icon-text" type="button" id="addIngredients">
                + Add ingredients
            </button>
        </td>
    </tr>
</tbody>
</table>
`;

let totalAvgAndLastCost = `
<tr id="totalAvgAndLastCost">
    <td colspan="3" class="span-all-columns"
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

$(function () {
    btnManageRecipeOnClick();
    changeImagePos();
});

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
                    $("#imageSemiRecipe").attr("src", imageDataUrl);
                };
            })
            .click();
    });
}

function btnAddIngredientsOnClick() {
    $("#addIngredients").click(function () {
        $(semiFinishedRowData).insertBefore("#divideContent");
        insertAfterTotalAvgAndLastCost();
        sumAvgCost();
        sumLastCost();
    });
}

function insertAfterTotalAvgAndLastCost() {
    if (totalAvg == 0 && totalLastCost == 0) {
        $(totalAvgAndLastCost).insertAfter("#divideContent");
    }
}

function btnManageRecipeOnClick() {
    $("#btnManageRecipe").click(function () {
        let isTtableShow = $(".recipe-table").text().trim() === "";

        if (isTtableShow) {
            $(".recipe-table").append(semiFinishedRecipeTable);
            btnAddIngredientsOnClick();
            hideButtonManageRecipe();
        }
    });
}

function hideButtonManageRecipe() {
    $("#btnManageRecipe").remove();
}

function deleteRow(element) {
    // kurangi total avg cost dan last cost
    let avgCost = $(element)
        .closest(".row-semi-recipe")
        .find(".col-avg-cost")
        .find("#avgCost")
        .val();
    let lastCost = $(element)
        .closest(".row-semi-recipe")
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

    let parent = $(element).closest(".row-semi-recipe");
    parent.remove();

    deleteTotalAvgAndLastCost();
}

function deleteTotalAvgAndLastCost() {
    if (totalAvg == 0 && totalLastCost == 0) {
        $("#totalAvgAndLastCost").remove();
    }
}

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
