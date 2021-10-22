$(function () {
    var url = "brand/getAll";
    var columns = [
        { data: "DT_RowIndex" },
        {
            data: "logo",
            render: function (data, type, full, meta) {
                return '<img src="' + data + '" height="40"/>';
            },
        },
        { data: "brand_name" },
        { data: "edit" },
        { data: "detele" },
    ];
    initDatatables(url, columns);
});

var urlSave = "";

window.insert = () => {
    // remove image preview
    $("#holder img").remove();
    // set url save data
    urlSave = "brand/store";
    // reset form
    $("#form")[0].reset();
};

window.edit = (id) => {
    // remove image preview
    $("#holder img").remove();
    //set url save data
    urlSave = `brand/update/${id}`;
    // call ajax, get info
    $.ajax({
        url: `brand/edit/${id}`,
        type: "GET",
        success: function (data) {
            $("#brand_name").val(data.brand_name);
            $("#thumbnail").val(data.logo);
            $("#holder").append(
                `<img src="${data.logo}" style="height: 5rem;">`
            );
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
            logo: $("#thumbnail").val(),
            brand_name: $("#brand_name").val(),
        },
        success: function (data) {
            $("#example1").dataTable().api().ajax.reload();
            Swal.fire("Đã lưu !", "Lưu thương hiệu thành công!", "success");
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
        title: "Bạn có muốn xóa thương hiệu này không?",
        text: "Bạn sẽ không thể khôi phục lại.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Xóa thương hiệu",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `brand/delete/${id}`,
                type: "GET",
                success: function (data) {
                    $("#example1").dataTable().api().ajax.reload();
                    Swal.fire(
                        "Đã xóa!",
                        "Xóa thương hiệu thành công!",
                        "success"
                    );
                },
                error: function () {
                    toastr["error"]("Xóa thương hiệu không thành công!");
                },
            });
        }
    });
};

//image file manager
$("#lfm").filemanager("image");
