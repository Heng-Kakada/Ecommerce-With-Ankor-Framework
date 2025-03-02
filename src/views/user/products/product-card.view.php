<div class="row">
    <?php foreach ($products as $product): ?>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="product__item">
                <div class="product__item__pic set-bg"
                    data-setbg="<?= $product['image'] ?? '/../resources/user/img/shop/product-1.jpg' ?>">
                    <div class="product__label">
                        <span><?= $product['category_name'] ?? "None" ?></span>
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
    <?php endforeach; ?>
</div>