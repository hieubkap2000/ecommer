<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\Admin\BrandService;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{

    private $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function index()
    {
        return view('admin.brand.index');
    }

    public function getAll()
    {
        return $this->brandService->getAll();
    }

    public function store(BrandRequest $request)
    {
        if ($this->brandService->create($request->all())) {
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        if ($this->brandService->delete($id)) {
            return true;
        }
        return false;
    }

    public function edit($id)
    {
        return $this->brandService->edit($id);
    }

    public function update($id, BrandRequest $request)
    {
        if ($this->brandService->update($id, $request->all())) {
            return true;
        }
        return false;
    }
}
