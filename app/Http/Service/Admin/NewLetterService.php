<?php

namespace App\Http\Service\Admin;

use App\Base\BaseService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Repository\NewsLetterRepository;
use Illuminate\Support\Facades\Log;

class NewLetterService extends BaseService
{

    private $newsLetterRepository;

    public function __construct(NewsLetterRepository $newsLetterRepository)
    {
        $this->newsLetterRepository = $newsLetterRepository;
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
}
