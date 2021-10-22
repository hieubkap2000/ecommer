<?php

namespace App\Http\Repository;

use App\Base\EloquentRepository;
use App\Models\Discount;
use Yajra\Datatables\Datatables;

class DiscountRepository extends EloquentRepository
{

    protected $model;

    public function __construct(Discount $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $discount = $this->model->select('id', 'discount_code', 'discount_price')
            ->orderBy('created_at', 'desc')
            ->get();

        return Datatables::of($discount)
            ->addIndexColumn()
            ->editColumn('discount_price', function ($discount) {
                return number_format($discount->discount_price) . 'đ';
            })
            ->addColumn('edit', function ($discount) {
                return ' <button type="button" onclick="edit(' . $discount->id . ')" class="btn btn-block bg-primary btn-flat"
                data-toggle="modal" data-target="#exampleModalCenter">
                <i class="far fa-edit"></i> Sửa
                </button>';
            })
            ->addColumn('detele', function ($discount) {
                return ' <button type="button" onclick="delele(' . $discount->id . ')" class="btn btn-block bg-danger btn-flat">
                <i class="fas fa-trash"></i> Xóa
                </button>';
            })
            ->rawColumns(['discount_price', 'edit', 'detele'])
            ->make(true);
    }

    public function findByDiscountCode($discountCode)
    {
        return $this->model->select('id', 'discount_code', 'discount_price')
            ->where('discount_code', $discountCode)
            ->first();
    }
}
