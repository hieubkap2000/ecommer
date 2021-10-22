<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\Admin\ProductService;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return view('admin.product.index');
    }

    public function getAll()
    {
        return $this->productService->getAll();
    }

    public function store(ProductRequest $request)
    {
        if ($this->productService->create($request->all())) {
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        if ($this->productService->delete($id)) {
            return true;
        }
        return false;
    }

    public function edit($id)
    {
        return $this->productService->edit($id);
    }

    public function update($id, ProductRequest $request)
    {
        if ($this->productService->update($id, $request->all())) {
            return true;
        }
        return false;
    }

    public function getCategory(Request $request)
    {
        return $this->productService->getAllProductCategory($request);
    }

    public function getBrand(Request $request)
    {
        return $this->productService->getAllBrand($request);
    }
}
