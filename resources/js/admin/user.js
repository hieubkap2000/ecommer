$(function () {
    var url = "user/getAll";
    var columns = [
        { data: "DT_RowIndex" },
        {
            data: "avatar",
            render: function (data, type, full, meta) {
                return '<img src="' + data + '" height="40"/>';
            },
        },
        { data: "name" },
        { data: "email" },
        { data: "role" },
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
    urlSave = "user/store";
    // reset form
    $("#form")[0].reset();
};

window.edit = (id) => {
    // remove image preview
    $("#holder img").remove();
    //set url save data
    urlSave = `user/update/${id}`;
    // call ajax, get info
    $.ajax({
        url: `user/edit/${id}`,
        type: "GET",
        success: function (data) {
            $("#name").val(data.name);
            $("#email").val(data.email);
            $("#thumbnail").val(data.avatar);
            $("#holder").append(
                `<img src="${data.avatar}" style="height: 5rem;">`
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
            name: $("#name").val(),
            email: $("#email").val(),
            password: $("#password").val(),
            avatar: $("#thumbnail").val(),
        },
        success: function (data) {
            $("#example1").dataTable().api().ajax.reload();
            Swal.fire("Đã lưu !", "Lưu người dùng thành công!", "success");
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
        title: "Bạn có muốn xóa người dùng này không?",
        text: "Bạn sẽ không thể khôi phục lại.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Xóa người dùng",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `user/delete/${id}`,
                type: "GET",
                success: function (data) {
                    $("#example1").dataTable().api().ajax.reload();
                    Swal.fire(
                        "Đã xóa!",
                        "Xóa người dùng thành công!",
                        "success"
                    );
                },
                error: function () {
                    toastr["error"]("Xóa người dùng không thành công!");
                },
            });
        }
    });
};

//image file manager
$("#lfm").filemanager("image");

window.getRole = (id) => {
    $("#modal-role-permission").empty();
    // call ajax, get info
    $.ajax({
        url: `user/get-role/${id}`,
        type: "GET",
        success: function (data) {
            var html = `<input type="hidden" id="idUser" value="${id}">`;
            $.each(data.getAllRole, function (key, value) {
                var checked = "";

                if (data.getRoleOfUser != null) {
                    checked =
                        value.id == data.getRoleOfUser.id ? "checked" : "";
                }

                html += `<div class="form-group">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="${value.id}" type="radio" ${checked} id="${value.name}" name="role">
                            <label for="${value.name}" class="custom-control-label">${value.name}</label>
                        </div>
                    </div>`;
            });
            $("#modal-role-permission").append(html);
        },
        error: function (xhr) {
            console.log(xhr);
        },
    });
};

window.updateRole = () => {
    var id = $("#idUser").val();

    $.ajax({
        url: `user/update-role/${id}`,
        type: "POST",
        dataSrc: "",
        data: {
            _token: $("#token").val(),
            role: $('input[name="role"]:checked').val(),
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
