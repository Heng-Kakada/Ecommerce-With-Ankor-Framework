<?php
include __DIR__ . '/head.php';
include __DIR__ . '/pre-load.php';
use AnkorFramework\App\Http\Security\HttpSession;
$user = HttpSession::get('user');
$navCat = HttpSession::get('nav-cat');
?>

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__cart">
        <div class="offcanvas__cart__links">
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
                <i class="fa-regular fa-user" style="margin-top: 5px; font-size:25px; color:black; vertical-align: middle;">
                </i>
                <?php pk_end_route_path(); ?>
            <?php endif; ?>
        </div>
        <div class="offcanvas__cart__item">
            <?php pk_route_path('/cart'); ?>
            <img src="/../resources/user/img/icon/cart.png" alt=""> <span>0</span>
            <?php pk_end_route_path(); ?>
            <div class="cart__price">Cart: <span>$0.00</span></div>
        </div>
    </div>
    <div class="offcanvas__logo">
        <a href="/"><img src="/../resources/user/img/logo.png" alt=""></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__option">
        <ul>
            <?php if ($user && ($user['role'] === 'manager' || $user['role'] === 'admin')): ?>
                <li>
                    <?php pk_route_path('/admin') ?>
                    <i class="fa-solid fa-screwdriver-wrench"
                        style="font-size:26px; color:black; vertical-align: middle; margin-right: 15px;"></i>
                    DashBoard
                    <?php pk_end_route_path(); ?>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <?php require_once __DIR__ . "/header-top.php" ?>
    <?php require_once __DIR__ . "/nav.php" ?>
</header>
<!-- Header Section End -->