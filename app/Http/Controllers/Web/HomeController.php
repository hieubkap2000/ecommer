<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\Web\HomeService;

class HomeController extends Controller
{
    private $homeService;

    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }

    public function index()
    {
        $slides = $this->homeService->slide();
        $sellingProducts = $this->homeService->getSellingProducts();
        $posts = $this->homeService->getPost();
        return view('web.home.index')->with(compact('slides', 'sellingProducts', 'posts'));
    }
}
