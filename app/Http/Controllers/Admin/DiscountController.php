<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\Admin\DiscountService;
use App\Http\Requests\DiscountRequest;

class DiscountController extends Controller
{
    private $discountService;

    public function __construct(DiscountService $discountService)
    {
        $this->discountService = $discountService;
    }

    public function index()
    {
        return view('admin.discount.index');
    }

    public function getAll()
    {
        return $this->discountService->getAll();
    }

    public function store(DiscountRequest $request)
    {
        if ($this->discountService->create($request->all())) {
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        if ($this->discountService->delete($id)) {
            return true;
        }
        return false;
    }

    public function edit($id)
    {
        return $this->discountService->edit($id);
    }

    public function update($id, DiscountRequest $request)
    {
        if ($this->discountService->update($id, $request->all())) {
            return true;
        }
        return false;
    }
}
