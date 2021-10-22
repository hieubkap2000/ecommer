<?php

namespace App\Http\Repository;

use App\Base\EloquentRepository;
use App\Models\ProductCategory;
use Yajra\Datatables\Datatables;

class ProductCategoryRepository extends EloquentRepository
{

    protected $model;

    public function __construct(ProductCategory $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $productCategory = $this->model->select('id', 'category_name', 'sort_order')
            ->orderBy('created_at', 'desc')
            ->get();
        return Datatables::of($productCategory)
            ->addIndexColumn()
            ->addColumn('edit', function ($productCategory) {
                return ' <button type="button" onclick="edit(' . $productCategory->id . ')" class="btn btn-block bg-primary btn-flat"
                data-toggle="modal" data-target="#exampleModalCenter">
                <i class="far fa-edit"></i> Sửa
                </button>';
            })
            ->addColumn('detele', function ($productCategory) {
                return ' <button type="button" onclick="delele(' . $productCategory->id . ')" class="btn btn-block bg-danger btn-flat">
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
