<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <nav class="header__menu mobile-menu">
                <ul>
                    <li class="<?= pk_isCurrentUrl('/') ? 'active' : '' ?>"> <a href="/">Home</a></li>
                    <li class="<?= pk_isCurrentUrl('/shop') ? 'active' : '' ?>"> <a href="/shop">Shop</a>
                        <ul class="dropdown">
                            <li><a href="/categories/capcake">CapCake</a></li>
                        </ul>
                    </li>
                    <li class="<?= pk_isCurrentUrl('/about') ? 'active' : '' ?>"> <a href="/about">About</a></li>
                    <li class="<?= pk_isCurrentUrl('/contact') ? 'active' : '' ?>"> <a href="/contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>