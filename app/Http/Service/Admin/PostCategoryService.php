<?php

namespace App\Http\Service\Admin;

use App\Base\BaseService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Repository\PostCategoryRepository;
use Illuminate\Support\Facades\Log;

class PostCategoryService extends BaseService
{

    private $postCategoryRepository;

    public function __construct(PostCategoryRepository $postCategoryRepository)
    {
        $this->postCategoryRepository = $postCategoryRepository;
    }

    public function create($entity)
    {

        try {
            DB::beginTransaction();
            $this->postCategoryRepository->create($entity);
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
        return $this->postCategoryRepository->getAll();
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $entity = $this->postCategoryRepository->findById($id);
            $this->postCategoryRepository->delete($entity);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }

    public function edit($id)
    {
        return $this->postCategoryRepository->findById($id);
    }

    public function update($id, $entity)
    {
        try {
            DB::beginTransaction();
            $model = $this->postCategoryRepository->findById($id);
            $this->postCategoryRepository->update($model, $entity);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }
}
