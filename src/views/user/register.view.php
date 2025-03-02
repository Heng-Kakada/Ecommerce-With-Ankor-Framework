<?php
include __DIR__ . '/components/header.php';
?>

<div id="logreg-forms">
    <form method="POST" action="/register" class="form-signup">
        <p style="text-align:center">Sign Up</p>
        <input type="text" id="user-name" name="username" class="form-control" placeholder="Full name">
        <input type="email" id="user-email" name="email" class="form-control" placeholder="Email address">
        <input type="password" id="user-pass" name="password" class="form-control" placeholder="Password">
        <input type="password" id="user-repeatpass" name="re-password" class="form-control"
            placeholder="Repeat Password">
        <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i> Sign Up</button>
        <a href="/login" id="cancel_signup"><i class="fas fa-angle-left"></i> Back</a>
    </form>
</div>


<?php
include __DIR__ . '/components/footer.php';
?>