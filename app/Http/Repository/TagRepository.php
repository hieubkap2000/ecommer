<?php

namespace App\Http\Repository;

use App\Base\EloquentRepository;
use App\Models\Tag;
use Yajra\Datatables\Datatables;

class TagRepository extends EloquentRepository
{

    protected $model;

    public function __construct(Tag $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $tag = $this->model->select('id', 'tag_name')
            ->orderBy('created_at', 'desc')
            ->get();
        return Datatables::of($tag)
            ->addIndexColumn()
            ->addColumn('edit', function ($tag) {
                return ' <button type="button" onclick="edit(' . $tag->id . ')" class="btn btn-block bg-primary btn-flat"
                data-toggle="modal" data-target="#exampleModalCenter">
                <i class="far fa-edit"></i> Sửa
                </button>';
            })
            ->addColumn('detele', function ($tag) {
                return ' <button type="button" onclick="delele(' . $tag->id . ')" class="btn btn-block bg-danger btn-flat">
                <i class="fas fa-trash"></i> Xóa
                </button>';
            })
            ->rawColumns(['edit', 'detele'])
            ->make(true);
    }
}
