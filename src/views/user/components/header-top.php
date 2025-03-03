<?php
$cart = isset($_COOKIE["cart"]) ? json_decode($_COOKIE["cart"]) : [];
$total_price = 0;

foreach ($cart as $item) {
    $total_price += $item->price * $item->quantity;
}
?>

<div class="header__top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header__top__inner">
                    <div class="header__top__left">
                        <ul>
                            <?php if ($user && ($user['role'] === 'manager' || $user['role'] === 'admin')): ?>
                                <li>
                                    <?php pk_route_path('/admin', "target = '_blank'") ?>
                                    <i class="fa-solid fa-screwdriver-wrench"
                                        style="font-size:26px; color:black; vertical-align: middle; margin-right: 15px;"></i>
                                    DashBoard
                                    <?php pk_end_route_path(); ?>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="header__logo">
                        <a href="/"><img src="/../resources/user/img/logo.png" alt=""></a>
                    </div>
                    <div class="header__top__right">
                        <div class="header__top__right__links">
                            <?php if ($user !== null): ?>
                                <?php pk_route_path("/profile/" . $user['id']); ?>
                                <i class="fa-regular fa-user"
                                    style="margin-top: 5px; font-size:25px; color:black; vertical-align: middle;"></i>
                                <?php pk_end_route_path(); ?>
                                <?php pk_route_path('/logout'); ?>
                                <i class="fa-solid fa-right-from-bracket"
                                    style="margin-top: 5px; font-size:25px; color:black; vertical-align: middle;"></i>
                                <?php pk_end_route_path(); ?>
                            <?php else: ?>
                                <?php pk_route_path('/login'); ?>
                                <i class="fa-regular fa-user"
                                    style="margin-top: 5px; font-size:25px; color:black; vertical-align: middle;"></i>
                                <?php pk_end_route_path(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="header__top__right__cart">
                            <?php pk_route_path('/cart'); ?>
                            <?php
                            $cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
                            $cart = json_decode($cart);
                            ?>
                            <img src="/../resources/user/img/icon/cart.png" alt=""> <span
                                style="font-size: 14px; top: 50%; left:50%; transform: translate(-50%, -28%);"><?php echo count($cart) ?></span>
                            <?php pk_end_route_path(); ?>
                            <div class="cart__price">Cart:
                                <span>$<?= number_format($total_price, 2) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</div>