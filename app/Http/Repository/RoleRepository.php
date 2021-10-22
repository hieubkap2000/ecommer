<?php

namespace App\Http\Repository;

use App\Base\EloquentRepository;
use App\Models\User;
use Yajra\Datatables\Datatables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleRepository extends EloquentRepository
{

    protected $model;
    protected $premission;

    public function __construct(Role $model, Permission $premission)
    {
        $this->model = $model;
        $this->premission = $premission;
    }

    public function getAll()
    {
        $role = $this->model->select('id', 'name')
            ->orderBy('created_at', 'desc')
            ->get();

        return Datatables::of($role)
            ->addIndexColumn()
            ->addColumn('permission', function ($role) {
                return ' <button type="button" onclick="getPermission(' . $role->id . ')" class="btn btn-block bg-success btn-flat"
                data-toggle="modal" data-target="#permission">
                <i class="fas fa-users"></i> Phân quyền
                </button>';
            })
            ->addColumn('edit', function ($role) {
                return ' <button type="button" onclick="edit(' . $role->id . ')" class="btn btn-block bg-primary btn-flat"
                data-toggle="modal" data-target="#exampleModalCenter">
                <i class="far fa-edit"></i> Sửa
                </button>';
            })
            ->addColumn('detele', function ($role) {
                return ' <button type="button" onclick="delele(' . $role->id . ')" class="btn btn-block bg-danger btn-flat">
                <i class="fas fa-trash"></i> Xóa
                </button>';
            })
            ->rawColumns(['permission', 'edit', 'detele'])
            ->make(true);
    }

    public function getAllPermission()
    {
        return $this->premission->select('id', 'name')
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
