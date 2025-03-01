<?php
require __DIR__ . '/../components/head.php';
include __DIR__ . '/../components/header.php';
include __DIR__ . '/../components/sidebar.php';
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Update Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/categories">Category</a></li>
                <li class="breadcrumb-item active">Update Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Category Information</h5>
                        <form method="POST" action="/admin/categories/edit" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="<?= $data['category']['id'] ?>">

                            <div class="row mb-3">
                                <label for="categoryName" class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="productName" name="name"
                                        value="<?= $data['category']['name'] ?>">

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
                                        rows="4"><?= $data['category']['description'] ?></textarea>

                                    <?php if (isset($errors[0]['description'])): ?>
                                        <div class="errors-validate">
                                            <?= $errors[0]['name'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary me-2">Update Category</button>
                                    <a href="/admin/categories"><button type="button"
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