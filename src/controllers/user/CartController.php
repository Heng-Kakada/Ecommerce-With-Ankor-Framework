<?php
namespace src\controllers\user;

use AnkorFramework\App\Http\BaseController;
use AnkorFramework\App\Http\Response;
use src\services\user\ProductService;

class CartController extends BaseController
{
    private ProductService $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    private function getCart()
    {
        return json_decode(isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]");
    }
    public function index()
    {
        $cart = $this->getCart();
        Response::view('user/cart/cart.view', ['cart' => $cart]);
    }

    public function addToCart()
    {
        $product_id = pk_request('product_id');
        $quantity = (int) pk_request('quantity');
        
        $cart = $this->checkExist($this->getCart(), $product_id, $quantity);

        setcookie("cart", json_encode($cart), time() + 86400 * 7, "/");

        Response::previousUrl();
    }
    public function updateCart()
    {
        $product_id = pk_request('product_id');
        $change_qty = pk_request('change_qty');

        $cart = $this->getCart();

        foreach ($cart as $item) {
            if ($item->id == $product_id) {
                $new_quantity = $item->quantity + (int) $change_qty;
                $item->quantity = max(1, $new_quantity);
                break;
            }
        }
        // Update cart in cookies
        setcookie("cart", json_encode($cart), time() + (86400 * 7), "/");

        Response::previousUrl();
    }

    public function deleteFromCart()
    {
        $product_id = pk_request('product_id');
        $cart = $this->getCart();

        // Filter out product with the matching ID
        $cart = array_filter($cart, function ($item) use ($product_id) {
            return $item->id != $product_id;
        });

        $cart = array_values($cart);

        setcookie("cart", json_encode($cart), time() + (86400 * 7), "/");

        Response::previousUrl();
    }
    private function getTotalPrice($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item->price * $item->quantity;
        }
        return $total;
    }

    private function checkExist($cart, $product_id, $quantity)
    {
        foreach ($cart as $item) {
            if ($item->id == $product_id) {

                $item->quantity += $quantity;
                return $cart;
            }
        }

        $product = $this->productService->getProductById($product_id);
        $product['quantity'] = $quantity;
        array_push($cart, $product);

        return $cart;
    }
}