<?php

namespace App\Http\Service\Web;

use App\Base\BaseService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Repository\ProductRepository;
use App\Http\Repository\DiscountRepository;

class CartService extends BaseService
{

    private $productRepository;
    private $cart;
    private $discountRepository;

    public function __construct(
        ProductRepository $productRepository,
        Cart $cart,
        DiscountRepository $discountRepository
    ) {

        $this->productRepository = $productRepository;
        $this->cart = $cart;
        $this->discountRepository = $discountRepository;
        $this->cart::setGlobalTax(1);
    }

    public function addToCart($entity)
    {
        try {
            $this->cart::add(
                [
                    'id'      => $entity['product_id'],
                    'name'    => $entity['product_name'],
                    'qty'     => $entity['qty'],
                    'price'   => $entity['price'],
                    'weight'  => 0,
                    'options' => [
                        'thumbnail' => $entity['thumbnail'],
                        'size'      => $entity['size'],
                        'color'     => $entity['color'],
                    ]
                ]
            );
            return $this->cart::count();
        } catch (\Throwable $th) {
            return false;
            throw $th;
        }
    }


    public function cart()
    {
        try {
            return $this->cart::content();
        } catch (\Throwable $th) {
            return false;
            throw $th;
        }
    }

    public function cartUpdate($request)
    {
        $message = array();
        $product = $this->productRepository->findById($request->id_product);

        if ((int)$request->quantity == 0) {
            $message['message'] = 'Số lượng không thể bằng 0.';
            $message['type'] = 'error';
        } elseif ((int)$request->quantity > (int)$product->quantity) {
            $message['message'] = 'Số lượng vượt quá lượng sản phẩm trong kho.';
            $message['type'] = 'error';
        } else {
            $this->cart::update($request->id_cart, $request->quantity);
            $message['message'] = 'Cập nhật số lượng thành công.';
            $message['type'] = 'success';
        }

        return $message;
    }

    public function cartRemove($request)
    {
        $message = array();

        try {
            $this->cart::remove($request->id_cart);
            $message['message'] = 'Xóa sản phẩm thành công.';
            $message['type'] = 'success';
        } catch (\Throwable $th) {
            $message['message'] = 'Không thể xóa sản phẩm.';
            $message['type'] = 'error';
        }

        return $message;
    }
}
