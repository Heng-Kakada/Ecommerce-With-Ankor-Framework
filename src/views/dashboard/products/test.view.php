<?php
include __DIR__ . '/../components/head.php';
include __DIR__ . '/../components/header.php';
include __DIR__ . '/../components/sidebar.php';
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

                        <table class="table table-hover" style="vertical-align: middle;"> <!-- if wanted to get sorting in every column use 'table datatable' instead-->
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
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <img src="/../dashboard/assets/img/product-1.jpg" alt="Product" class="img-fluid rounded"
                                            style="max-width: 50px;">
                                    </td>
                                    <td>Leather Jacket</td>
                                    <td>Clothing</td>
                                    <td>$199.99</td>
                                    <td>50</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="/admin/products/update" class="btn btn-info btn-sm" title="Edit">
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
                                    <th scope="row">2</th>
                                    <td>
                                        <img src="/../dashboard/assets/img/product-2.jpg" alt="Product" class="img-fluid rounded"
                                            style="max-width: 50px;">
                                    </td>
                                    <td>Smart Watch</td>
                                    <td>Electronics</td>
                                    <td>$299.99</td>
                                    <td>25</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="/admin/products/update" class="btn btn-info btn-sm" title="Edit">
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
                                        <img src="/../dashboard/assets/img/product-3.jpg" alt="Product" class="img-fluid rounded"
                                            style="max-width: 50px;">
                                    </td>
                                    <td>Wireless Earbuds</td>
                                    <td>Electronics</td>
                                    <td>$129.99</td>
                                    <td>100</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="/admin/products/update" class="btn btn-info btn-sm" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm" title="Delete" data-bs-toggle="modal"
                                                data-bs-target="#deleteProductModal">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

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