<?php
use AnkorFramework\App\Http\Security\HttpSession;
$errors = HttpSession::get('errors');
HttpSession::unflash();
?>
<h1>Login Form</h1>
<form method="POST" action="/login-execute">

    <div>
        <label for="email">Email:</label>
        <input id="email" name="email">
    </div>
    <div>
        <label for="password">Password:</label>
        <input id="password" name="password">
    </div>
    <div>
        <label>
            <input type="checkbox" name="remember"> Remember me
        </label>
    </div>

    <button type="submit">Login</button>
</form>

<?php if (isset($errors[0]['email'])): ?>
    <?= $errors[0]['email'] ?>
<?php endif; ?>

<?php if (isset($errors[0]['password'])): ?>
    <?= $errors[0]['password'] ?>
<?php endif; ?>