<?php

namespace App\Http\Service\Admin;

use App\Base\BaseService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Repository\UserRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create($entity)
    {

        try {
            DB::beginTransaction();
            $entity['password'] = Hash::make($entity['password']);
            $this->userRepository->create($entity);
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
        return $this->userRepository->getAll();
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $entity = $this->userRepository->findById($id);
            $this->userRepository->delete($entity);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }

    public function edit($id)
    {
        return $this->userRepository->findById($id);
    }

    public function update($id, $entity)
    {
        try {
            DB::beginTransaction();
            $entity['password'] = Hash::make($entity['password']);
            $model = $this->userRepository->findById($id);
            $this->userRepository->update($model, $entity);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }

    public function getAllRole()
    {
        return $this->userRepository->getAllRole();
    }

    public function getRoleOfUser($id)
    {
        $user = $this->userRepository->findById($id);
        return $user->roles->first();
    }

    public function updateRole($id, $data)
    {
        try {
            DB::beginTransaction();
            $user = $this->userRepository->findById($id);
            $user->syncRoles($data['role']);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }
}
