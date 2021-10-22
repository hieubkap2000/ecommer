@extends('admin.layout')
@section('title', 'Bài viết')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bài viết</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bài viết</a></li>
                        <li class="breadcrumb-item active">Danh sách bài viết</li>
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
                                        mới
                                    </button>
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
                                                    <th> STT</th>
                                                    <th> Ảnh </th>
                                                    <th> Tên bài viết </th>
                                                    <th> Danh mục </th>
                                                    <th> Ngày công khai </th>
                                                    <th> Số thứ tự </th>
                                                    <th> Trạng thái </th>
                                                    <th> Tác giả </th>
                                                    <th class="text-center"> Sửa</th>
                                                    <th class="text-center"> Xóa</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Ảnh </th>
                                                    <th> Tên bài viết </th>
                                                    <th> Danh mục </th>
                                                    <th> Ngày công khai </th>
                                                    <th> Số thứ tự </th>
                                                    <th> Trạng thái </th>
                                                    <th> Tác giả </th>
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
    <div class="modal fade" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
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
                        <input type="hidden" name="user_id" id="user_id" >
                        <div class="form-group">
                            <label for="exampleInputRounded0">Tên bài viết <code>*</code></label>
                            <input type="text" class="form-control rounded-0" id="title" placeholder="Nhập tên bài viết..."
                                onkeyup="ChangeToSlug('title');">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputRounded0">Slug<code>*</code></label>
                            <input type="text" id="slug" class="form-control rounded-0" id="slug"
                                placeholder="Nhập slug danh mục...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputRounded0">Ảnh bài viết<code>*</code></label>
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
                            <label>Danh mục bài viết <code>*</code></label>
                            <select class="category" name="category_id">
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tag bài viết <code>*</code></label>
                            <select class="tag" name="tag_id[]" data-tags="true" multiple="multiple">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputRounded0">Mô tả ngắn</label>
                            <textarea class="form-control rounded-0" id="summary" cols="10" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputRounded0">Nội dung</label>
                            <textarea class="form-control rounded-0" id="content" cols="10" rows="10">
                                            </textarea>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputRounded0">Thứ tự sắp xếp <code>*</code></label>
                            <input type="text" class="form-control rounded-0" id="sort_order"
                                placeholder="Nhập tên thứ tự sắp xếp...">
                        </div>
                        <div class="form-group">
                            <label>Ngày công khai:</label>
                            <div class="input-group date" id="date_of_publication" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input"
                                    data-target="#date_of_publication" id="date">
                                <div class="input-group-append" data-target="#date_of_publication"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputRounded0">Trạng thái : </label>
                            <input type="checkbox" name="my-checkbox" data-on-text="Hiện" data-off-text="Ẩn" id="status"
                                checked data-bootstrap-switch>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" onclick="save()">Lưu Bài Viết
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" />
@endsection
@section('script')

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js">
    </script>

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script src="{{ mix('js/admin/post.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
@endsection
