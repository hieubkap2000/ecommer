$("#save").click(function (event) {
    event.preventDefault();
    $.ajax({
        url: url + "khach-hang/dang-nhap",
        type: "POST",
        dataSrc: "",
        data: {
            _token: $("#token").val(),
            username: $("#username").val(),
            password: $("#password").val(),
        },
        success: function (data) {
            window.location.href = url;
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
