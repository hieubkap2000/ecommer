<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\Admin\UserService;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{

    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('admin.user.index');
    }

    public function getAll()
    {
        return $this->userService->getAll();
    }

    public function store(UserRequest $request)
    {
        if ($this->userService->create($request->all())) {
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        if ($this->userService->delete($id)) {
            return true;
        }
        return false;
    }

    public function edit($id)
    {
        return $this->userService->edit($id);
    }

    public function update($id, UserRequest $request)
    {
        if ($this->userService->update($id, $request->all())) {
            return true;
        }
        return false;
    }

    public function getRole($id)
    {
        return  [
            'getAllRole' =>  $this->userService->getAllRole(),
            'getRoleOfUser' =>  $this->userService->getRoleOfUser($id)
        ];
    }

    public function updateRole($id, Request $request)
    {
        if ($this->userService->updateRole($id, $request->all())) {
            return true;
        }
        return false;
    }
}
