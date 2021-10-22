window.viewCart = () => {
    window.location.href = url + "xem-gio-hang";
};

$(".addToCart").click(function (event) {
    event.preventDefault();
    $.ajax({
        url: url + "them-gio-hang",
        type: "POST",
        dataSrc: "",
        data: {
            _token: $("#token").val(),
            product_id: $("#product_id").val(),
            product_name: $("#product_name").val(),
            price: $("#price").val(),
            size: $("#size").val(),
            color: $("#color").val(),
            qty: $("#qty").val(),
            thumbnail: $("#thumbnail").val(),
        },
        success: function (data) {
            toastr["success"]("Thêm sản phẩm vào giỏ hàng thành công!");

            $("#cart_quantity").html(data);
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

$(".shopcart").click(function (event) {
    $(".cart_content_header").empty();
    event.preventDefault();
    $.ajax({
        url: url + "gio-hang-header",
        type: "GET",
        dataSrc: "",
        success: function (data) {
            var html = "";
            var subtotal_price = 0;
            $.each(data, function (key, value) {
                var size = value.options.size == null ? "" : value.options.size;
                var color =
                    value.options.color == null ? "" : value.options.color;
                html += `<tr>
                        <td class="text-center"><img src="${
                            value.options.thumbnail
                        }" style="height: 70px;"></td>
                        <td class="text-left product-name">
                            <strong> ${value.name} </strong>
                            <span class="text-left price">
                            <strong>Giá: </strong>
                            ${value.price.toLocaleString("vi", {
                                style: "currency",
                                currency: "VND",
                            })}
                            </span>
                            <p><strong>Số lượng: </strong>${value.qty}</p>
                            <p><strong>Màu - Size: </strong>${size} - ${color}</p>
                        </td>
                </tr>`;
            });
            $(".cart_content_header").append(html);
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

window.updateCart = (id) => {
    console.log(id);
};
