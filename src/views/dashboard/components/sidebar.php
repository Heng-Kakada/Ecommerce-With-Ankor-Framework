<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="/admin">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/categories">
                <i class="bi bi-stack"></i>
                <span>Categories</span>
            </a>
        </li><!-- End Categories Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/products">
                <i class="bi bi-box"></i>
                <span>Products</span>
            </a>
        </li><!-- End Products Nav -->

        <?php if ($user['role'] === "admin"): ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/users">
                    <i class="bi bi-people-fill"></i>
                    <span>Users</span>
                </a>
            </li><!-- End Products Nav -->
        <?php endif; ?>



        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/notexist">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="/notexist">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="/notexist">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->


    </ul>

</aside><!-- End Sidebar-->