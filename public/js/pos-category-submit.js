function saveMenu() {
    var category_name = document.getElementById("itemName").value;
    let token = $('meta[name="csrf-token"]').attr("content");
    var data = {
        _token: token,
        categoryName: category_name,
    };
    if (category_name.length <= 0) {
        alert("Please enter a category name!");
    } else {
        $.ajax({
            type: "POST",
            url: "../category/submit-category",
            data: data,
            success: function (response) {
                if (response == 1) {
                    alert("Add category is success!");
                    window.location.href = "/pos/category";
                } else {
                    alert("Category is already set!");
                }
            },
        });
    }
}
