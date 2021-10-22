<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\Admin\ProductCategoryService;
use App\Http\Requests\ProductCategoryRequest;

class ProductCategoryController extends Controller
{

    private $productCategoryService;

    public function __construct(ProductCategoryService $productCategoryService)
    {
        $this->productCategoryService = $productCategoryService;
    }

    public function index()
    {
        return view('admin.productCategory.index');
    }

    public function getAll()
    {
        $productCategory = $this->productCategoryService->getAll();
        return $productCategory;
    }
    public function store(ProductCategoryRequest $request)
    {
        if ($this->productCategoryService->create($request->all())) {
            return true;
        }
        return false;
    }

    public function edit($id)
    {
        $productCategory = $this->productCategoryService->edit($id);
        return $productCategory;
    }

    public function delete($id)
    {
        if ($this->productCategoryService->delete($id)) {
            return true;
        }
        return false;
    }

    public function update($id, ProductCategoryRequest $request)
    {
        if ($this->productCategoryService->update($id, $request->all())) {
            return true;
        }
        return false;
    }
}
