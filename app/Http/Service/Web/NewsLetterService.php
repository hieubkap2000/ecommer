<?php

namespace App\Http\Service\Web;

use App\Base\BaseService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Repository\NewsLetterRepository;
use Illuminate\Support\Facades\Log;

class NewsLetterService extends BaseService
{

    private $newsLetterRepository;

    public function __construct(NewsLetterRepository $newsLetterRepository)
    {
        $this->newsLetterRepository = $newsLetterRepository;
    }

    public function create($entity)
    {

        try {
            DB::beginTransaction();
            $this->newsLetterRepository->create($entity);
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
        return $this->newsLetterRepository->getAll();
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $entity = $this->newsLetterRepository->findById($id);
            $this->newsLetterRepository->delete($entity);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }

    public function edit($id)
    {
        return $this->newsLetterRepository->findById($id);
    }

    public function update($id, $entity)
    {
        try {
            DB::beginTransaction();
            $model = $this->newsLetterRepository->findById($id);
            $this->newsLetterRepository->update($model, $entity);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }
}
