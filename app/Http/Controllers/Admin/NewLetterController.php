<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\Admin\NewLetterService;

class NewLetterController extends Controller
{
    private $newLetterService;

    public function __construct(NewLetterService $newLetterService)
    {
        $this->newLetterService = $newLetterService;
    }

    public function index()
    {
        return view('admin.newsLetter.index');
    }

    public function getAll()
    {
        return $this->newLetterService->getAll();
    }

    public function delete($id)
    {
        if ($this->newLetterService->delete($id)) {
            return true;
        }
        return false;
    }
}
