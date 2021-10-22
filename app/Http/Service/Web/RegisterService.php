<?php

namespace App\Http\Service\Web;

use App\Base\BaseService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Repository\CustomerRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class RegisterService extends BaseService
{

    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function create($entity)
    {

        try {
            DB::beginTransaction();
            $entity['password'] = Hash::make($entity['password']);
            $this->customerRepository->create($entity);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            return false;
        }
    }
}
