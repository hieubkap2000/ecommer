<?php

namespace App\Http\Repository;

use App\Base\EloquentRepository;
use App\Models\NewsLetter;
use Yajra\Datatables\Datatables;

class NewsLetterRepository extends EloquentRepository
{

    protected $model;

    public function __construct(NewsLetter $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $newsLetter = $this->model->select('id', 'email')
            ->orderBy('created_at', 'desc')
            ->get();
        return Datatables::of($newsLetter)
            ->addIndexColumn()
            ->addColumn('detele', function ($newsLetter) {
                return ' <button type="button" onclick="delele(' . $newsLetter->id . ')" class="btn btn-block bg-danger btn-flat">
                <i class="fas fa-trash"></i> Xóa
                </button>';
            })
            ->rawColumns(['detele'])
            ->make(true);
    }
}
