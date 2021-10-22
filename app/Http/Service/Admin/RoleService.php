<?php

namespace App\Http\Service\Admin;

use App\Base\BaseService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Repository\RoleRepository;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleService extends BaseService
{

    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function create($entity)
    {

        try {
            DB::beginTransaction();
            $this->roleRepository->create($entity);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            return false;
        }
    }

    public function getAll()
    {
        return $this->roleRepository->getAll();
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $entity = $this->roleRepository->findById($id);
            $this->roleRepository->delete($entity);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }

    public function edit($id)
    {
        return $this->roleRepository->findById($id);
    }

    public function update($id, $entity)
    {
        try {
            DB::beginTransaction();
            $model = $this->roleRepository->findById($id);
            $this->roleRepository->update($model, $entity);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }

    public function getAllPermission()
    {
        return $this->roleRepository->getAllPermission();
    }

    public function getPermissionOfRole($id)
    {
        $role = $this->roleRepository->findById($id);
        return $role->permissions->pluck('id');
    }

    public function permissionAdd($id, $data)
    {
        try {
            DB::beginTransaction();
            $role = Role::findById($id);
            isset($data['permission']) ? $role->syncPermissions($data['permission']) : $role->syncPermissions([]);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }
}
