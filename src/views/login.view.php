<?php
use AnkorFramework\App\Http\Security\HttpSession;
$errors = HttpSession::get('errors');
HttpSession::unflash();
?>
<div style="display: flex; justify-content: center;">
    <div>
        <h1>Login Form</h1>
        <form method="POST" action="/login-execute">

            <div style="margin-top: 50px;">
                <label for="email">Email:</label>
                <input id="email" name="email">
            </div>
            <div style="margin-top: 50px;">
                <label for="password">Password:</label>
                <input id="password" name="password">
            </div>
            <div style="margin-top: 50px;">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <button style="margin-top: 50px;" type="submit">Login</button>
        </form>

        <?php if (isset($errors[0]['email'])): ?>
            <?= $errors[0]['email'] ?>
        <?php endif; ?>

        <?php if (isset($errors[0]['password'])): ?>
            <?= $errors[0]['password'] ?>
        <?php endif; ?>
    </div>

</div>