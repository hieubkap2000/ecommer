$("#save").click(function (event) {
    event.preventDefault();
    $.ajax({
        url: url + "khach-hang/quen-mat-khau",
        type: "POST",
        dataSrc: "",
        data: {
            _token: $("#token").val(),
            email: $("#email").val(),
        },
        success: function (data) {
            console.log(data);
            if (data == "success") {
                Swal.fire(
                    "Gửi mail thành công !",
                    "Vui lòng kiểm tra email để đổi lại mật khẩu!",
                    "success"
                ).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url + "khach-hang/dang-nhap";
                    }
                });
            } else {
                toastr["error"]("Email không tồn tại trong hệ thống.");
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
