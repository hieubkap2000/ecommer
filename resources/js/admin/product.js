$(function () {
    var url = "product/getAll";
    var columns = [
        { data: "DT_RowIndex" },
        {
            data: "thumbnail",
            render: function (data, type, full, meta) {
                return '<img src="' + data + '" width="40"/>';
            },
        },
        { data: "product_name" },
        { data: "product_code" },
        { data: "category_name" },
        { data: "brand_name" },
        { data: "price" },
        { data: "discount" },
        { data: "quantity" },
        { data: "quantity_sold" },
        { data: "number_favorites" },
        { data: "sort_order" },
        { data: "status" },
        { data: "edit" },
        { data: "detele" },
    ];
    initDatatables(url, columns);

    //<---bootstrap-switch--->//
    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch("state", $(this).prop("checked"));
    });
});

var urlSave = "";

window.insert = () => {
    // reset value
    resetValue();
    // set url save data
    urlSave = "product/store";
    // reset form
    $("#form")[0].reset();
};

window.edit = (id) => {
    // reset value
    resetValue();
    //set url save data
    urlSave = `product/update/${id}`;
    // call ajax, get info
    $.ajax({
        url: `product/edit/${id}`,
        type: "GET",
        success: function (data) {
            $("#product_name").val(data.product_name);
            $("#discount").val(data.discount);
            $("#price").val(data.price);
            $("#product_code").val(data.product_code);
            $("#quantity").val(data.quantity);
            $("#sort_order").val(data.sort_order);
            $("#slug").val(data.slug);
            $("#size").tagsinput("add", data.size);
            $("#color").tagsinput("add", data.color);

            //set ckediter
            CKEDITOR.instances["content"].setData(data.content);
            CKEDITOR.instances["short_description"].setData(
                data.short_description
            );

            // set value category_selected
            $(".category")
                .append(
                    new Option(data.category_name, data.category_id, true, true)
                )
                .trigger("change");

            // set value brand_selected
            $(".brand")
                .append(new Option(data.brand_name, data.brand_id, true, true))
                .trigger("change");

            //set image
            $("#thumbnail").val(data.thumbnail);
            $("#holder").append(
                `<img src="${data.thumbnail}" style="height: 5rem;">`
            );
            $("#image_mutiple").val(data.images);
            var images_mutiple = data.images.split(",");
            $.each(images_mutiple, function (key, value) {
                $("#holder2").append(
                    `<img src="${value}" style="height: 5rem;">`
                );
            });

            //set status
            $("#status").bootstrapSwitch("state", data.status == "on", true);
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
            product_name: $("#product_name").val(),
            slug: $("#slug").val(),
            price: $("#price").val(),
            discount: $("#discount").val(),
            sort_order: $("#sort_order").val(),
            product_code: $("#product_code").val(),
            short_description:
                CKEDITOR.instances["short_description"].getData(),
            content: CKEDITOR.instances["content"].getData(),
            product_code: $("#product_code").val(),
            thumbnail: $("#thumbnail").val(),
            images: $("#image_mutiple").val(),
            quantity: $("#quantity").val(),
            status: $("#status").bootstrapSwitch("state") ? "on" : "off",
            category_id: $(".category").val(),
            brand_id: $(".brand").val(),
            color: $("#color").val(),
            size: $("#size").val(),
        },
        success: function (data) {
            $("#example1").dataTable().api().ajax.reload();
            Swal.fire("Đã lưu !", "Lưu sản phẩm thành công!", "success");
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
        title: "Bạn có muốn xóa sản phẩm này không?",
        text: "Bạn sẽ không thể khôi phục lại.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Xóa sản phẩm",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `product/delete/${id}`,
                type: "GET",
                success: function (data) {
                    $("#example1").dataTable().api().ajax.reload();
                    Swal.fire("Đã xóa!", "Xóa sản phẩm thành công!", "success");
                },
                error: function () {
                    toastr["error"]("Xóa sản phẩm không thành công!");
                },
            });
        }
    });
};

//image file manager
$("#lfm").filemanager("image");
$("#images").filemanager("image");

//ckeditor
var options = {
    filebrowserImageBrowseUrl: "/laravel-filemanager?type=Images",
    filebrowserImageUploadUrl:
        "/laravel-filemanager/upload?type=Images&_token=",
    filebrowserBrowseUrl: "/laravel-filemanager?type=Files",
    filebrowserUploadUrl: "/laravel-filemanager/upload?type=Files&_token=",
};
CKEDITOR.replace("content", options);
CKEDITOR.replace("short_description", options);


//Load Category & Brand
function valueSelect2() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

    $(".category").empty();
    $(".brand").empty();

    $(".category").select2({
        ajax: {
            url: "product/get-search-category",
            type: "POST",
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    _token: CSRF_TOKEN,
                    q: params.term, // search term
                    page: params.current_page,
                };
            },
            processResults: function (data, params) {
                params.current_page = params.current_page || 1;

                return {
                    results: data.data,
                    pagination: {
                        more: params.current_page * 30 < data.total,
                    },
                };
            },
            cache: true,
        },
        templateResult: formatCategory,
        templateSelection: formatCategorySelection,
    });

    $(".brand").select2({
        ajax: {
            url: "product/get-search-brand",
            type: "POST",
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    _token: CSRF_TOKEN,
                    q: params.term, // search term
                    page: params.current_page,
                };
            },
            processResults: function (data, params) {
                params.current_page = params.current_page || 1;

                return {
                    results: data.data,
                    pagination: {
                        more: params.current_page * 30 < data.total,
                    },
                };
            },
            cache: true,
        },
        templateResult: formatBrand,
        templateSelection: formatBrandSelection,
    });

    function formatCategory(category) {
        if (category.loading) {
            return category.text;
        }

        var $container = $(
            "<div class='select2-result-category clearfix'>" +
                "<div class='select2-result-category__title'></div>" +
                "</div>" +
                "</div>"
        );

        $container
            .find(".select2-result-category__title")
            .text(category.category_name);

        return $container;
    }

    function formatCategorySelection(category) {
        return category.category_name || category.text;
    }

    function formatBrand(brand) {
        if (brand.loading) {
            return brand.text;
        }

        var $container = $(
            `<div class='select2-result-brand clearfix'>
            <span><img class="img-flag"/></span>
            <span class='select2-result-brand__title'></span>
        </div>`
        );

        $container.find(".select2-result-brand__title").text(brand.brand_name);
        $container.find("img").attr("src", brand.logo);
        return $container;
    }

    function formatBrandSelection(brand) {
        return brand.brand_name || brand.text;
    }
}


function resetValue() {
    //reset value select2
    valueSelect2();
    // remove image preview
    $("#holder img").remove();
    $("#holder2 img").remove();
    //reset value tagsinput
    $("#size").tagsinput("removeAll");
    $("#color").tagsinput("removeAll");
    //reset value ckeditor
    CKEDITOR.instances["content"].setData("");
    CKEDITOR.instances["short_description"].setData("");
}
