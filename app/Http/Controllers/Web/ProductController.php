<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\Web\ProductService;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }


    public function category($slug, $id)
    {
        $productOfCategory = $this->productService->getProductOfCategory($id);
        $category = $this->productService->getCategoryById($id);
        $limitCategory = $this->productService->getLimitCategory();
        $sellingProducts = $this->productService->getSellingProducts();
        return view('web.product.category')->with(compact('productOfCategory', 'category', 'limitCategory', 'sellingProducts'));
    }

    public function details($slug, $id)
    {
        $limitCategory = $this->productService->getLimitCategory();
        $sellingProducts = $this->productService->getSellingProducts();
        $product = $this->productService->getDetailsProduct($id);
        // dd($product);

        return view('web.product.details')->with(compact('limitCategory', 'sellingProducts', 'product'));
    }
}
