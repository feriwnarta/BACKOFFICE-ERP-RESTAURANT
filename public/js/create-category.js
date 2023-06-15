function saveMenu(){
    var categoryName = $("#categoryName").val();
    let token = $('meta[name="csrf-token"]').attr("content");
    let data = {
        _token:token,
        categoryName:categoryName
    }
    $.ajax({

        url:"../../ingredients/category/store-category",
        method:"POST",
        success:function (response){
            if(response==1){
                alert("Add Category is Successful!");
                window.location.href="../category/create-category";
            }else{
                alert("Add Category is Failed!");
            }
        },
        data :data

    })
}
