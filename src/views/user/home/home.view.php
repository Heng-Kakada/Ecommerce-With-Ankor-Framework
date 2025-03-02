<?php
include_once __DIR__ . '/../components/header.php';

// logic
$products = $data['products'];


// body
include_once __DIR__ . '/partials/hero.view.php';
include_once __DIR__ . '/partials/about.view.php';
include_once __DIR__ . '/partials/categories.view.php';
include_once __DIR__ . '/partials/products.view.php';
include_once __DIR__ . '/partials/class.view.php';
include_once __DIR__ . '/partials/team.view.php';
include_once __DIR__ . '/partials/testimonial.view.php';
include_once __DIR__ . '/partials/instagram.view.php';

// end body
include_once __DIR__ . '/../components/footer.php';
?>