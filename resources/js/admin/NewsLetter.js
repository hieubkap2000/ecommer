$(function () {
    var url = "newsletter/getAll";
    var columns = [
        { data: "DT_RowIndex" },
        { data: "email" },
        { data: "detele" },
    ];
    initDatatables(url, columns);
});


window.delele = (id) => {
    Swal.fire({
        title: "Bạn có muốn xóa email này không?",
        text: "Bạn sẽ không thể khôi phục lại.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Xóa email",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `newsletter/delete/${id}`,
                type: "GET",
                success: function (data) {
                    $("#example1").dataTable().api().ajax.reload();
                    Swal.fire("Đã xóa!", "Xóa email thành công!", "success");
                },
                error: function () {
                    toastr["error"]("Xóa email không thành công!");
                },
            });
        }
    });
};
