<?php
include __DIR__ . '/../components/head.php';
include __DIR__ . '/../components/header.php';
include __DIR__ . '/../components/sidebar.php';
include __DIR__ . '/upload.php';
?>


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Products</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center card-title">
                            <h5>Product List</h5>
                            <a href="products/create" class="btn btn-primary btn-sm">
                                <i class="bi bi-plus-circle me-1"></i> Add New Product
                            </a>
                        </div>

                        <table class="table table-hover" style="vertical-align: middle;">
                            <!-- if wanted to get sorting in every column use 'table datatable' instead-->
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($data['products'])): ?>
                                    <?php foreach ($data['products'] as $product): ?>
                                        <tr>
                                            <th scope="row"><?= $product['id'] ?></th>
                                            <td>
                                                <img src="<?= $product['image'] ?>" alt="Product"
                                                    class="img-fluid rounded" style="max-width: 100px;">
                                            </td>
                                            <td><?= $product['id'] ?></td> <!--name-->
                                            <td><?= $product['category'] ?></td> <!--category-->
                                            <td><?= $product['price'] ?></td> <!--price-->
                                            <td><?= $product['stock'] ?></td> <!--stock-->
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="/admin/products/edit/<?= $product['id'] ?>" class="btn btn-info btn-sm" title="Edit">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <button class="btn btn-danger btn-sm" title="Delete" data-bs-toggle="modal"
                                                        data-bs-target="#deleteProductModal" data-id = <?= $product['id'] ?>>
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <!-- <tr>
                                    <th scope="row">2</th>
                                    <td>
                                        <img src="/../dashboard/assets/img/product-2.jpg" alt="Product"
                                            class="img-fluid rounded" style="max-width: 50px;">
                                    </td>
                                    <td>Smart Watch</td>
                                    <td>Electronics</td>
                                    <td>$299.99</td>
                                    <td>25</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="/admin/products/edit" class="btn btn-info btn-sm" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm" title="Delete" data-bs-toggle="modal"
                                                data-bs-target="#deleteProductModal">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>
                                        <img src="/../dashboard/assets/img/product-3.jpg" alt="Product"
                                            class="img-fluid rounded" style="max-width: 50px;">
                                    </td>
                                    <td>Wireless Earbuds</td>
                                    <td>Electronics</td>
                                    <td>$129.99</td>
                                    <td>100</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="/admin/products/edit" class="btn btn-info btn-sm" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm" title="Delete" data-bs-toggle="modal"
                                                data-bs-target="#deleteProductModal">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- update product modal -->
    <div class="modal fade" id="updateProductModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/products/update" class="needs-validation" novalidate
                        enctype="multipart/form-data">
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
                                    <input type="number" class="form-control" id="productPrice" name="price" step="0.01"
                                        value="249.99" required>
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
                                <input class="form-control" type="file" id="productImage" name="image" accept="image/*">
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
                                <input type="number" class="form-control" id="productStock" name="stock" value="75"
                                    required>
                                <div class="invalid-feedback">Please enter the stock quantity.</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary me-2">Update Product</button>
                                <a href="/admin/products"><button type="button"
                                        class="btn btn-secondary">Cancel</button></a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger">Delete</button>
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Product Modal -->
    <div class="modal fade" id="deleteProductModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this product? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger">Delete</button>
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
//include ('components/footer.php');
include __DIR__ . '/../components/foot.php';
?>