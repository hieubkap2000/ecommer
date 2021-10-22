<?php

namespace App\Http\Repository;

use App\Base\EloquentRepository;
use App\Models\User;
use Yajra\Datatables\Datatables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserRepository extends EloquentRepository
{

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $user = $this->model->select('id', 'name', 'avatar', 'email')
            ->orderBy('created_at', 'desc')
            ->get();

        return Datatables::of($user)
            ->addIndexColumn()
            ->addColumn('role', function ($user) {
                return ' <button type="button" onclick="getRole(' . $user->id . ')" class="btn btn-block bg-success btn-flat"
                data-toggle="modal" data-target="#role-permission">
                <i class="fas fa-users"></i> Phân vai trò
                </button>';
            })
            ->addColumn('edit', function ($user) {
                return ' <button type="button" onclick="edit(' . $user->id . ')" class="btn btn-block bg-primary btn-flat"
                data-toggle="modal" data-target="#exampleModalCenter">
                <i class="far fa-edit"></i> Sửa
                </button>';
            })
            ->addColumn('detele', function ($user) {
                return ' <button type="button" onclick="delele(' . $user->id . ')" class="btn btn-block bg-danger btn-flat">
                <i class="fas fa-trash"></i> Xóa
                </button>';
            })
            ->rawColumns(['role', 'edit', 'detele'])
            ->make(true);
    }

    public function getAllRole()
    {
        return $role = Role::all();
    }


}
