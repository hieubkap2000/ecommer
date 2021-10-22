@extends('admin.layout')
@section('title', 'Quản lí vai trò')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Vai trò</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Vai trò</a></li>
                        <li class="breadcrumb-item active">Danh sách vai trò</li>
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
                                                    <th> Tên </th>
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
                                                    <th> Tên </th>
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
                            <label for="exampleInputRounded0">Tên vai trò <code>*</code></label>
                            <input type="text" class="form-control rounded-0" id="name"
                                placeholder="Nhập tên vai trò...">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" onclick="save()">Lưu Vai Trò</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
     <!-- Modal 2 Permission-->
     <div class="modal fade" id="permission" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLongTitle">Cập nhật quyền</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form id="form">
                 <div class="modal-body permission">
                     <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                     <button type="button" class="btn btn-primary" onclick="updatePermission()">Lưu Quyền</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
@endsection
@section('script')
    <script src="{{ mix('js/admin/role.js') }}"></script>
@endsection
