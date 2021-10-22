<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductCategoryController as AdminProductCategoryController;
use App\Http\Controllers\Admin\PostCategoryController as AdminPostCategoryController;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\RoleController as AdminRoleController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\SlideController as AdminSlideController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\NewLetterController as AdminNewLetterController;
use App\Http\Controllers\Admin\DiscountController as AdminDiscountController;

use App\Http\Controllers\Web\HomeController as WebHomeController;
use App\Http\Controllers\Web\NewsLetterController as WebNewsLetterController;
use App\Http\Controllers\Web\ProductController as WebProductController;
use App\Http\Controllers\Web\PostController as WebPostController;
use App\Http\Controllers\Web\Auth\LoginController as WebLoginController;
use App\Http\Controllers\Web\Auth\RegisterController as WebRegisterController;
use App\Http\Controllers\Web\Auth\ResetPasswordController as WebResetPasswordController;
use App\Http\Controllers\Web\CustomerController as WebCustomerController;
use App\Http\Controllers\Web\CartController as WebCartController;
use Gloudemans\Shoppingcart\Facades\Cart;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('web.home.index');
// });

// Auth::routes();

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login/admin', [AdminLoginController::class, 'index'])->name('login');
Route::post('/login/admin/check', [AdminLoginController::class, 'login'])->name('checkLogin');
Route::get('/logout/admin', [AdminLoginController::class, 'logout'])->name('logout');
//Admin
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {
    //Product Category
    Route::get('product-category', [AdminProductCategoryController::class, 'index'])->name('product.category');
    Route::get('product-category/getAll', [AdminProductCategoryController::class, 'getAll'])->name('product.category.getAll');
    Route::post('product-category/store', [AdminProductCategoryController::class, 'store'])->name('product.category.store');
    Route::get('product-category/delete/{id}', [AdminProductCategoryController::class, 'delete'])->name('product.category.delete');
    Route::get('product-category/edit/{id}', [AdminProductCategoryController::class, 'edit'])->name('product.category.edit');
    Route::post('product-category/update/{id}', [AdminProductCategoryController::class, 'update'])->name('product.category.update');
    //Brand
    Route::get('brand', [AdminBrandController::class, 'index'])->name('brand');
    Route::get('brand/getAll', [AdminBrandController::class, 'getAll'])->name('brand.getAll');
    Route::post('brand/store', [AdminBrandController::class, 'store'])->name('brand.store');
    Route::get('brand/delete/{id}', [AdminBrandController::class, 'delete'])->name('brand.delete');
    Route::get('brand/edit/{id}', [AdminBrandController::class, 'edit'])->name('brand.edit');
    Route::post('brand/update/{id}', [AdminBrandController::class, 'update'])->name('brand.update');
    //User
    Route::get('user', [AdminUserController::class, 'index'])->name('user');
    Route::get('user/getAll', [AdminUserController::class, 'getAll'])->name('user.getAll');
    Route::post('user/store', [AdminUserController::class, 'store'])->name('user.store');
    Route::get('user/delete/{id}', [AdminUserController::class, 'delete'])->name('user.delete');
    Route::get('user/edit/{id}', [AdminUserController::class, 'edit'])->name('user.edit');
    Route::post('user/update/{id}', [AdminUserController::class, 'update'])->name('user.update');
    Route::get('user/get-role/{id}', [AdminUserController::class, 'getRole'])->name('user.getRole');
    Route::post('user/update-role/{id}', [AdminUserController::class, 'updateRole'])->name('user.updateRole');
    //Role
    Route::get('role', [AdminRoleController::class, 'index'])->name('role');
    Route::get('role/getAll', [AdminRoleController::class, 'getAll'])->name('role.getAll');
    Route::post('role/store', [AdminRoleController::class, 'store'])->name('role.store');
    Route::get('role/delete/{id}', [AdminRoleController::class, 'delete'])->name('role.delete');
    Route::get('role/edit/{id}', [AdminRoleController::class, 'edit'])->name('role.edit');
    Route::post('role/update/{id}', [AdminRoleController::class, 'update'])->name('role.update');
    Route::get('role/permission/{id}', [AdminRoleController::class, 'permission'])->name('role.permission');
    Route::post('role/permission/add/{id}', [AdminRoleController::class, 'permissionAdd'])->name('role.permission.add');
    //Product Category
    Route::get('post-category', [AdminPostCategoryController::class, 'index'])->name('post.category');
    Route::get('post-category/getAll', [AdminPostCategoryController::class, 'getAll'])->name('post.category.getAll');
    Route::post('post-category/store', [AdminPostCategoryController::class, 'store'])->name('post.category.store');
    Route::get('post-category/delete/{id}', [AdminPostCategoryController::class, 'delete'])->name('post.category.delete');
    Route::get('post-category/edit/{id}', [AdminPostCategoryController::class, 'edit'])->name('post.category.edit');
    Route::post('post-category/update/{id}', [AdminPostCategoryController::class, 'update'])->name('post.category.update');
    //Slide
    Route::get('slide', [AdminSlideController::class, 'index'])->name('slide');
    Route::get('slide/getAll', [AdminSlideController::class, 'getAll'])->name('slide.getAll');
    Route::post('slide/store', [AdminSlideController::class, 'store'])->name('slide.store');
    Route::get('slide/delete/{id}', [AdminSlideController::class, 'delete'])->name('slide.delete');
    Route::get('slide/edit/{id}', [AdminSlideController::class, 'edit'])->name('slide.edit');
    Route::post('slide/update/{id}', [AdminSlideController::class, 'update'])->name('slide.update');
    //Tag
    Route::get('tag', [AdminTagController::class, 'index'])->name('tag');
    Route::get('tag/getAll', [AdminTagController::class, 'getAll'])->name('tag.getAll');
    Route::post('tag/store', [AdminTagController::class, 'store'])->name('tag.store');
    Route::get('tag/delete/{id}', [AdminTagController::class, 'delete'])->name('tag.delete');
    Route::get('tag/edit/{id}', [AdminTagController::class, 'edit'])->name('tag.edit');
    Route::post('tag/update/{id}', [AdminTagController::class, 'update'])->name('tag.update');
    //Product
    Route::get('product', [AdminProductController::class, 'index'])->name('product');
    Route::get('product/getAll', [AdminProductController::class, 'getAll'])->name('product.getAll');
    Route::post('product/store', [AdminProductController::class, 'store'])->name('product.store');
    Route::get('product/delete/{id}', [AdminProductController::class, 'delete'])->name('product.delete');
    Route::get('product/edit/{id}', [AdminProductController::class, 'edit'])->name('product.edit');
    Route::post('product/update/{id}', [AdminProductController::class, 'update'])->name('product.update');
    Route::post('product/get-search-category', [AdminProductController::class, 'getCategory'])->name('product.get.category');
    Route::post('product/get-search-brand', [AdminProductController::class, 'getBrand'])->name('product.get.brand');
    //Slide
    Route::get('post', [AdminPostController::class, 'index'])->name('post');
    Route::get('post/getAll', [AdminPostController::class, 'getAll'])->name('post.getAll');
    Route::post('post/store', [AdminPostController::class, 'store'])->name('post.store');
    Route::get('post/delete/{id}', [AdminPostController::class, 'delete'])->name('post.delete');
    Route::get('post/edit/{id}', [AdminPostController::class, 'edit'])->name('post.edit');
    Route::post('post/update/{id}', [AdminPostController::class, 'update'])->name('post.update');
    Route::post('post/get-search-category', [AdminPostController::class, 'getCategory'])->name('post.get.category');
    Route::post('post/get-search-tag', [AdminPostController::class, 'getTag'])->name('post.get.tag');
    //NewsLetter
    Route::get('newsletter', [AdminNewLetterController::class, 'index'])->name('newsletter');
    Route::get('newsletter/getAll', [AdminNewLetterController::class, 'getAll'])->name('newsletter.getAll');
    Route::get('newsletter/delete/{id}', [AdminNewLetterController::class, 'delete'])->name('newsletter.delete');
    //Discount
    Route::get('discount', [AdminDiscountController::class, 'index'])->name('discount');
    Route::get('discount/getAll', [AdminDiscountController::class, 'getAll'])->name('discount.getAll');
    Route::post('discount/store', [AdminDiscountController::class, 'store'])->name('discount.store');
    Route::get('discount/delete/{id}', [AdminDiscountController::class, 'delete'])->name('discount.delete');
    Route::get('discount/edit/{id}', [AdminDiscountController::class, 'edit'])->name('discount.edit');
    Route::post('discount/update/{id}', [AdminDiscountController::class, 'update'])->name('discount.update');
});

//<!---Web---!>
Route::get('/', [WebHomeController::class, 'index'])->name('home');
Route::post('register/newsletter', [WebNewsLetterController::class, 'store'])->name('newsletter.store');

Route::get('danh-muc-san-pham/{slug}/{id}', [WebProductController::class, 'category'])->name('web.productCategory');
Route::get('san-pham/{slug}/{id}', [WebProductController::class, 'details'])->name('web.product.details');

Route::get('danh-muc-bai-viet/{slug}/{id}', [WebPostController::class, 'category'])->name('web.postCategory');
Route::get('bai-viet/{slug}/{id}', [WebPostController::class, 'details'])->name('web.post.details');

Route::get('khach-hang/dang-nhap', [WebLoginController::class, 'index'])->name('customer.login');
Route::post('khach-hang/dang-nhap', [WebLoginController::class, 'login'])->name('customer.login');
Route::get('khach-hang/dang-xuat', [WebLoginController::class, 'logout'])->name('customer.logout');

Route::get('khach-hang/dang-ki', [WebRegisterController::class, 'index'])->name('customer.register');
Route::post('khach-hang/dang-ki', [WebRegisterController::class, 'register']);

Route::get('khach-hang/quen-mat-khau', [WebResetPasswordController::class, 'viewForgotPassword'])->name('customer.forgotPassword');
Route::post('khach-hang/quen-mat-khau', [WebResetPasswordController::class, 'forgotPassword']);

Route::get('khach-hang/doi-mat-khau/{username}/{token}', [WebResetPasswordController::class, 'viewResetPassword'])->name('customer.resetPassword');
Route::post('khach-hang/doi-mat-khau', [WebResetPasswordController::class, 'resetPassword']);

Route::get('khach-hang/thong-tin', [WebCustomerController::class, 'index'])->name('customer');

Route::post('them-gio-hang', [WebCartController::class, 'addToCart']);
Route::get('gio-hang-header', [WebCartController::class, 'cartHeader']);
Route::get('xem-gio-hang', [WebCartController::class, 'cart'])->name('cart');
Route::post('xem-gio-hang', [WebCartController::class, 'cart']);
Route::post('cap-nhat-gio-hang', [WebCartController::class, 'cartUpdate'])->name('cart.update');
Route::post('xoa-san-pham-gio-hang', [WebCartController::class, 'cartRemove'])->name('cart.remove');

Route::get('/xoa-gio-hang', function () {
    return Cart::destroy();
});
