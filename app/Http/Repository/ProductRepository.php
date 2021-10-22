<?php

namespace App\Http\Repository;

use App\Base\EloquentRepository;
use App\Models\Brand;
use App\Models\ProductCategory;
use App\Models\Product;
use Yajra\Datatables\Datatables;

class ProductRepository extends EloquentRepository
{

    protected $model;
    protected $productCategory;
    protected $brand;

    public function __construct(
        Product $model,
        ProductCategory $productCategory,
        Brand $brand
    ) {
        $this->model = $model;
        $this->productCategory = $productCategory;
        $this->brand = $brand;
    }

    public function getAll()
    {
        $product = $this->model
            ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select(
                'products.id',
                'products.thumbnail',
                'products.product_name',
                'products.product_code',
                'product_categories.category_name',
                'brands.brand_name',
                'products.price',
                'products.discount',
                'products.quantity',
                'products.quantity_sold',
                'products.number_favorites',
                'products.sort_order',
                'products.status'
            )
            ->orderBy('products.created_at', 'desc')
            ->get();
        return Datatables::of($product)
            ->addIndexColumn()
            ->editColumn('price', function ($product) {
                return number_format($product->price) . 'đ';
            })
            ->editColumn('discount', function ($product) {
                if ($product->discount == null) {
                    $discount = '';
                } else {
                    $discount = number_format($product->discount) . 'đ';
                }
                return  $discount;
            })
            ->editColumn('status', function ($slide) {
                if ($slide->status == 'on') {
                    $html = '<span class="badge badge-pill badge-success">Hiện</span>';
                } else {
                    $html = '<span class="badge badge-pill badge-danger">Ẩn</span>';
                }

                return $html;
            })
            ->addColumn('edit', function ($product) {
                return ' <button type="button" onclick="edit(' . $product->id . ')" data-toggle="modal" data-target=".bd-example-modal-lg"
                class="btn btn-block btn-primary btn-flat">
                <i class="far fa-edit"></i> Sửa
                </button>';
            })
            ->addColumn('detele', function ($product) {
                return ' <button type="button" onclick="delele(' . $product->id . ')" class="btn btn-block bg-danger btn-flat">
                <i class="fas fa-trash"></i> Xóa
                </button>';
            })
            ->rawColumns(['price', 'discount', 'status', 'edit', 'detele'])
            ->make(true);
    }

    public function findById($id)
    {
        return $this->model
            ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select(
                'products.id',
                'products.thumbnail',
                'products.images',
                'products.product_name',
                'products.product_code',
                'product_categories.category_name',
                'products.category_id',
                'brands.brand_name',
                'brands.logo',
                'products.brand_id',
                'products.price',
                'products.discount',
                'products.quantity',
                'products.sort_order',
                'products.slug',
                'products.status',
                'products.content',
                'products.short_description',
                'products.color',
                'products.size'


            )
            ->where('products.id', $id)
            ->first();
    }

    public function getAllProductCategory($request)
    {

        $product_category = $this->productCategory->select('id', 'category_name');

        $productCategory = $request->q != null
            ? $product_category->where('category_name', 'like', '%' . $request->q . '%')
            : $product_category;

        return $productCategory->paginate(15, ['id', 'category_name'], 'page', $request->page)->toArray();
    }

    public function getAllBrand($request)
    {

        $brand = $this->brand->select('id', 'brand_name', 'logo');

        $brand = $request->q != null
            ? $brand->where('brand_name', 'like', '%' . $request->q . '%')
            : $brand;

        return $brand->paginate(15, ['id', 'brand_name', 'logo'], 'page', $request->page)->toArray();
    }

    public function getSellingProducts($limit)
    {
        return $this->model
            ->select(
                'id',
                'thumbnail',
                'product_name',
                'price',
                'discount',
                'quantity',
            )
            ->where('status', 'on')
            ->where('quantity_sold', '>', 1)
            ->orderBy('quantity_sold', 'asc')
            ->limit($limit)
            ->get();
    }

    public function getProductOfCategory($id)
    {
        return $this->model
            ->select(
                'id',
                'thumbnail',
                'product_name',
                'price',
                'discount',
                'quantity',
                'slug',
            )
            ->where('category_id', $id)
            ->where('status', 'on')
            ->paginate(9);
    }

    public function details($id)
    {
        return $this->model
            ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select(
                'products.id',
                'products.thumbnail',
                'products.images',
                'products.product_name',
                'products.product_code',
                'product_categories.category_name',
                'product_categories.slug as category_slug',
                'products.category_id',
                'brands.brand_name',
                'brands.logo',
                'products.brand_id',
                'products.price',
                'products.discount',
                'products.quantity',
                'products.sort_order',
                'products.slug',
                'products.status',
                'products.content',
                'products.short_description',
                'products.color',
                'products.size'
            )
            ->where('products.id', $id)
            ->where('status', 'on')
            ->first();
    }

}
