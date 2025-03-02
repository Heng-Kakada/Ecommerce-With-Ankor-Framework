<?php
include __DIR__ . '/components/header.php';
use AnkorFramework\App\Http\Security\HttpSession;
$errors = HttpSession::get('errors');
HttpSession::unflash();
?>
<div id="logreg-forms">
    <form class="form-signin" method="POST" action="/login-execute">
        <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" autofocus="">
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
        <label class="pt-2">
            <input type="checkbox" name="remember"> Remember me
        </label>
        <?php if (isset($errors[0]['email'])): ?>
            <?= "<p class='text-danger' >" . $errors[0]['email'] . "</p>" ?>
        <?php endif; ?>

        <?php if (isset($errors[0]['password'])): ?>
            <?= "<p class='text-danger' >" . $errors[0]['password'] . "</p>" ?>
        <?php endif; ?>
        <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
        <a href="/forgot" id="forgot_pswd">Forgot password?</a>
        <hr>
        <p>Don't have an account!</p>
        <?php pk_route_path('/signup'); ?>
        <button class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i>
            Sign up New Account
        </button>
        <?php pk_end_route_path(); ?>
    </form>
</div>


<?php
include __DIR__ . '/components/footer.php';
?>