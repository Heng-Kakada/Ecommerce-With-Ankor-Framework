<?php
include __DIR__ . '/../components/header.php';
include_once __DIR__ . "/../components/breadcrumb.php";
// logic
$product = $data['product'];
$related = $data['related'];

?>
<?php if (isset($product) && !empty($product)): ?>
    <!-- Shop Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__img">
                        <div class="product__details__big__img">
                            <img class="big_img" src="<?= $product['image'] ?>" alt="">
                        </div>
                        <!-- <div class="product__details__thumb">
                        <div class="pt__item active">
                            <img data-imgbigurl="img/shop/details/product-big-2.jpg"
                                src="img/shop/details/product-big-2.jpg" alt="">
                        </div>
                        <div class="pt__item">
                            <img data-imgbigurl="img/shop/details/product-big-1.jpg"
                                src="img/shop/details/product-big-1.jpg" alt="">
                        </div>
                        <div class="pt__item">
                            <img data-imgbigurl="img/shop/details/product-big-4.jpg"
                                src="img/shop/details/product-big-4.jpg" alt="">
                        </div>
                        <div class="pt__item">
                            <img data-imgbigurl="img/shop/details/product-big-3.jpg"
                                src="img/shop/details/product-big-3.jpg" alt="">
                        </div>
                        <div class="pt__item">
                            <img data-imgbigurl="img/shop/details/product-big-5.jpg"
                                src="img/shop/details/product-big-5.jpg" alt="">
                        </div>
                    </div> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <div class="product__label"><?= $product['category_name'] ?? "None" ?></div>
                        <h4><?= $product['name'] ?? "Unknown" ?></h4>
                        <h5>$<?= number_format($product['price'], 2) ?></h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore
                            et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida</p>
                        <ul>
                            <li>SKU: <span><?= $product['stock'] ?? 0 ?></span></li>
                            <li>Category: <?php pk_route_path('/categories/' . strtolower($product['category_name'])); ?>
                                <span>

                                    <?= $product['category_name'] ?? "None" ?>

                                </span><?php pk_end_route_path(); ?>
                            </li>
                        </ul>
                        <div class="product__details__option">
                        <form method="POST" action="/addToCart">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="number" name="quantity" min="1" max="<?= $product['stock']?>" value = "1" readonly>
                                </div>
                            </div>
                            
                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>" />
                                <a class="primary-btn"><button type="submit"
                                        style="border: none; background-color: inherit;">Add to cart</button></a>
                            </form>
                            <a href="#" class="heart__btn"><span class="icon_heart_alt"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product__details__tab">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                        </li>
                        <!-- <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Additional information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Previews(1)</a>
                    </li> -->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <p><?= $product['description'] ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="tab-pane" id="tabs-2" role="tabpanel">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8">
                                <p>This delectable Strawberry Pie is an extraordinary treat filled with sweet and
                                    tasty chunks of delicious strawberries. Made with the freshest ingredients, one
                                    bite will send you to summertime. Each gift arrives in an elegant gift box and
                                    arrives with a greeting card of your choice that you can personalize online!2
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-3" role="tabpanel">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8">
                                <p>This delectable Strawberry Pie is an extraordinary treat filled with sweet and
                                    tasty chunks of delicious strawberries. Made with the freshest ingredients, one
                                    bite will send you to summertime. Each gift arrives in an elegant gift box and
                                    arrives with a greeting card of your choice that you can personalize online!3
                                </p>
                            </div>
                        </div>
                    </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->
    <?php include __DIR__ . '/related-product.view.php'; ?>
<?php else: ?>
    <section class="product-details spad">
        <div class="container"></div>
        <p style='text-align:center; font-size:30px; height: 40vh;'>Sorry! No Cake Available</p>
        </div>
    </section>
<?php endif; ?>


<?php
include __DIR__ . '/../components/footer.php';
?>