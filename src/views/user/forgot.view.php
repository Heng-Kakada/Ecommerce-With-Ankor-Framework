<?php
include __DIR__ . '/components/header.php';
?>

<div id="logreg-forms">
    <form action="/reset/password/" class="form-reset">
        <input type="email" id="resetEmail" class="form-control" placeholder="Email address" required="" autofocus="">
        <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
        <a href="/login" id="cancel_reset"><i class="fas fa-angle-left"></i> Back</a>
    </form>
</div>


<?php
include __DIR__ . '/components/footer.php';
?>