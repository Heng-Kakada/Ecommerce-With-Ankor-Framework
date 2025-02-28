<?php
include __DIR__ . '/../components/head.php';
include __DIR__ . '/../components/header.php';
include __DIR__ . '/../components/sidebar.php';
?>


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Categories</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item active">Categories</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center card-title">
                            <h5>Category List</h5>
                            <a href="/admin/categories/create" class="btn btn-primary btn-sm">
                                <i class="bi bi-plus-circle me-1"></i> Add New Category
                            </a>
                        </div>

                        <table class="table table-hover" style="vertical-align: middle;">
                            <!-- if wanted to get sorting in every column use 'table datatable' instead-->
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php if (isset($data['categories'])): ?>

                                    <?php foreach ($data['categories'] as $category): ?>
                                        <tr>
                                            <th scope="row"><?= $category['id'] ?></th>
                                            <td><?= $category['name'] ?></td>
                                            <td><?= $category['description'] ?></td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="/admin/categories/edit/<?= $category['id'] ?>"
                                                        class="btn btn-info btn-sm" title="Edit">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <button class="btn btn-danger btn-sm delete-btn" title="Delete"
                                                        data-bs-toggle="modal" data-bs-target="#deleteProductModal"
                                                        data-id="<?= $category['id'] ?>">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <!-- <tr>
                                    <th scope="row">2</th>

                                    <td>Smart Watch</td>
                                    <td>Electronics</td>

                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="/admin/categories/edit" class="btn btn-info btn-sm" title="Edit">
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

                                    <td>Wireless Earbuds</td>
                                    <td>Electronics</td>

                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="/admin/categories/edit" class="btn btn-info btn-sm" title="Edit">
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
    </section>

    <!-- update product modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateLable" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateLable">Update Category</h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="feedbackForm" method="POST" action="/admin/products/store" class="needs-validation"
                        novalidate enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="invalid-feedback">
                                Please enter your category name.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="productDescription" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" id="productDescription" name="description"
                                    rows="4"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this category?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="" id="confirmDeleteBtn" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".delete-btn").forEach(button => {
            button.addEventListener("click", function () {
                let categoryId = this.getAttribute("data-id");
                let deleteUrl = "/admin/categories/" + categoryId + "/delete";
                document.getElementById("confirmDeleteBtn").setAttribute("href", deleteUrl);
            });
        });
    });
</script>

<?php
//include ('components/footer.php');
include __DIR__ . '/../components/foot.php';
?>