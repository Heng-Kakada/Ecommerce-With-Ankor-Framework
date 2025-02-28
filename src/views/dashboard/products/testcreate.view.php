<?php
require __DIR__ . '/../components/head.php';
include __DIR__ . '/../components/header.php';
include __DIR__ . '/../components/sidebar.php';
?>
<main id="main" class="main">
    <button type="button" class="btn btn-primary rounded-pill mb-4" onclick="goBack()"><i
            class="bi bi-caret-left-fill"></i>Back</button>
    <div class="pagetitle">
        <h1>Create Product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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

                        <form method="POST" action="/products/store" class="needs-validation" novalidate>
                            <div class="row mb-3">
                                <label for="productName" class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="productName" name="name" required>
                                    <div class="invalid-feedback">Please enter the product name.</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="productDescription" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="productDescription" name="description"
                                        rows="4"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="productPrice" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="productPrice" name="price" step="0.01"
                                        required>
                                    <div class="invalid-feedback">Please enter the product price.</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="productCategory" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="productCategory" name="category" required>
                                        <option selected disabled value="">Choose category...</option>
                                        <option value="electronics">Electronics</option>
                                        <option value="clothing">Clothing</option>
                                        <option value="books">Books</option>
                                        <option value="accessories">Accessories</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a category.</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="productImage" class="col-sm-2 col-form-label">Product Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="productImage" name="image"
                                        accept="image/*">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="productStock" class="col-sm-2 col-form-label">Stock Quantity</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="productStock" name="stock" required>
                                    <div class="invalid-feedback">Please enter the stock quantity.</div>
                                </div>
                            </div>



                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary me-2">Create Product</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
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