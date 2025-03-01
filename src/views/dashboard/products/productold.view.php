<?php
include __DIR__ . '/../components/head.php';
include __DIR__ . '/../components/header.php';
include __DIR__ . '/../components/sidebar.php';
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Product</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Product</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">

    <div class="card">
      <div class="card-body">      
        <div class="d-flex align-items-center justify-content-between my-2">
          <h2 class="card-title fs-3">Products</h2>
          <a href="/admin/products/create"><button type="button" class="btn btn-primary">Add Product</button></a>
        </div>

        <!-- Table with hoverable rows -->
        <table class="table table-hover" style="vertical-align: middle;">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">SKU</th>
              <th scope="col">Price</th>
              <th scope="col">Preview</th>
              <th scope="col" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Brandon Jacob</td>
              <td>Designer</td>
              <td>28</td>
              <td>2016-05-25</td>
              <th scope="row"><a href="#"><img src="../dashboard/assets/img/product-1.jpg" alt="" style="max-width: 60px;"></a></th>
              <td class="text-center">
                <a href="/admin/products/create"><button type="button" class="btn btn-outline-success">Edit</button></a>
                <button type="button" class="btn btn-outline-danger">Delete</button>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Bridie Kessler</td>
              <td>Developer</td>
              <td>35</td>
              <td>2014-12-05</td>
              <th scope="row"><a href="#"><img src="../dashboard/assets/img/product-2.jpg" alt="" style="max-width: 60px;"></a></th>
              <td class="text-center">
                <button type="button" class="btn btn-success">Edit</button>
                <button type="button" class="btn btn-danger">Delete</button>
              </td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Ashleigh Langosh</td>
              <td>Finance</td>
              <td>45</td>
              <td>2011-08-12</td>
              <th scope="row"><a href="#"><img src="../dashboard/assets/img/product-3.jpg" alt="" style="max-width: 60px;"></a></th>
              <td class="text-center">
                <button type="button" class="btn btn-outline-success">Edit</button>
                <button type="button" class="btn btn-outline-danger">Delete</button>
              </td>
            </tr>

          </tbody>
        </table>
        <!-- End Table with hoverable rows -->

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php
//include ('components/footer.php');
include __DIR__ . '/../components/foot.php';
?>