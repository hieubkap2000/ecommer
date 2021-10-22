<?php

namespace App\Http\Service\Web;

use App\Base\BaseService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Repository\ProductRepository;
use App\Http\Repository\ProductCategoryRepository;

class ProductService extends BaseService
{

    private $productRepository;
    private $productCategoryRepository;

    public function __construct(
        ProductRepository $productRepository,
        ProductCategoryRepository $productCategoryRepository
    ) {
        $this->productRepository = $productRepository;
        $this->productCategoryRepository = $productCategoryRepository;
    }

    public function getProductOfCategory($id)
    {
        return $this->productRepository->getProductOfCategory($id);
    }

    public function getCategoryById($id)
    {
        return $this->productCategoryRepository->findById($id);
    }

    public function getLimitCategory()
    {
        return $this->productCategoryRepository->getLimitCategory(10);
    }

    public function getSellingProducts()
    {
        return $this->productRepository->getSellingProducts(3);
    }

    public function getDetailsProduct($id)
    {
        return $this->productRepository->details($id);
    }

}
