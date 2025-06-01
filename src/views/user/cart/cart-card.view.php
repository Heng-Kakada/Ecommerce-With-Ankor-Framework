<?php
// $cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
// $cart = json_decode($cart);
?>

<?= $total = 0.0; ?>
<?php foreach ($data['cart'] as $cart): ?>
    <?php $total += $cart->price * $cart->quantity; ?>
    <tr>
        <td class="product__cart__item">
            <div class="product__cart__item__pic">

                <img src="<?= $cart->image ?>" alt="Prdocut Image" style="max-width: 100px; max-height: 100px;">

            </div>
            <div class="product__cart__item__text">
                <h6><?= $cart->name ?></h6>
                <h5>$<?= number_format($cart->price, 2) ?></h5>
            </div>
        </td>
        <td class="quantity__item">
            <div class="quantity">
                <form action="/cart/updateCart" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="total_price" value=<?= $total ?>>
                    <div class="cart-qty">
                        <input type="hidden" name="product_id" value="<?= $cart->id ?>">
                        <button type="submit" name="change_qty" value="-1" class="dec qtybtn"
                            style="border: none; background-color: inherit;">-</button>
                        <input type="text" name="quantity" value="<?= $cart->quantity ?>" readonly>
                        <button type="submit" name="change_qty" value="+1" class="inc qtybtn"
                            style="border: none; background-color: inherit;">+</button>
                    </div>
                </form>

            </div>
        </td>
        <td class="cart__price">$<?= number_format($cart->price * $cart->quantity, 2) ?></td>
        <td class="cart__close">
            <form action="/cart/deleteCart" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="product_id" value="<?= $cart->id ?>">
                <input type="hidden" name="total_price" value=<?= $total ?>>
                <button type="submit" class="delete-btn" style="border: none; background-color: inherit;">
                    <span class="icon_close"></span>
                </button>
            </form>
        </td>
    </tr>
<?php endforeach ?>