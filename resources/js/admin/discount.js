$(function () {
    var url = "discount/getAll";
    var columns = [
        { data: "DT_RowIndex" },
        { data: "discount_code" },
        { data: "discount_price" },
        { data: "edit" },
        { data: "detele" },
    ];
    initDatatables(url, columns);
});

var urlSave = "";

window.insert = () => {
    urlSave = "discount/store";

    $("#form")[0].reset();
};

window.edit = (id) => {
    urlSave = `discount/update/${id}`;

    $.ajax({
        url: `discount/edit/${id}`,
        type: "GET",
        success: function (data) {
            $("#discount_code").val(data.discount_code);
            $("#discount_price").val(data.discount_price);
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
            discount_code: $("#discount_code").val(),
            discount_price: $("#discount_price").val(),
        },
        success: function (data) {
            $("#example1").dataTable().api().ajax.reload();
            Swal.fire("Đã lưu !", "Lưu mã giảm giá thành công!", "success");
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
        title: "Bạn có muốn xóa mã giảm giá này không?",
        text: "Bạn sẽ không thể khôi phục lại.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Xóa mã giảm giá",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `discount/delete/${id}`,
                type: "GET",
                success: function (data) {
                    $("#example1").dataTable().api().ajax.reload();
                    Swal.fire("Đã xóa!", "Xóa mã giảm giá thành công!", "success");
                },
                error: function () {
                    toastr["error"]("Xóa mã giảm giá không thành công!");
                },
            });
        }
    });
};
