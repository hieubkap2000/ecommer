$(function () {
    var url = "slide/getAll";
    var columns = [
        { data: "DT_RowIndex" },
        {
            data: "image",
            render: function (data, type, full, meta) {
                return '<img src="' + data + '" height="40"/>';
            },
        },
        { data: "slide_name" },
        { data: "sort_order" },
        { data: "status" },
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
    urlSave = "slide/store";
    // reset form
    $("#form")[0].reset();
};

window.edit = (id) => {
    // remove image preview
    $("#holder img").remove();
    //set url save data
    urlSave = `slide/update/${id}`;
    // call ajax, get info
    $.ajax({
        url: `slide/edit/${id}`,
        type: "GET",
        success: function (data) {
            $("#slide_name").val(data.slide_name);
            $("#sort_order").val(data.sort_order);
            $("#status").bootstrapSwitch("state", data.status == "on", true);
            $("#thumbnail").val(data.image);
            $("#holder").append(
                `<img src="${data.image}" style="height: 5rem;">`
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
            slide_name: $("#slide_name").val(),
            image: $("#thumbnail").val(),
            sort_order: $("#sort_order").val(),
            status: $("#status").bootstrapSwitch("state") ? "on" : "off",
        },
        success: function (data) {
            $("#example1").dataTable().api().ajax.reload();
            Swal.fire("Đã lưu !", "Lưu slide thành công!", "success");
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
        title: "Bạn có muốn xóa slide này không?",
        text: "Bạn sẽ không thể khôi phục lại.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Xóa slide",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `slide/delete/${id}`,
                type: "GET",
                success: function (data) {
                    $("#example1").dataTable().api().ajax.reload();
                    Swal.fire("Đã xóa!", "Xóa slide thành công!", "success");
                },
                error: function () {
                    toastr["error"]("Xóa slide không thành công!");
                },
            });
        }
    });
};

//image file manager
$("#lfm").filemanager("image");
