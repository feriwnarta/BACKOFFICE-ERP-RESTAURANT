$(window).on("load", function () {
    assignToMenuBtnClicked();
});

function assignToMenuBtnClicked() {
    $(".assignToMenuBtn").click(function () {
        let idCategory = $(this).parent().parent().attr("id");

        getAllIngredients();
    });
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
