<?php

namespace App\Http\Service\Admin;

use App\Base\BaseService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Repository\DiscountRepository;
use Illuminate\Support\Facades\Log;

class DiscountService extends BaseService
{

    private $discountRepository;

    public function __construct(DiscountRepository $discountRepository)
    {
        $this->discountRepository = $discountRepository;
    }

    public function create($entity)
    {

        try {
            DB::beginTransaction();
            $entity['discount_code'] = strtoupper($entity['discount_code']);
            $this->discountRepository->create($entity);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            return false;
        }
    }

    public function getAll()
    {
        return $this->discountRepository->getAll();
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $entity = $this->discountRepository->findById($id);
            $this->discountRepository->delete($entity);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }

    public function edit($id)
    {
        return $this->discountRepository->findById($id);
    }

    public function update($id, $entity)
    {
        try {
            DB::beginTransaction();
            $entity['discount_code'] = strtoupper($entity['discount_code']);
            $model = $this->discountRepository->findById($id);
            $this->discountRepository->update($model, $entity);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }
}
