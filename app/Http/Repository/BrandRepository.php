<?php

namespace App\Http\Repository;

use App\Base\EloquentRepository;
use App\Models\Brand;
use Yajra\Datatables\Datatables;

class BrandRepository extends EloquentRepository
{

    protected $model;

    public function __construct(Brand $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $brand = $this->model->select('id', 'brand_name', 'logo')
            ->orderBy('created_at', 'desc')
            ->get();

        return Datatables::of($brand)
            ->addIndexColumn()
            ->addColumn('edit', function ($brand) {
                return ' <button type="button" onclick="edit(' . $brand->id . ')" class="btn btn-block bg-primary btn-flat"
                data-toggle="modal" data-target="#exampleModalCenter">
                <i class="far fa-edit"></i> Sửa
                </button>';
            })
            ->addColumn('detele', function ($brand) {
                return ' <button type="button" onclick="delele(' . $brand->id . ')" class="btn btn-block bg-danger btn-flat">
                <i class="fas fa-trash"></i> Xóa
                </button>';
            })
            ->rawColumns(['edit', 'detele'])
            ->make(true);
    }
}
