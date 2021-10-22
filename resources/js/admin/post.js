$(function () {
    var url = "post/getAll";
    var columns = [
        { data: "DT_RowIndex" },
        {
            data: "thumbnail",
            render: function (data, type, full, meta) {
                return '<img src="' + data + '" height="40"/>';
            },
        },
        { data: "title" },
        { data: "category_name" },
        { data: "date_of_publication" },
        { data: "sort_order" },
        { data: "status" },
        { data: "name" },
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
    resetValue();
    // remove image preview
    $("#holder img").remove();
    // set url save data
    urlSave = "post/store";
    // reset form
    $("#form")[0].reset();
};

window.edit = (id) => {
    resetValue();
    // remove image preview
    $("#holder img").remove();
    //set url save data
    urlSave = `post/update/${id}`;
    // call ajax, get info
    $.ajax({
        url: `post/edit/${id}`,
        type: "GET",
        success: function (data) {
            console.log(data);
            $("#title").val(data.post.title);
            $("#slug").val(data.post.slug);
            $("#date").val(data.post.date_of_publication);
            $("#sort_order").val(data.post.sort_order);
            $("#thumbnail").val(data.post.thumbnail);
            $("#user_id").val(data.post.user_id);
            $("#holder").append(
                `<img src="${data.post.thumbnail}" style="height: 5rem;">`
            );
            CKEDITOR.instances["content"].setData(data.post.content);
            CKEDITOR.instances["summary"].setData(data.post.summary);

            // set value category_selected
            $(".category")
                .append(
                    new Option(
                        data.post.category_name,
                        data.post.category_id,
                        true,
                        true
                    )
                )
                .trigger("change");

            // set value tag_selected
            $.each(data.tag, function (key, value) {
                $(".tag")
                    .append(new Option(value.tag_name, value.id, true, true))
                    .trigger("change");
            });

            //set status
            $("#status").bootstrapSwitch(
                "state",
                data.post.status == "on",
                true
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
            title: $("#title").val(),
            slug: $("#slug").val(),
            thumbnail: $("#thumbnail").val(),
            date_of_publication: $("#date").val(),
            status: $("#status").bootstrapSwitch("state") ? "on" : "off",
            sort_order: $("#sort_order").val(),
            user_id: $("#user_id").val(),
            summary: CKEDITOR.instances["summary"].getData(),
            content: CKEDITOR.instances["content"].getData(),
            tag_id: $(".tag").val(),
            category_id: $(".category").val(),
        },
        success: function (data) {
            $("#example1").dataTable().api().ajax.reload();
            Swal.fire("Đã lưu !", "Lưu bài viết thành công!", "success");
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
        title: "Bạn có muốn xóa bài viết này không?",
        text: "Bạn sẽ không thể khôi phục lại.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Xóa bài viết",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `post/delete/${id}`,
                type: "GET",
                success: function (data) {
                    $("#example1").dataTable().api().ajax.reload();
                    Swal.fire("Đã xóa!", "Xóa bài viết thành công!", "success");
                },
                error: function () {
                    toastr["error"]("Xóa bài viết không thành công!");
                },
            });
        }
    });
};

//image file manager
$("#lfm").filemanager("image");

//ckeditor
var options = {
    filebrowserImageBrowseUrl: "/laravel-filemanager?type=Images",
    filebrowserImageUploadUrl:
        "/laravel-filemanager/upload?type=Images&_token=",
    filebrowserBrowseUrl: "/laravel-filemanager?type=Files",
    filebrowserUploadUrl: "/laravel-filemanager/upload?type=Files&_token=",
};
CKEDITOR.replace("content", options);
CKEDITOR.replace("summary", options);

//Date picker
$("#date_of_publication").datetimepicker({
    format: "L",
});

//Load Category
function valueSelect2() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

    $(".category").empty();
    $(".tag").empty();

    $(".category").select2({
        ajax: {
            url: "post/get-search-category",
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

    $(".tag").select2({
        tokenSeparators: [","],
        ajax: {
            url: "post/get-search-tag",
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
        templateResult: formatTag,
        templateSelection: formatTagSelection,
    });

    function formatTag(tag) {
        if (tag.loading) {
            return tag.text;
        }

        var $container = $(
            "<div class='select2-result-tag clearfix'>" +
                "<div class='select2-result-tag__title'></div>" +
                "</div>" +
                "</div>"
        );

        $container.find(".select2-result-tag__title").text(tag.tag_name);

        return $container;
    }

    function formatTagSelection(tag) {
        return tag.tag_name || tag.text;
    }
}

function resetValue() {
    //reset value select2
    valueSelect2();
    // remove image preview
    $("#holder img").remove();
    //reset value ckeditor
    CKEDITOR.instances["content"].setData("");
    CKEDITOR.instances["summary"].setData("");
}
