var password = document.getElementById("password"),
    confirm_password = document.getElementById("confirm_password");

function validatePassword() {
    if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Mật khẩu không khớp");
    } else {
        confirm_password.setCustomValidity("");
    }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

$("#save").click(function (event) {
    event.preventDefault();
    $.ajax({
        url: url + "khach-hang/dang-ki",
        type: "POST",
        dataSrc: "",
        data: {
            _token: $("#token").val(),
            username: $("#username").val(),
            customer_name: $("#customer_name").val(),
            email: $("#email").val(),
            password: $("#password").val(),
        },
        success: function (data) {
            Swal.fire("Đã lưu !", "Đăng kí thành công!", "success").then(
                (result) => {
                    if (result.isConfirmed) {
                        window.location.href = url + "khach-hang/dang-nhap";
                    }
                }
            );
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
