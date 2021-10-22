@extends('admin.layout')
@section('title', 'Quản lí người dùng')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Người dùng</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
                        <li class="breadcrumb-item active">Danh sách người dùng</li>
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
                                                    <th> Tên </th>
                                                    <th> Email </th>
                                                    <th class="text-center"> Phân quyền </th>
                                                    <th class="text-center"> Sửa </th>
                                                    <th class="text-center"> Xóa </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th> STT </th>
                                                    <th> Hình ảnh </th>
                                                    <th> Tên </th>
                                                    <th> Email </th>
                                                    <th rowspan="1" colspan="1" class="text-center"> Phân quyền </th>
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
                            <label for="exampleInputRounded0">Tên người dùng <code>*</code></label>
                            <input type="text" class="form-control rounded-0" id="name"
                                placeholder="Nhập tên người dùng...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputRounded0">Email <code>*</code></label>
                            <input type="text" class="form-control rounded-0" id="email" placeholder="Nhập email...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputRounded0">Password <code>*</code></label>
                            <input type="password" class="form-control rounded-0" id="password"
                                placeholder="Nhập password...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputRounded0">Hình ảnh<code>*</code></label>
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
     <!-- Modal Role Permission -->
     <div class="modal fade" id="role-permission" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLongTitle">Phân vai trò</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form id="form-role-permission">
                 <div class="modal-body" id="modal-role-permission">
                     <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                     <button type="button" class="btn btn-primary" onclick="updateRole()">Lưu Danh
                         Mục</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
@endsection
@section('script')
    <script src="{{ mix('js/admin/user.js') }}"></script>
@endsection
