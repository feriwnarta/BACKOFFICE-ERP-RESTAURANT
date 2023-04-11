$(window).on("load", function () {
    initSidebar();
    changeWidthTitle();
    dataTableInit();
});

// initialize sidebar mana yang terbuka
function initSidebar() {
    let location = window.location.pathname;
    switch (location) {
        case "/":
            sidebarOpen({ parentMenu: "dashboard-btn" });
            break;
        case "/pos/menu":
            sidebarOpen({ parentMenu: "pos-btn", childMenu: "menu-pos-btn" });
            break;
        case "/pos/menu/create-menu":
            sidebarOpen({ parentMenu: "pos-btn", childMenu: "menu-pos-btn" });
            break;
        case "/pos/category":
            sidebarOpen({
                parentMenu: "pos-btn",
                childMenu: "category-pos-btn",
            });
            break;
        case "/pos/category/create-category":
            sidebarOpen({
                parentMenu: "pos-btn",
                childMenu: "category-pos-btn",
            });
            break;
        case "/ingredients/library":
            sidebarOpen({
                parentMenu: "ingredients-btn",
                childMenu: "library-ingredients-btn",
            });
            break;
        case "/ingredients/library/create-ingredients":
            sidebarOpen({
                parentMenu: "ingredients-btn",
                childMenu: "library-ingredients-btn",
            });
            break;
        case "/ingredients/category":
            sidebarOpen({
                parentMenu: "ingredients-btn",
                childMenu: "category-ingredients-btn",
            });
            break;
        case "/ingredients/category/create-category":
            sidebarOpen({
                parentMenu: "ingredients-btn",
                childMenu: "category-ingredients-btn",
            });
            break;
        case "/ingredients/recipes":
            sidebarOpen({
                parentMenu: "ingredients-btn",
                childMenu: "recipes-ingredients-btn",
            });
            break;
        case "/ingredients/recipes/create-recipes":
            sidebarOpen({
                parentMenu: "ingredients-btn",
                childMenu: "recipes-ingredients-btn",
            });
            break;
        case "/ingredients/recipes/semi-finished-recipes":
            sidebarOpen({
                parentMenu: "ingredients-btn",
                childMenu: "recipes-ingredients-btn",
            });
            break;
        case "/ingredients/recipes/create-semi-finished-recipes":
            sidebarOpen({
                parentMenu: "ingredients-btn",
                childMenu: "recipes-ingredients-btn",
            });
            break;
        case "/inventory/summary":
            sidebarOpen({
                parentMenu: "inventory-btn",
                childMenu: "summary-inventory-btn",
            });
            break;
        case "/inventory/stock-opname":
            sidebarOpen({
                parentMenu: "inventory-btn",
                childMenu: "stock-opname-inventory-btn",
            });
            break;
        case "/central-kitchen/stock":
            sidebarOpen({
                parentMenu: "central-kitchen-btn",
                childMenu: "stock-central-kitchen-btn",
            });
            break;
        case "/purchasing/supplier":
            sidebarOpen({
                parentMenu: "purchasing-btn",
                childMenu: "supplier-purchasing-btn",
            });
            break;
        case "/purchasing/purchase-order":
            sidebarOpen({
                parentMenu: "purchasing-btn",
                childMenu: "purchase-order-purchasing-btn",
            });
            break;
    }
}

// buka menu sidebar
function sidebarOpen({ parentMenu, childMenu }) {
    // cek terlebih dahulu apakah child menu yang diklik sama dengan child menu sebelumnya, jika sama tidak perlu
    // tampilkan transition button collapse
    if (sessionStorage.getItem("parentMenu") == parentMenu) {
        let target = $(`.${parentMenu}`).data("bs-target");
        $(target).css({
            "transition-duration": "0s",
            "transition-property": "none",
        });
    }

    if (parentMenu != null && parentMenu != undefined) {
        $(`.${parentMenu}`).addClass("active");
        let target = $(`.${parentMenu}`).data("bs-target");
        $(target).collapse("show");
    }

    if (childMenu != null && childMenu != undefined) {
        $(`#${childMenu}`).addClass("inner-menu-active");
    }

    sessionStorage.setItem("parentMenu", parentMenu);
}

// Data Table
function dataTableInit() {
    $("#tableMenu").DataTable({
        paging: true,
        selected: false,
        lengthChange: false,
        searching: false,
        info: false,
    });
}

// ubah width title divider di navbar
function changeWidthTitle() {
    let widthTitleNavbar = $(".navbar-title").width();
    let offset = $(".navbar-title").offset().left;

    $("#title-divider").css({
        position: "absolute",
        left: offset - 20,
    });
    $("#title-divider").width(widthTitleNavbar);
}

// berikan nav title ke button navbar yang diklik
function switchNavTitle(idOnInit, idBeforeInit) {
    $(`#${idOnInit}`).removeClass("navbar-subtitle");
    $(`#${idOnInit}`).addClass("navbar-title");

    $(`#${idBeforeInit}`).removeClass("navbar-title");
    $(`#${idBeforeInit}`).addClass("navbar-subtitle");

    if (idOnInit != "nav-title") {
        let marginDivider = parseInt($(`#nav-title`).width() + 16);
        let widthTitle = parseInt($(`#${idOnInit}`).width());

        $("#title-divider").css({
            position: "relative",
            left: `${marginDivider}px`,
            width: `${widthTitle}px`,
        });
    } else {
        let widthTitle = parseInt($(`#${idOnInit}`).width());

        console.log(widthTitle);

        $("#title-divider").css({
            position: "relative",
            left: "0px",
            width: `${widthTitle}px`,
        });
    }
}

// fungsi untuk membuat format rupiah dari integer biasa
function convertCurrencyRupiah(price) {
    var number_string = price.replace(/[^,\d]/g, "").toString();
    var split = number_string.split(",");
    var sisa = split[0].length % 3;
    var rupiah = split[0].substr(0, sisa);
    var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    return (rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah);
}

// fungsi untuk mengformat inputan number menjadi format uang rupiah
function convertRupiahModal(tag) {
    $(`.${tag}`).on("input", function () {
        let rs = $(this).val();

        rs = rs.replace(/\./g, "");

        if (isNaN(rs)) {
            rs = rs.replace(/[^\d]/g, "");
        }

        let format = convertCurrencyRupiah(rs);

        $(this).val(format);
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
