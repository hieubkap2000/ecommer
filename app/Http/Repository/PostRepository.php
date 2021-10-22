<?php

namespace App\Http\Repository;

use App\Base\EloquentRepository;
use App\Models\Post;
use Yajra\Datatables\Datatables;
use App\Models\PostCategory;
use App\Models\Tag;

class PostRepository extends EloquentRepository
{

    protected $model;
    protected $postCategory;
    protected $tag;

    public function __construct(Post $model, PostCategory $postCategory, Tag $tag)
    {
        $this->model = $model;
        $this->postCategory = $postCategory;
        $this->tag = $tag;
    }

    public function getAll()
    {
        $brand = $this->model
            ->join('post_categories', 'posts.category_id', '=', 'post_categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select(
                'posts.id',
                'posts.thumbnail',
                'posts.title',
                'post_categories.category_name',
                'posts.date_of_publication',
                'posts.sort_order',
                'posts.status',
                'users.name'
            )
            ->orderBy('posts.created_at', 'desc')
            ->get();

        return Datatables::of($brand)
            ->addIndexColumn()
            ->editColumn('status', function ($slide) {
                if ($slide->status == 'on') {
                    $html = '<span class="badge badge-pill badge-success">Hiện</span>';
                } else {
                    $html = '<span class="badge badge-pill badge-danger">Ẩn</span>';
                }

                return $html;
            })
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
            ->rawColumns(['status', 'edit', 'detele'])
            ->make(true);
    }

    public function findByIdCustom($id)
    {
        $post = $this->model
            ->join('post_categories', 'posts.category_id', '=', 'post_categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select(
                'posts.id',
                'posts.thumbnail',
                'posts.title',
                'posts.category_id',
                'posts.date_of_publication',
                'posts.sort_order',
                'posts.status',
                'posts.slug',
                'posts.content',
                'posts.summary',

                'post_categories.category_name',
                'post_categories.slug as category_slug',

                'users.name',
            )
            ->where('posts.id', $id)
            ->first();

        $tag = $this->model->where('posts.id', $id)->first()->tags;

        $array = array();
        $array['post'] = $post;
        $array['tag'] = $tag;

        return $array;
    }

    public function getAllPostCategory($request)
    {

        $post_category = $this->postCategory->select('id', 'category_name');

        $postCategory = $request->q != null
            ? $post_category->where('category_name', 'like', '%' . $request->q . '%')
            : $post_category;

        return $postCategory->paginate(15, ['id', 'category_name'], 'page', $request->page)->toArray();
    }

    public function getAllTag($request)
    {

        $tags = $this->tag->select('id', 'tag_name');

        $tag = $request->q != null
            ? $tags->where('tag_name', 'like', '%' . $request->q . '%')
            : $tags;

        return $tag->paginate(15, ['id', 'tag_name'], 'page', $request->page)->toArray();
    }

    public function getPostForHome($limit)
    {
        $today = date("Y-m-d");
        return $this->model
            ->select('id', 'thumbnail', 'title', 'slug', 'summary')
            ->whereDate('date_of_publication', '<=', $today)
            ->where('status', 'on')
            ->limit($limit)
            ->orderBy('sort_order', 'asc')
            ->get();
    }

    public function getPostOfCategory($id)
    {
        $today = date("Y-m-d");
        return $this->model
            ->select('id', 'thumbnail', 'title', 'slug', 'summary', 'date_of_publication')
            ->whereDate('date_of_publication', '<=', $today)
            ->where('category_id', $id)
            ->where('status', 'on')
            ->orderBy('sort_order', 'asc')
            ->paginate(6);
    }

    public function getNewPosts($limit)
    {
        $today = date("Y-m-d");
        return $this->model
            ->select('id', 'thumbnail', 'title', 'slug', 'date_of_publication')
            ->whereDate('date_of_publication', '<=', $today)
            ->where('status', 'on')
            ->limit($limit)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
