<?php

namespace App\Http\Repository;

use App\Base\EloquentRepository;
use App\Models\PostCategory;
use Yajra\Datatables\Datatables;

class PostCategoryRepository extends EloquentRepository
{

    protected $model;

    public function __construct(PostCategory $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $postCategory = $this->model->select('id', 'category_name', 'sort_order')
            ->orderBy('created_at', 'desc')
            ->get();
        return Datatables::of($postCategory)
            ->addIndexColumn()
            ->addColumn('edit', function ($postCategory) {
                return ' <button type="button" onclick="edit(' . $postCategory->id . ')" class="btn btn-block bg-primary btn-flat"
                data-toggle="modal" data-target="#exampleModalCenter">
                <i class="far fa-edit"></i> Sửa
                </button>';
            })
            ->addColumn('detele', function ($postCategory) {
                return ' <button type="button" onclick="delele(' . $postCategory->id . ')" class="btn btn-block bg-danger btn-flat">
                <i class="fas fa-trash"></i> Xóa
                </button>';
            })
            ->rawColumns(['edit', 'detele'])
            ->make(true);
    }

    public function getLimitCategory($limit)
    {
        return $this->model->select('id', 'category_name', 'slug')
            ->orderBy('sort_order', 'asc')
            ->limit($limit)
            ->get();
    }
}
