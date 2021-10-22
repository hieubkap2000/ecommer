<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\Web\RegisterService;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    private $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function index()
    {
        return view('web.auth.register');
    }

    public function register(RegisterRequest $request)
    {
        if ($this->registerService->create($request->all())) {
            return true;
        }
        return false;
    }
}
