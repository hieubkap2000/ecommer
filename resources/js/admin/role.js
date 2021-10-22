$(function () {
    var url = "role/getAll";
    var columns = [
        { data: "DT_RowIndex" },
        { data: "name" },
        { data: "permission" },
        { data: "edit" },
        { data: "detele" },
    ];
    initDatatables(url, columns);
});

var urlSave = "";

window.insert = () => {
    // set url save data
    urlSave = "role/store";
    // reset form
    $("#form")[0].reset();
};

window.edit = (id) => {
    //set url save data
    urlSave = `role/update/${id}`;
    // call ajax, get info
    $.ajax({
        url: `role/edit/${id}`,
        type: "GET",
        success: function (data) {
            $("#name").val(data.name);
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
            name: $("#name").val(),
        },
        success: function (data) {
            $("#example1").dataTable().api().ajax.reload();
            Swal.fire("Đã lưu !", "Lưu vai trò thành công!", "success");
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
        title: "Bạn có muốn xóa vai trò này không?",
        text: "Bạn sẽ không thể khôi phục lại.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Xóa vai trò",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `role/delete/${id}`,
                type: "GET",
                success: function (data) {
                    $("#example1").dataTable().api().ajax.reload();
                    Swal.fire("Đã xóa!", "Xóa vai trò thành công!", "success");
                },
                error: function () {
                    toastr["error"]("Xóa vai trò không thành công!");
                },
            });
        }
    });
};

window.getPermission = (id) => {
    $(".permission").empty();
    // call ajax, get info
    $.ajax({
        url: `role/permission/${id}`,
        type: "GET",

        success: function (data) {
            var html = `<input type="hidden" id="idRole" value="${id}">`;
            $.each(data.allPermission, function (key, value) {
                var checked = data.permissionOfRole.includes(value.id)
                    ? "checked"
                    : "";
                html += `<div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="${value.id}"
                                     value="${value.id}" ${checked} name="permission[]">
                                    <label for="${value.id}" class="custom-control-label">${value.name}</label>
                                 </div>`;
            });

            $(".permission").append(html);
        },
        error: function (xhr) {
            console.log(xhr);
        },
    });
};

window.updatePermission = () => {
    var val = [];
    $(":checkbox:checked").each(function (i) {
        val[i] = $(this).val();
    });
    var id = $("#idRole").val();

    $.ajax({
        url: "role/permission/add/" + id,
        type: "POST",
        dataSrc: "",
        data: {
            _token: $("#token").val(),
            permission: val,
        },
        success: function (data) {
            $("#example1").dataTable().api().ajax.reload();
            Swal.fire("Đã lưu !", "Lưu quyền thành công!", "success");
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
