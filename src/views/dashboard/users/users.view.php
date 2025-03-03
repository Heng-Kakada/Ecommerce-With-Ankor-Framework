<?php
include __DIR__ . '/../components/head.php';
include __DIR__ . '/../components/header.php';
include __DIR__ . '/../components/sidebar.php';

?>


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center card-title">

                            <h5>User List</h5>
                            <a href="/admin/users/create" class="btn btn-primary btn-sm">
                                <i class="bi bi-plus-circle me-1"></i> Add New User
                            </a>
                        </div>

                        <table class="table table-hover" style="vertical-align: middle;">
                            <!-- if wanted to get sorting in every column use 'table datatable' instead-->
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($data['users'])): ?>
                                    <?php foreach ($data['users'] as $user): ?>
                                        <tr>
                                            <th scope="row"><?= $user['id'] ?></th>
                                            <td> <!--image-->
                                                <img src="<?= $user['image'] ?>" alt="User Image" class="img-fluid rounded"
                                                    style="max-width: 120px;max-height: 100px;">
                                            </td>
                                            <td><?= $user['username'] ?></td> <!--username-->
                                            <td><?= $user['email'] ?></td> <!--email-->
                                            <td><?= $user['role_name'] ?></td> <!--role_name-->

                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="/admin/users/edit/<?= $user['id'] ?>" class="btn btn-info btn-sm"
                                                        title="Edit">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <button class="btn btn-danger btn-sm delete-btn" title="Delete"
                                                        data-bs-toggle="modal" data-bs-target="#deleteProductModal"
                                                        data-id="<?= $user['id'] ?>">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this user?
                </div>
                <form method="POST" action="/admin/users/delete">

                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" id="confirmDeleteBtn" name="id" value="">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".delete-btn").forEach(button => {
            button.addEventListener("click", function () {
                document.getElementById("confirmDeleteBtn").setAttribute("value", this.getAttribute("data-id"));
            });
        });
    });
</script>

<?php
//include ('components/footer.php');
include __DIR__ . '/../components/foot.php';
?>