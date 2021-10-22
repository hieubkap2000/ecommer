<?php

namespace App\Http\Service\Web;

use App\Base\BaseService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Repository\SlideRepository;
use App\Http\Repository\ProductRepository;
use App\Http\Repository\PostRepository;
use Illuminate\Support\Facades\Log;

class HomeService extends BaseService
{

    private $slideRepository;
    private $productRepository;
    private $postRepository;

    public function __construct(
        SlideRepository $slideRepository,
        ProductRepository $productRepository,
        PostRepository $postRepository
    ) {
        $this->slideRepository = $slideRepository;
        $this->productRepository = $productRepository;
        $this->postRepository = $postRepository;
    }

    public function slide()
    {
        return $this->slideRepository->getSlideForHome();
    }

    public function getSellingProducts()
    {
        return $this->productRepository->getSellingProducts(10);
    }

    public function getPost()
    {
        return $this->postRepository->getPostForHome(5);
    }
}
