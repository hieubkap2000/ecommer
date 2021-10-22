//get slug
window.ChangeToSlug = (id) => {
    var title, slug;

    //Lấy text từ thẻ input title
    title = document.getElementById(id).value;

    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();

    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, "a");
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, "e");
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, "i");
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, "o");
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, "u");
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, "y");
    slug = slug.replace(/đ/gi, "d");
    //Xóa các ký tự đặt biệt
    slug = slug.replace(
        /\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi,
        ""
    );
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, "-");
    slug = slug.replace(/\-\-\-\-/gi, "-");
    slug = slug.replace(/\-\-\-/gi, "-");
    slug = slug.replace(/\-\-/gi, "-");
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = "@" + slug + "@";
    slug = slug.replace(/\@\-|\-\@|\@/gi, "");
    //In slug ra textbox có id “slug”
    document.getElementById("slug").value = slug;
};

// toast options
toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: false,
    progressBar: true,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
};

// init Datatables
window.initDatatables = function (url, columns) {
    $("#example1").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        // scrollX: true,
        lengthChange: false,
        autoWidth: false,
        pageLength: 5,
        lengthChange: true,
        lengthMenu: [5, 10, 15, 25, 50, 75, 100],
        order: [[0, "desc"]],
        ajax: url,
        columns: columns,
        language: language,
    });
};

//setup language datatable
var language = {
    processing: "Đang xử lý...",
    infoFiltered: "(được lọc từ _MAX_ mục)",
    aria: {
        sortAscending: ": Sắp xếp thứ tự tăng dần",
        sortDescending: ": Sắp xếp thứ tự giảm dần",
    },
    autoFill: {
        cancel: "Hủy",
        fill: "Điền tất cả ô với <i>%d</i>",
        fillHorizontal: "Điền theo hàng ngang",
        fillVertical: "Điền theo hàng dọc",
    },
    buttons: {
        collection:
            'Chọn lọc <span class="ui-button-icon-primary ui-icon ui-icon-triangle-1-s"></span>',
        colvis: "Hiển thị theo cột",
        colvisRestore: "Khôi phục hiển thị",
        copy: "Sao chép",
        copyKeys:
            "Nhấn Ctrl hoặc u2318 + C để sao chép bảng dữ liệu vào clipboard.<br /><br />Để hủy, click vào thông báo này hoặc nhấn ESC",
        copySuccess: {
            1: "Đã sao chép 1 dòng dữ liệu vào clipboard",
            _: "Đã sao chép %d dòng vào clipboard",
        },
        copyTitle: "Sao chép vào clipboard",
        csv: "File CSV",
        excel: "File Excel",
        pageLength: {
            "-1": "Xem tất cả các dòng",
            _: "Hiển thị %d dòng",
        },
        pdf: "File PDF",
        print: "In ấn",
    },
    infoThousands: "`",
    select: {
        cells: {
            1: "1 ô đang được chọn",
            _: "%d ô đang được chọn",
        },
        columns: {
            1: "1 cột đang được chọn",
            _: "%d cột đang được được chọn",
        },
        rows: {
            1: "1 dòng đang được chọn",
            _: "%d dòng đang được chọn",
        },
    },
    thousands: "`",
    searchBuilder: {
        title: {
            _: "Thiết lập tìm kiếm (%d)",
            0: "Thiết lập tìm kiếm",
        },
        button: {
            0: "Thiết lập tìm kiếm",
            _: "Thiết lập tìm kiếm (%d)",
        },
        value: "Giá trị",
        clearAll: "Xóa hết",
        condition: "Điều kiện",
        conditions: {
            date: {
                after: "Sau",
                before: "Trước",
                between: "Nằm giữa",
                empty: "Rỗng",
                equals: "Bằng với",
                not: "Không phải",
                notBetween: "Không nằm giữa",
                notEmpty: "Không rỗng",
            },
            number: {
                between: "Nằm giữa",
                empty: "Rỗng",
                equals: "Bằng với",
                gt: "Lớn hơn",
                gte: "Lớn hơn hoặc bằng",
                lt: "Nhỏ hơn",
                lte: "Nhỏ hơn hoặc bằng",
                not: "Không phải",
                notBetween: "Không nằm giữa",
                notEmpty: "Không rỗng",
            },
            string: {
                contains: "Chứa",
                empty: "Rỗng",
                endsWith: "Kết thúc bằng",
                equals: "Bằng",
                not: "Không phải",
                notEmpty: "Không rỗng",
                startsWith: "Bắt đầu với",
            },
        },
        logicAnd: "Và",
        logicOr: "Hoặc",
        add: "Thêm điều kiện",
        data: "Dữ liệu",
        deleteTitle: "Xóa quy tắc lọc",
    },
    searchPanes: {
        countFiltered: "{shown} ({total})",
        emptyPanes: "Không có phần tìm kiếm",
        clearMessage: "Xóa hết",
        loadMessage: "Đang load phần tìm kiếm",
        collapse: {
            0: "Phần tìm kiếm",
            _: "Phần tìm kiếm (%d)",
        },
        title: "Bộ lọc đang hoạt động - %d",
        count: "{total}",
    },
    datetime: {
        hours: "Giờ",
        minutes: "Phút",
        next: "Sau",
        previous: "Trước",
        seconds: "Giây",
    },
    emptyTable: "Không có dữ liệu",
    info: "Hiển thị _START_ tới _END_ của _TOTAL_ dòng",
    infoEmpty: "Hiển thị 0 tới 0 của 0 dòng",
    lengthMenu: "Hiển thị _MENU_ dòng",
    loadingRecords: "Đang tải...",
    paginate: {
        first: "Đầu tiên",
        last: "Cuối cùng",
        next: "Sau",
        previous: "Trước",
    },
    search: "Tìm kiếm:",
    zeroRecords: "Không tìm thấy kết quả",
};

//<----- active menu sidebar -----> //
/** add active class and stay opened when selected */
var url = window.location;

// for sidebar menu entirely but not cover treeview
$("ul.nav-sidebar a")
    .filter(function () {
        return this.href == url;
    })
    .addClass("active");

// for treeview
$("ul.nav-treeview a")
    .filter(function () {
        return this.href == url;
    })
    .parentsUntil(".nav-sidebar > .nav-treeview")
    .addClass("menu-open")
    .prev("a")
    .addClass("active");
//<------- end active menu sidebar ------->//
