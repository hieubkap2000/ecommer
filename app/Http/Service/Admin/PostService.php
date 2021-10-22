<?php

namespace App\Http\Service\Admin;

use App\Base\BaseService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Repository\PostRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PostService extends BaseService
{

    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function create($entity)
    {

        try {
            DB::beginTransaction();
            $entity['date_of_publication'] = Carbon::parse($entity['date_of_publication'])->format('Y-m-d H:i:s');
            $entity['user_id'] = Auth::id();
            $post = $this->postRepository->create($entity);
            $this->syncTag($post, $entity['tag_id']);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            return false;
        }
    }

    public function getAll()
    {
        return $this->postRepository->getAll();
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $entity = $this->postRepository->findById($id);
            $entity->tags()->detach();
            $this->postRepository->delete($entity);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }

    public function edit($id)
    {
        return $this->postRepository->findByIdCustom($id);
    }

    public function update($id, $entity)
    {
        try {
            DB::beginTransaction();

            $model = $this->postRepository->findById($id);
            $entity['date_of_publication'] = Carbon::parse($entity['date_of_publication'])->format('Y-m-d H:i:s');
            $entity['user_id'] = $model->user_id;

            $this->postRepository->update($model, $entity);

            $this->syncTag($model, $entity['tag_id']);

            DB::commit();
            return true;
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            return false;
        }
    }

    public function getAllPostCategory($request)
    {
        try {
            DB::beginTransaction();
            $postCategory = $this->postRepository->getAllPostCategory($request);
            DB::commit();
            return $postCategory;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }

    public function getAllTag($request)
    {
        try {
            DB::beginTransaction();
            $tag = $this->postRepository->getAllTag($request);
            DB::commit();
            return $tag;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }
    public function syncTag($post, array $tags)
    {
        try {
            DB::beginTransaction();
            //convert array string to array int
            $tags = array_map('intval', $tags);
            $post->tags()->sync($tags);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }
}
