<?php
use AnkorFramework\App\Http\Security\HttpSession;
$errors = HttpSession::get('errors');
HttpSession::unflash();
?>

<?php
require __DIR__ . '/../components/head.php';
include __DIR__ . '/../components/header.php';
include __DIR__ . '/../components/sidebar.php';
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Update Product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/products">Products</a></li>
                <li class="breadcrumb-item active">Update Product</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User Information</h5>
                        <?php

                        $user = $data['users'];

                        ?>
                        <form method="POST" action="/admin/users/edit" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">

                            <div class="row mb-3">
                                <label for="firstname" class="col-sm-2 col-form-label">Firstname</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="firstname" name="firstname"
                                        value="<?= $user['firstname'] ?>">
                                    <?php if (isset($errors[0]['firstname'])): ?>
                                        <div class="errors-validate">
                                            <?= $errors[0]['firstname'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="lastname" class="col-sm-2 col-form-label">Lastname</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="lastname" name="lastname"
                                        value="<?= $user['lastname'] ?>">
                                    <?php if (isset($errors[0]['lastname'])): ?>
                                        <div class="errors-validate">
                                            <?= $errors[0]['lastname'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="productStock" class="col-sm-2 col-form-label">Age</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="age" name="age"
                                        value="<?= $user['age'] ?>">
                                    <?php if (isset($errors[0]['age'])): ?>
                                        <div class="errors-validate">
                                            <?= $errors[0]['age'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="role" class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="gender" name="gender">
                                        <option value="male" <?= $user['gender'] == 'male' ? 'selected' : '' ?>>Male
                                        </option>
                                        <option value="female" <?= $user['gender'] == 'female' ? 'selected' : '' ?>>Female
                                        </option>

                                    </select>
                                    <?php if (isset($errors[0]['gender'])): ?>
                                        <div class="errors-validate">
                                            <?= $errors[0]['gender'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" minlength="3"
                                        maxlength="50" value="<?= $user['username'] ?>">
                                    <?php if (isset($errors[0]['username'])): ?>
                                        <div class="errors-validate">
                                            <?= $errors[0]['username'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="<?= $user['email'] ?>">
                                    <?php if (isset($errors[0]['email'])): ?>
                                        <div class="errors-validate">
                                            <?= $errors[0]['email'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="new_password"
                                            minlength="8">
                                        <button class="btn btn-outline-secondary toggle-password" type="button"
                                            tabindex="-1" data-target="password">
                                            <i class="bi bi-eye"></i>
                                        </button>

                                    </div>
                                    <small class="form-text text-muted">
                                        Leave blank to keep the current password
                                    </small>
                                    <?php if (isset($errors[0]['password'])): ?>
                                        <div class="errors-validate">
                                            <?= $errors[0]['password'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="confirm_password"
                                            name="confirm_password">
                                        <button class="btn btn-outline-secondary toggle-password" type="button"
                                            tabindex="-1" data-target="confirm_password">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                    <small class="form-text text-muted">
                                        Leave blank to keep the current password
                                    </small>
                                    <?php if (isset($errors[0]['confirm_password'])): ?>
                                        <div class="errors-validate">
                                            <?= $errors[0]['confirm_password'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="userImage" class="col-sm-2 col-form-label">User Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="userImage" name="image"
                                        accept="image/jpg, image/png, image/jpeg">
                                    <div class="mt-2" id="imagePreview">
                                        <img id="currentImage" src="<?= $user['image'] ?>" alt="Current Product Image"
                                            style="max-width: 200px; max-height: 200px;">
                                        <input type="hidden" name="image" value="<?= $user['image'] ?>">
                                    </div>
                                    <small class="form-text text-muted">
                                        Leave blank to keep the current image
                                    </small>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="role" class="col-sm-2 col-form-label">User Role</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="role" name="role">
                                        <?php if (isset($data['roles']) && !empty($data['roles'])): ?>
                                            <?php foreach ($data['roles'] as $index => $role): ?>
                                                <option value="<?= $role['id'] . "_" . $role['name'] ?>"
                                                    <?= $role['id'] === $user['role_id'] ? 'selected' : '' ?>>
                                                    <?= $role['name'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                    <?php if (isset($errors[0]['roles'])): ?>
                                        <div class="errors-validate">
                                            <?= $errors[0]['roles'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>



                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary me-2">Update
                                        User</button>
                                    <a href="/admin/users"><button type="button"
                                            class="btn btn-secondary">Cancel</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>

    // toggle password
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm_password');

        // Password visibility toggle
        document.querySelectorAll('.toggle-password').forEach(toggle => {
            toggle.addEventListener('click', function () {
                const targetId = this.getAttribute('data-target');
                const targetInput = document.getElementById(targetId);
                const icon = this.querySelector('i');

                if (targetInput.type === 'password') {
                    targetInput.type = 'text';
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                } else {
                    targetInput.type = 'password';
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                }
            });
        });

    });

    document.addEventListener("DOMContentLoaded", function () {
        // preview image change
        let fileInput = document.getElementById("userImage");
        let currentImage = document.getElementById("currentImage");
        let imagePreviewContainer = document.getElementById("imagePreview");

        fileInput.addEventListener("change", function (event) {
            if (event.target.files.length > 0) {
                // Hide the current image
                if (currentImage) {
                    currentImage.style.display = "none";
                }

                // Check if a new preview already exists
                let newImage = document.getElementById("newImagePreview");
                if (!newImage) {
                    newImage = document.createElement("img");
                    newImage.id = "newImagePreview";
                    newImage.style.maxWidth = "200px";
                    newImage.style.maxHeight = "200px";
                    newImage.style.marginTop = "10px";
                    imagePreviewContainer.appendChild(newImage);
                }

                // Read the new image and set it as preview
                let reader = new FileReader();
                reader.onload = function (e) {
                    newImage.src = e.target.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            } else {
                // Show the current image if no new file is selected
                if (currentImage) {
                    currentImage.style.display = "block";
                }

                // Remove the new preview if the file is cleared
                let newImage = document.getElementById("newImagePreview");
                if (newImage) {
                    newImage.remove();
                }
            }
        });
    });
</script>

<?php
include __DIR__ . '/../components/foot.php';
?>