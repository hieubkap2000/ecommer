<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\Web\NewsLetterService;
use App\Http\Requests\NewsLetterRequest;

class NewsLetterController extends Controller
{
    private $newsLetterService;

    public function __construct(NewsLetterService $newsLetterService)
    {
        $this->newsLetterService = $newsLetterService;
    }

    public function store(NewsLetterRequest $request)
    {
        if ($this->newsLetterService->create($request->all())) {
            $type = "success";
            $message = "Đăng kí thành công.";
        } else {
            $type = "danger";
            $message = "Đăng kí thất bại.";
        }
        return redirect()->back()->with($type, $message);
    }
}
