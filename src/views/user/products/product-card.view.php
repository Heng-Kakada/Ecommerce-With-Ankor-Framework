<div class="row">
    <?php for ($i = 1; $i <= 12; $i++): ?>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="<?= $product['img'] ?>">
                    <div class="product__label">
                        <span><?= $product['category'] ?></span>
                    </div>
                </div>
                <div class="product__item__text">
                    <h6><a href="#"><?= $product['name'] ?></a></h6>
                    <div class="product__item__price">$<?= number_format($product['price'], 2) ?></div>
                    <div class="cart_add">
                        <a href="#">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endfor; ?>
</div>