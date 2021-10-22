$(function () {
    var url = "product-category/getAll";
    var columns = [
        { data: "DT_RowIndex" },
        { data: "category_name" },
        { data: "sort_order" },
        { data: "edit" },
        { data: "detele" },
    ];
    initDatatables(url, columns);
});

var urlSave = "";

window.insert = () => {
    urlSave = "product-category/store";

    $("#form")[0].reset();
};

window.edit = (id) => {
    urlSave = `product-category/update/${id}`;

    $.ajax({
        url: `product-category/edit/${id}`,
        type: "GET",
        success: function (data) {
            $("#category-name").val(data.category_name);
            $("#order-sort").val(data.sort_order);
            $("#slug").val(data.slug);
        },
        error: function (xhr) {
            console.log(xhr);
        },
    });
};

window.save = () => {
    $.ajax({
        url: urlSave,
        type: "POST",
        dataSrc: "",
        data: {
            _token: $("#token").val(),
            category_name: $("#category-name").val(),
            sort_order: $("#order-sort").val(),
            slug: $("#slug").val(),
        },
        success: function (data) {
            $("#example1").dataTable().api().ajax.reload();
            Swal.fire("Đã lưu !", "Lưu danh mục thành công!", "success");
            $("#form")[0].reset();
            $("[data-dismiss=modal]").trigger({ type: "click" });
        },
        error: function (xhr) {
            $.each(xhr.responseJSON.errors, function (key, value) {
                if (value.length >= 2) {
                    $.each(value, function (k, v) {
                        toastr["error"](v);
                    });
                } else {
                    toastr["error"](value);
                }
            });
        },
    });
};

window.delele = (id) => {
    Swal.fire({
        title: "Bạn có muốn xóa danh mục này không?",
        text: "Bạn sẽ không thể khôi phục lại.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Xóa danh mục",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `product-category/delete/${id}`,
                type: "GET",
                success: function (data) {
                    $("#example1").dataTable().api().ajax.reload();
                    Swal.fire("Đã xóa!", "Xóa danh mục thành công!", "success");
                },
                error: function () {
                    toastr["error"]("Xóa danh mục không thành công!");
                },
            });
        }
    });
};
