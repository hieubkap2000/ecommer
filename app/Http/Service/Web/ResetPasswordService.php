<?php

namespace App\Http\Service\Web;

use App\Base\BaseService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Repository\CustomerRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ResetPasswordService extends BaseService
{

    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function checkMail($entity)
    {
        return $this->customerRepository->checkMail($entity['email']);
    }

    public function sendMail($entity)
    {
        try {
            $token = Str::random(40);
            $url = "khach-hang/doi-mat-khau/" . $entity['customer']->username . "/" . $token . "";

            $this->customerRepository->updateToken($entity['customer']->id, $token);

            $data = [
                'name' => $entity['customer']->customer_name,
                'username' => $entity['customer']->username,
                'link' => url($url)
            ];

            Mail::send('web.mail_template.forgotPassword', $data, function ($message) use ($entity) {
                $message->from('hieubkap1108@gmail.com', 'YEENok');
                $message->to($entity['customer']->email, $entity['customer']->customer_name);
                $message->subject('Quên mật khẩu');
            });

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function checkUserNameAndToken($entity)
    {
        return $this->customerRepository->checkUserNameAndToken($entity);
    }

    public function updatePass($entity)
    {
        try {
            DB::beginTransaction();
            $password = Hash::make($entity['password']);
            $id = $entity['customer']->id;
            $this->customerRepository->passwordUpdate($id, $password);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }
}
