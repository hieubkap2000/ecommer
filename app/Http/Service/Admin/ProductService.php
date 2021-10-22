<?php

namespace App\Http\Service\Admin;

use App\Base\BaseService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Repository\ProductRepository;

class ProductService extends BaseService
{

    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function create($entity)
    {

        try {
            DB::beginTransaction();
            $this->productRepository->create($entity);
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
        return $this->productRepository->getAll();
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $entity = $this->productRepository->findById($id);
            $this->productRepository->delete($entity);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }

    public function edit($id)
    {
        return $this->productRepository->findById($id);
    }

    public function update($id, $entity)
    {
        try {
            DB::beginTransaction();
            $model = $this->productRepository->findById($id);
            $this->productRepository->update($model, $entity);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }

    public function getAllProductCategory($request)
    {
        try {
            DB::beginTransaction();
            $productCategory = $this->productRepository->getAllProductCategory($request);
            DB::commit();
            return $productCategory;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }

    public function getAllBrand($request)
    {
        try {
            DB::beginTransaction();
            $brand = $this->productRepository->getAllBrand($request);
            DB::commit();
            return $brand;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }
}
