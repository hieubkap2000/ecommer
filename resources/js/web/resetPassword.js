$("#save").click(function (event) {
    event.preventDefault();
    $.ajax({
        url: url + "khach-hang/doi-mat-khau",
        type: "POST",
        dataSrc: "",
        data: {
            _token: $("#_token").val(),
            username: $("#username").val(),
            token: $("#token").val(),
            password: $("#password").val(),
        },
        success: function (data) {
            if (data == "success") {
                Swal.fire(
                    "Đổi mật khẩu thành công !",
                    "Vui lòng đăng nhập bằng mật khẩu mới!",
                    "success"
                ).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url + "khach-hang/dang-nhap";
                    }
                });
                console.log(data);
            } else {
                toastr["error"]("Vui lòng chọn lại chức năng quên mật khẩu.");
            }
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
});
