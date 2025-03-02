<?php
include __DIR__ . '/../components/header.php';
include __DIR__ . '/../components/breadcrumb.php';

// $product = [
//     'category' => 'Capcake',
//     'name' => 'PALE YELLOW SWEET',
//     'price' => 32.00,
//     'img' => '/../resources/user/img/shop/product-1.jpg'
// ];
$products = $data['products'];
?>

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <?php
        require __DIR__ . "/shop-search.view.php";

        if (isset($products)) {
            require __DIR__ . "/../products/product-card.view.php";
        } else {
            echo "<p style='text-align:center; font-size:30px' >Sorry! No Cake Available</p>";
        }
        ?>
        <div class="shop__last__option">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="shop__pagination">
                        <!-- <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><span class="arrow_carrot-right"></span></a> -->
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="shop__last__text">
                        <!-- <p>Showing 1-9 of 10 results</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->


<?php
include __DIR__ . '/../components/footer.php';
?>