<?php for ($i = 1; $i <= 5; $i++): ?>
    <tr>
        <td class="product__cart__item">
            <div class="product__cart__item__pic">

                <img src="<?= $product['img'] ?>" alt="">

            </div>
            <div class="product__cart__item__text">
                <h6><?= $product['name'] ?></h6>
                <h5>$<?= number_format($product['price'], 2) ?></h5>
            </div>
        </td>
        <td class="quantity__item">
            <div class="quantity">
                <div class="pro-qty">
                    <input type="text" value="1">
                </div>
            </div>
        </td>
        <td class="cart__price">$30.00</td>
        <td class="cart__close"><span class="icon_close"></span></td>
    </tr>
<?php endfor ?>