<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Http\Service\Admin\TagService;

class TagController extends Controller
{
    private $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index()
    {
        return view('admin.tag.index');
    }

    public function getAll()
    {
        $productCategory = $this->tagService->getAll();
        return $productCategory;
    }
    public function store(TagRequest $request)
    {
        if ($this->tagService->create($request->all())) {
            return true;
        }
        return false;
    }

    public function edit($id)
    {
        $productCategory = $this->tagService->edit($id);
        return $productCategory;
    }

    public function delete($id)
    {
        if ($this->tagService->delete($id)) {
            return true;
        }
        return false;
    }

    public function update($id, TagRequest $request)
    {
        if ($this->tagService->update($id, $request->all())) {
            return true;
        }
        return false;
    }
}
