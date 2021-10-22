@extends('admin.layout')
@section('title', 'Sản Phẩm')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sản Phẩm</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Sản Phẩm</a></li>
                        <li class="breadcrumb-item active">Danh sách Sản Phẩm</li>
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
                                    <button type="button" data-toggle="modal" data-target=".bd-example-modal-lg"
                                            class="btn btn-block btn-primary btn-flat" onclick="insert()">Thêm
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
                                        <table id="example1"
                                               class="table table-bordered table-striped dataTable dtr-inline"
                                               role="grid" aria-describedby="example1_info">
                                            <thead>
                                            <tr role="row">
                                                <th> STT</th>
                                                <th> Ảnh</th>
                                                <th> Tên</th>
                                                <th> Mã</th>
                                                <th> Danh Mục</th>
                                                <th> Thương Hiệu</th>
                                                <th> Giá(vnđ)</th>
                                                <th> Giá Giảm(vnđ)</th>
                                                <th> Số lượng</th>
                                                <th> Đã bán</th>
                                                <th> Yêu thích</th>
                                                <th> Thứ tự</th>
                                                <th> Trạng thái</th>
                                                <th class="text-center"> Sửa</th>
                                                <th class="text-center"> Xóa</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th> STT</th>
                                                <th> Ảnh</th>
                                                <th> Tên</th>
                                                <th> Mã</th>
                                                <th> Danh Mục</th>
                                                <th> Thương Hiệu</th>
                                                <th> Giá(vnđ)</th>
                                                <th> Giá Giảm(vnđ)</th>
                                                <th> Số lượng</th>
                                                <th> Đã bán</th>
                                                <th> Yêu thích</th>
                                                <th> Thứ tự</th>
                                                <th> Trạng thái</th>
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
    <div class="modal fade bd-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <form id="form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="content" style="margin-top: 10px; margin-bottom: 10px">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputRounded0">Tên Sản Phẩm <code>*</code></label>
                                        <input type="text" class="form-control rounded-0" id="product_name"
                                               placeholder="Nhập tên sản phẩm..."
                                               onkeyup="ChangeToSlug('product_name');">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputRounded0">Slug<code>*</code></label>
                                    <input type="text" id="slug" class="form-control rounded-0" id="slug"
                                           placeholder="Nhập slug danh mục...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Danh mục sản phẩm <code>*</code></label>
                                        <select class="category" name="category_id">
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Thương hiệu <code>*</code></label>
                                        <select class="brand" name="brand_id">
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputRounded0">Giá sản phẩm <code>*</code></label>
                                        <input type="text" class="form-control rounded-0" id="price"
                                               placeholder="Nhập giá của sản phẩm...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputRounded0">Giảm giá sản phẩm <code>*</code></label>
                                        <input type="text" class="form-control rounded-0" id="discount"
                                               placeholder="Nhập giá giảm của sản phẩm...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputRounded0">Kích thước</label>
                                        <input type="text" class="form-control rounded-0" id="size"
                                               data-role="tagsinput"
                                               placeholder="Nhập kích thước của sản phẩm...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputRounded0">Màu sắc</label>
                                        <input type="text" class="form-control rounded-0" data-role="tagsinput"
                                               id="color"
                                               placeholder="Nhập màu sắc của sản phẩm...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputRounded0">Thứ tự sắp xếp <code>*</code></label>
                                        <input type="text" class="form-control rounded-0" id="sort_order"
                                               placeholder="Nhập tên thứ tự sắp xếp...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputRounded0">Mã Sản Phẩm <code>*</code></label>
                                        <input type="text" class="form-control rounded-0" id="product_code"
                                               placeholder="Nhập mã sản phẩm...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputRounded0">Số lượng <code>*</code></label>
                                        <input type="text" class="form-control rounded-0" id="quantity"
                                               placeholder="Nhập số lượng sản phẩm...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputRounded0">Mô tả ngắn</label>
                                        <textarea class="form-control rounded-0" id="short_description" cols="10"
                                                  rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputRounded0">Mô tả chi tiết sản phẩm</label>
                                        <textarea class="form-control rounded-0" id="content" cols="10"
                                                  rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputRounded0">Ảnh Thumbnail<code>*</code></label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                   class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Chọn ảnh
                                                </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" type="text">
                                        </div>
                                        <div id="holder"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputRounded0">Ảnh sản phẩm<code>*</code></label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="images" data-input="image_mutiple" data-preview="holder2"
                                                   class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Chọn ảnh
                                                </a>
                                            </span>
                                            <input id="image_mutiple" class="form-control" type="text">
                                        </div>
                                        <div id="holder2"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputRounded0">Trạng thái : </label>
                                        <input type="checkbox" name="my-checkbox" data-on-text="Hiện" data-off-text="Ẩn"
                                               id="status" checked data-bootstrap-switch>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" onclick="save()">Lưu Sản Phẩm</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap4-tagsinput@4.1.3/tagsinput.min.css">
@endsection
@section('script')
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap4-tagsinput@4.1.3/tagsinput.min.js"></script>

    <script src="{{ mix('js/admin/product.js') }}"></script>c
    <script src="{{ asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
@endsection
