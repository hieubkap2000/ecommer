<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SlideRequest;
use App\Http\Service\Admin\SlideService;

class SlideController extends Controller
{
    private $slideService;

    public function __construct(SlideService $slideService)
    {
        $this->slideService = $slideService;
    }

    public function index()
    {
        return view('admin.slide.index');
    }

    public function getAll()
    {
        return $this->slideService->getAll();
    }

    public function store(SlideRequest $request)
    {
        if ($this->slideService->create($request->all())) {
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        if ($this->slideService->delete($id)) {
            return true;
        }
        return false;
    }

    public function edit($id)
    {
        return $this->slideService->edit($id);
    }

    public function update($id, SlideRequest $request)
    {
        if ($this->slideService->update($id, $request->all())) {
            return true;
        }
        return false;
    }
}
