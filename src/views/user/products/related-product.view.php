<!-- Related Products Section Begin -->
<section class="related-products spad">
    <div class="container">
        <?php if (isset($related) && !empty($related)): ?>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="related__products__slider owl-carousel">
                    <?php foreach ($related as $item): ?>
                        <div class="col-lg-3">
                            <?php pk_route_path('/product/' . $item['id']) ?>
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?= $item['image'] ?>">
                                    <div class="product__label">

                                        <span><?= $product['category_name'] ?? "None" ?></span>

                                    </div>
                                </div>
                                <div class="product__item__text">
                                    <h6><?= $item['name'] ?></h6>
                                    <div class="product__item__price">$<?= number_format($product['price'], 2) ?></div>
                                    <div class="cart_add">
                                        <a href="#">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <?php pk_end_route_path(); ?>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- Related Products Section End -->