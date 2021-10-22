<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostCategoryRequest;
use App\Http\Service\Admin\PostCategoryService;

class PostCategoryController extends Controller
{
    private $postCategoryService;

    public function __construct(PostCategoryService $postCategoryService)
    {
        $this->postCategoryService = $postCategoryService;
    }

    public function index()
    {
        return view('admin.postCategory.index');
    }

    public function getAll()
    {
        $productCategory = $this->postCategoryService->getAll();
        return $productCategory;
    }
    public function store(PostCategoryRequest $request)
    {
        if ($this->postCategoryService->create($request->all())) {
            return true;
        }
        return false;
    }

    public function edit($id)
    {
        $productCategory = $this->postCategoryService->edit($id);
        return $productCategory;
    }

    public function delete($id)
    {
        if ($this->postCategoryService->delete($id)) {
            return true;
        }
        return false;
    }

    public function update($id, PostCategoryRequest $request)
    {
        if ($this->postCategoryService->update($id, $request->all())) {
            return true;
        }
        return false;
    }
}
