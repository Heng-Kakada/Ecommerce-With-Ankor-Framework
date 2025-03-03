<div class="row">
    <?php foreach ($products as $product): ?>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="product__item">
                <?php pk_route_path("/product/" . $product['id']); ?>
                <div class="product__item__pic set-bg"
                    data-setbg="<?= $product['image'] ?? '/../resources/user/img/shop/product-1.jpg' ?>">
                    <div class="product__label">
                        <span><?= $product['category_name'] ?? "None" ?></span>
                    </div>
                </div>
                <div class="product__item__text">
                    <h6><?= $product['name'] ?></h6>
                    <div class="product__item__price">$<?= number_format($product['price'], 2) ?></div>
                    <div class="cart_add">
                        <form method="post" action="/addToCard">
                            <input type="hidden" name="addtocart" value="<?= $product['category_name'] ?>" />
                            <a><button style="border: none; background-color: inherit;">Add to cart</button></a>
                        </form>
                    </div>
                </div>
                <?php pk_end_route_path(); ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>