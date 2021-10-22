<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\Web\PostService;

class PostController extends Controller
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function category($slug, $id)
    {
        $postOfCategory = $this->postService->getPostOfCategory($id);
        $category = $this->postService->getCategoryById($id);
        $limitCategory = $this->postService->getLimitCategory();
        $newPosts = $this->postService->getNewPosts();
        return view('web.post.category')->with(compact('postOfCategory', 'category', 'limitCategory', 'newPosts'));
    }

    public function details($slug, $id)
    {
        $post = $this->postService->details($id);
        $limitCategory = $this->postService->getLimitCategory();
        $newPosts = $this->postService->getNewPosts();
        return view('web.post.details')->with(compact('post', 'limitCategory', 'newPosts'));
    }
}
