<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\Admin\PostService;

class PostController extends Controller
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        return view('admin.post.index');
    }

    public function getAll()
    {
        return $this->postService->getAll();
    }

    public function store(Request $request)
    {
        if ($this->postService->create($request->all())) {
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        if ($this->postService->delete($id)) {
            return true;
        }
        return false;
    }

    public function edit($id)
    {
        return $this->postService->edit($id);
    }

    public function update($id, Request $request)
    {
        if ($this->postService->update($id, $request->all())) {
            return true;
        }
        return false;
    }

    public function getCategory(Request $request)
    {
        return $this->postService->getAllPostCategory($request);
    }

    public function getTag(Request $request)
    {
        return $this->postService->getAllTag($request);
    }
}
