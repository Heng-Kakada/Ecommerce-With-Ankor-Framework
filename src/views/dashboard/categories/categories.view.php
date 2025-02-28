<?php
include __DIR__ . '/../components/head.php';
include __DIR__ . '/../components/header.php';
include __DIR__ . '/../components/sidebar.php';
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Categories</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-8">
        Categories Page
      </div>




    </div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Table with hoverable rows</h5>

        <!-- Table with hoverable rows -->
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">SKU</th>
              <th scope="col">Price</th>
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
              <td class="text-center">
                <button type="button" class="btn btn-outline-success">Edit</button>
                <button type="button" class="btn btn-outline-danger">Delete</button>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Bridie Kessler</td>
              <td>Developer</td>
              <td>35</td>
              <td>2014-12-05</td>
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