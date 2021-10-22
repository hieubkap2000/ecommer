<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Brand;
use App\Models\ProductCategory;
use App\Models\PostCategory;
use Gloudemans\Shoppingcart\Facades\Cart;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RepositoryInterface::class, EloquentRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('web.layouts.header', function ($view) {
            $quantity = Cart::count();
            $view->with('quantity', $quantity);
        });

        view()->composer('*', function ($view) {
            $productCategory = ProductCategory::select('id', 'category_name', 'slug')
                ->orderBy('sort_order', 'asc')
                ->limit(5)
                ->get();
            $view->with('productCategory', $productCategory);
        });

        view()->composer('*', function ($view) {
            $postCategory = PostCategory::select('id', 'category_name', 'slug')
                ->orderBy('sort_order', 'asc')
                ->limit(5)
                ->get();
            $view->with('postCategory', $postCategory);
        });

        view()->composer('web.elements.brand', function ($view) {
            $brands = Brand::select('brand_name', 'logo')->get();
            $view->with('brands', $brands);
        });
    }
}
