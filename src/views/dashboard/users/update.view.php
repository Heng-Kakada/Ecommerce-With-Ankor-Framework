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
                        <h5 class="card-title">Product Information</h5>
                        <?php
                        // dd($data);
                        // dd($data['categories'])
                        // die();
                        ?>
                        <form method="POST" action="/admin/products/edit" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="<?= $data['products']['id'] ?>">

                            <div class="row mb-3">
                                <label for="productName" class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="productName" name="name"
                                        value="<?= $data['products']['name'] ?>">
                                    <?php if (isset($errors[0]['name'])): ?>
                                        <div class="errors-validate">
                                            <?= $errors[0]['name'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="productDescription" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="productDescription" name="description"
                                        rows="4"><?= $data['products']['description'] ?></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="productPrice" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="productPrice" name="price"
                                            step="0.01" value="<?= $data['products']['price'] ?>">
                                    </div>
                                    <?php if (isset($errors[0]['name'])): ?>
                                        <div class="errors-validate">
                                            <?= $errors[0]['name'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="productCategory" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="productCategory" name="category">
                                        <?php if (isset($data['categories'])): ?>
                                            <?php foreach ($data['categories'] as $category): ?>
                                                <option <?php if ($category['id'] == $data['products']['category_id'])
                                                    echo 'selected'; ?> value="<?= $category['id'] . "_" . $category['name'] ?>">
                                                    <?= $category['name'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                    <?php if (isset($errors[0]['category'])): ?>
                                        <div class="errors-validate">
                                            <?= $errors[0]['category'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="productImage" class="col-sm-2 col-form-label">Product Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="productImage" name="image"
                                        accept="image/jpg, image/png, image/jpeg">
                                    <div class="mt-2" id="imagePreview">
                                        <img id="currentImage" src="<?= $data['products']['image'] ?>"
                                            alt="Current Product Image" style="max-width: 200px; max-height: 200px;">
                                        <input type="hidden" name="image"
                                            value="<?= $data['products']['image'] ?>">
                                    </div>
                                    <small class="form-text text-muted">
                                        Leave blank to keep the current image
                                    </small>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="productStock" class="col-sm-2 col-form-label">Stock Quantity</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="productStock" name="stock"
                                        value="<?= $data['products']['stock'] ?>">
                                    <?php if (isset($errors[0]['stock'])): ?>
                                        <div class="errors-validate">
                                            <?= $errors[0]['stock'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary me-2" name="submit">Update
                                        Product</button>
                                    <a href="/admin/products"><button type="button"
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
    document.addEventListener("DOMContentLoaded", function () {
        let fileInput = document.getElementById("productImage");
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