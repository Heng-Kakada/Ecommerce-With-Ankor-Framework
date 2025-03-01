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

                        <form method="POST" action="/products/update" class="needs-validation" novalidate enctype="multipart/form-data">
                            <input type="hidden" name="id" value="1">
                            
                            <div class="row mb-3">
                                <label for="productName" class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="productName" name="name" 
                                           value="Wireless Noise Cancelling Headphones" required>
                                    <div class="invalid-feedback">Please enter the product name.</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="productDescription" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="productDescription" name="description" 
                                              rows="4">Premium wireless headphones with advanced noise cancellation technology, crystal clear sound, and 30-hour battery life. Comfort meets high-performance audio.</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="productPrice" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="productPrice" name="price" 
                                               step="0.01" value="249.99" required>
                                    </div>
                                    <div class="invalid-feedback">Please enter the product price.</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="productCategory" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="productCategory" name="category" required>
                                        <option value="">Choose category...</option>
                                        <option value="electronics" selected>Electronics</option>
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
                                    <div class="mt-2">
                                        <img src="/../dashboard/assets/img/product-1.jpg" alt="Current Product Image" 
                                             style="max-width: 200px; max-height: 200px;">
                                        <input type="hidden" name="current_image" value="">
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
                                           value="75" required>
                                    <div class="invalid-feedback">Please enter the stock quantity.</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary me-2">Update Product</button>
                                    <a href="/admin/products"><button type="button" class="btn btn-secondary">Cancel</button></a>
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