$(document).ready(function () {
    initSidebar();
    changeWidthTitle();
    dataTableInit();
});

// initialise sidebar mana yang terbuka
function initSidebar() {
    let location = window.location.pathname;
    switch (location) {
        case "/":
            sidebarOpen({ parentMenu: "dashboard-btn" });
            break;
        case "/pos/menu":
            sidebarOpen({ parentMenu: "pos-btn", childMenu: "menu-pos-btn" });
            break;
        case "/pos/category":
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
        case "/ingredients/category":
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
        case "/inventory/summary":
            sidebarOpen({
                parentMenu: "inventory-btn",
                childMenu: "summary-inventory-btn",
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
    if (parentMenu != null && parentMenu != undefined) {
        $(`.${parentMenu}`).addClass("active");
        let target = $(`.${parentMenu}`).data("bs-target");
        $(target).collapse("show");
    }

    if (childMenu != null && childMenu != undefined) {
        $(`#${childMenu}`).addClass("inner-menu-active");
    }
}

// Data Table
function dataTableInit() {
    $(document).ready(function () {
        $("#tableMenu").DataTable({
            paging: true,
            selected: false,
            lengthChange: false,
            searching: false,
            info: false,
        });
    });
}

// ubah width title divider di navbar
function changeWidthTitle() {
    let widthTitleNavbar = $(".navbar-title").width();

    $("#title-divider").width(widthTitleNavbar);
}

// berikan nav title ke button navbar yang diklik
function switchNavTitle(idOnInit, idBeforeInit) {

    
    $(`#${idOnInit}`).removeClass('navbar-subtitle');
    $(`#${idOnInit}`).addClass('navbar-title');

    $(`#${idBeforeInit}`).removeClass('navbar-title');
    $(`#${idBeforeInit}`).addClass('navbar-subtitle');
}
