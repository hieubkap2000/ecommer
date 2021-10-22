<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\Admin\RoleService;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        return view('admin.role.index');
    }

    public function getAll()
    {
        return $this->roleService->getAll();
    }

    public function store(RoleRequest $request)
    {
        if ($this->roleService->create($request->all())) {
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        if ($this->roleService->delete($id)) {
            return true;
        }
        return false;
    }

    public function edit($id)
    {
        return $this->roleService->edit($id);
    }

    public function update($id, RoleRequest $request)
    {
        if ($this->roleService->update($id, $request->all())) {
            return true;
        }
        return false;
    }

    public function getAllPermission()
    {
        return $this->roleService->getAllPermission();
    }

    public function permission($id)
    {
        return $permission = [
            'allPermission' => $this->roleService->getAllPermission(),
            'permissionOfRole' =>  $this->roleService->getPermissionOfRole($id)
        ];
    }

    public function permissionAdd($id, Request $request)
    {
        if ($this->roleService->permissionAdd($id, $request->all())) {
            return true;
        }
        return false;
    }
}
