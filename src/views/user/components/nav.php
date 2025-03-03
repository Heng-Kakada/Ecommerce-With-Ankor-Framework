<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <nav class="header__menu mobile-menu">
                <ul>
                    <li class="<?= pk_isCurrentUrl('/') ? 'active' : '' ?>"> <a href="/">Home</a></li>
                    <li class="<?= pk_isCurrentUrl('/shop') ? 'active' : '' ?>"> <a href="/shop">Shop</a>
                        <?php if (isset($navCat) && !empty($navCat)): ?>
                            <ul class="dropdown">
                                <?php foreach ($navCat as $k => $v): ?>
                                    <li><a href="/categories/<?= strtolower($v['name']) ?>"><?= $v['name'] ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                    <li class="<?= pk_isCurrentUrl('/about') ? 'active' : '' ?>"> <a href="/about">About</a></li>
                    <li class="<?= pk_isCurrentUrl('/contact') ? 'active' : '' ?>"> <a href="/contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>