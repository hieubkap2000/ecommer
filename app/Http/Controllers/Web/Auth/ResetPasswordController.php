<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\Web\ResetPasswordService;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\ForgotPasswordRequest;

class ResetPasswordController extends Controller
{
    private $resetPasswordService;

    public function __construct(ResetPasswordService $resetPasswordService)
    {
        $this->resetPasswordService = $resetPasswordService;
    }

    public function viewForgotPassword()
    {
        return view('web.auth.password.forgotPassword');
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $data = $request->all();
        if ($this->resetPasswordService->checkMail($data)) {
            $data['customer'] = $this->resetPasswordService->checkMail($data);
            $this->resetPasswordService->sendMail($data);
            $type = 'success';
        } else {
            $type  = 'error';
        }
        return $type;
    }

    public function viewResetPassword($username, $token)
    {
        return view('web.auth.password.resetPassword')->with(compact('username', 'token'));
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $data = $request->all();

        if ($this->resetPasswordService->checkUserNameAndToken($data)) {
            $data['customer'] = $this->resetPasswordService->checkUserNameAndToken($data);
            $this->resetPasswordService->updatePass($data);
            $type = 'success';
        } else {
            $type  = 'error';
        }
        return $type;
    }
}
