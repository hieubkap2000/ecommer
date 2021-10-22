<?php

namespace App\Http\Service\Web;

use App\Base\BaseService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Repository\PostRepository;
use App\Http\Repository\PostCategoryRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PostService extends BaseService
{

    private $postRepository;
    private $postCategoryRepository;

    public function __construct(
        PostRepository $postRepository,
        PostCategoryRepository $postCategoryRepository
    ) {
        $this->postRepository = $postRepository;
        $this->postCategoryRepository = $postCategoryRepository;
    }

    public function getCategoryById($id)
    {
        return $this->postCategoryRepository->findById($id);
    }

    public function getLimitCategory()
    {
        return $this->postCategoryRepository->getLimitCategory(10);
    }

    public function getPostOfCategory($id)
    {
        return $this->postRepository->getPostOfCategory($id);
    }

    public function getNewPosts()
    {
        return $this->postRepository->getNewPosts(3);
    }

    public function details($id)
    {
        return $this->postRepository->findByIdCustom($id);
    }
}
