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
        <h1>Create Product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item"><a href="/products">Products</a></li>
                <li class="breadcrumb-item active">Create Product</li>
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
                        // dd($data['categories'][0]['name']);
                        // die();
                        ?>
                        <form method="POST" action="/admin/products/store" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="productName" class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="productName" name="name">
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
                                        rows="4"></textarea>
                                    <?php if (isset($errors[0]['description'])): ?>
                                        <div class="errors-validate">
                                            <?= $errors[0]['description'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="productPrice" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="productPrice" name="price"
                                            step="0.01">

                                    </div>
                                    <?php if (isset($errors[0]['price'])): ?>
                                        <div class="errors-validate">
                                            <?= $errors[0]['price'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="productCategory" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="productCategory" name="category">

                                        <?php if (isset($data['categories']) && !empty($data['categories'])): ?>
                                            <?php foreach ($data['categories'] as $index => $category): ?>
                                                <option value="<?= $category['id'] . "_" . $category['name'] ?>" <?= $index === 0 ? 'selected' : '' ?>>
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
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="productStock" class="col-sm-2 col-form-label">Stock Quantity</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="productStock" name="stock">
                                    <?php if (isset($errors[0]['stock'])): ?>
                                        <div class="errors-validate">
                                            <?= $errors[0]['stock'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>



                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary me-2" name="submit">Create
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

<?php
include __DIR__ . '/../components/foot.php';
?>