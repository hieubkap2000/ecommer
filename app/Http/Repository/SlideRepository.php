<?php

namespace App\Http\Repository;

use App\Base\EloquentRepository;
use App\Models\Slide;
use Yajra\Datatables\Datatables;

class SlideRepository extends EloquentRepository
{

    protected $model;

    public function __construct(Slide $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $slide = $this->model->select('id', 'slide_name', 'image', 'sort_order', 'status')
            ->orderBy('created_at', 'desc')
            ->get();

        return Datatables::of($slide)
            ->addIndexColumn()
            ->editColumn('status', function ($slide) {
                if ($slide->status == 'on') {
                    $html = '<span class="badge badge-pill badge-success">Hiện</span>';
                } else {
                    $html = '<span class="badge badge-pill badge-danger">Ẩn</span>';
                }

                return $html;
            })
            ->addColumn('edit', function ($slide) {
                return ' <button type="button" onclick="edit(' . $slide->id . ')" class="btn btn-block bg-primary btn-flat"
                data-toggle="modal" data-target="#exampleModalCenter">
                <i class="far fa-edit"></i> Sửa
                </button>';
            })
            ->addColumn('detele', function ($slide) {
                return ' <button type="button" onclick="delele(' . $slide->id . ')" class="btn btn-block bg-danger btn-flat">
                <i class="fas fa-trash"></i> Xóa
                </button>';
            })
            ->rawColumns(['status', 'edit', 'detele'])
            ->make(true);
    }

    public function getSlideForHome()
    {
        return $this->model->select('image')
            ->where('status', 'on')
            ->orderBy('sort_order', 'desc')
            ->get();
    }
}
