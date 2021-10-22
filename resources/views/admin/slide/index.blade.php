@extends('admin.layout')
@section('title', 'Slide')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Slide</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Slide</a></li>
                        <li class="breadcrumb-item active">Danh sách slide</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10"></div>
                                <div class="col-md-2">
                                    <button type="button" data-toggle="modal" onclick="insert()"
                                        data-target="#exampleModalCenter" class="btn btn-block btn-primary btn-flat">Thêm
                                        mới</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                            role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th> STT </th>
                                                    <th> Hình ảnh </th>
                                                    <th> Tên slide </th>
                                                    <th> Thứ tự sắp xếp </th>
                                                    <th> Trạng thái </th>
                                                    <th class="text-center"> Sửa </th>
                                                    <th class="text-center"> Xóa </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">STT</th>
                                                    <th rowspan="1" colspan="1">Hình ảnh</th>
                                                    <th rowspan="1" colspan="1">Tên slide</th>
                                                    <th rowspan="1" colspan="1">Thứ tự sắp xếp</th>
                                                    <th rowspan="1" colspan="1">Trạng thái</th>
                                                    <th rowspan="1" colspan="1" class="text-center">Sửa</th>
                                                    <th rowspan="1" colspan="1" class="text-center">Xóa</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form">
                    <div class="modal-body">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="exampleInputRounded0">Tên slide <code>*</code></label>
                            <input type="text" class="form-control rounded-0" id="slide_name"
                                placeholder="Nhập tên slide...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputRounded0">Hình ảnh <code>*</code></label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Chọn ảnh
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text">
                            </div>
                            <div id="holder"></div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputRounded0">Thứ tự sắp xếp <code>*</code></label>
                            <input type="text" class="form-control rounded-0" id="sort_order"
                                placeholder="Nhập tên thứ tự sắp xếp...">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputRounded0">Trạng thái : </label>
                            <input type="checkbox" name="my-checkbox"
                            data-on-text="Hiện"
                            data-off-text="Ẩn"
                            id="status" checked data-bootstrap-switch>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" onclick="save()">Lưu Danh
                            Mục</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ mix('js/admin/slide.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script>
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    </script>
@endsection
