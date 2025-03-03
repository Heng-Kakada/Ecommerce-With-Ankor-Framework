<?php 
// foreach($data['cart'] as $cart)
// {
//     echo $cart->id . " " . $cart->name;
// }
// dd($data['cart']);
// die(); ?>

<?php
include __DIR__ . '/../components/header.php';
include __DIR__ . '/../components/breadcrumb.php';


$product = [
    'category' => 'Capcake',
    'name' => 'PALE YELLOW SWEET',
    'price' => 32.00,
    'img' => '/../resources/user/img/shop/cart/cart-1.jpg'
];

?>


<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                       
                            <?php require __DIR__ . '/cart-card.view.php'; ?>

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="/shop">Continue Shopping</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">
                            <!-- <a href="#"><i class="fa fa-spinner"></i>Update cart</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Coupon code">
                        <button type="submit">Apply</button>
                    </form>
                </div>
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>$ <?= number_format($total_price, 2) ?></span></li>
                        <li>Total <span>$ <?= number_format($total_price, 2) ?></span></li>
                    </ul>
                    <a href="#" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->



<?php
include __DIR__ . '/../components/footer.php';
?>