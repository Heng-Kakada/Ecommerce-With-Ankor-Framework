<?php
include __DIR__ . '/components/header.php';
use AnkorFramework\App\Http\Security\HttpSession;
$errors = HttpSession::get('errors');
HttpSession::unflash();
?>

<div id="logreg-forms">
    <form method="POST" action="/register" class="form-signup">
        <p style="text-align:center">Sign Up</p>
        <input type="text" id="user-name" name="username" class="form-control" placeholder="Full name">
        <?php if (isset($errors[0]['username'])): ?>
            <?= "<p class='text-danger' >" . $errors[0]['username'] . "</p>" ?>
        <?php endif; ?>
        <input type="email" id="user-email" name="email" class="form-control" placeholder="Email address">
        <?php if (isset($errors[0]['email'])): ?>
            <?= "<p class='text-danger' >" . $errors[0]['email'] . "</p>" ?>
        <?php endif; ?>
        <input type="password" id="user-pass" name="password" class="form-control" placeholder="Password">
        <?php if (isset($errors[0]['password'])): ?>
            <?= "<p class='text-danger' >" . $errors[0]['password'] . "</p>" ?>
        <?php endif; ?>
        <input type="password" id="user-repeatpass" name="re-password" class="form-control"
            placeholder="Repeat Password">
        <?php if (isset($errors[0]['confirm_password'])): ?>
            <?= "<p class='text-danger' >" . $errors[0]['confirm_password'] . "</p>" ?>
        <?php endif; ?>
        <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i> Sign Up</button>

        <a href="/login" id="cancel_signup"><i class="fas fa-angle-left"></i> Back</a>
    </form>
</div>


<?php
include __DIR__ . '/components/footer.php';
?>