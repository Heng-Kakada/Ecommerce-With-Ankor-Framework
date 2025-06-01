<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <?php if (isset($products) && !empty($products)): ?>
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
                                    <form method="post" action="/addToCart">
                                        <input type="hidden" name="product_id" min="1" value="<?= $product['id'] ?>" />
                                        <input type="hidden" name="quantity" value="1" />
                                        <a><button style="border: none; background-color: inherit;">Add to cart</button></a>
                                    </form>
                                </div>
                            </div>
                            <?php pk_end_route_path(); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            echo "<p style='text-align:center; font-size:30px'>Sorry! No Cake Available</p>";
        <?php endif; ?>
    </div>
</section>
<!-- Product Section End -->