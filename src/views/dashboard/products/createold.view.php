<?php
require __DIR__ . '/../components/head.php';
include_once __DIR__ . '/../components/header.php';
include_once __DIR__ . '/../components/sidebar.php';
?>

<main id="main" class="main">

  <button type="button" class="btn btn-primary rounded-pill mb-4" onclick="goBack()"><i
      class="bi bi-caret-left-fill"></i>Back</button>

  <div class="pagetitle">
    <h1>Add Product</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/products">Product</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">

    <div class="card">
      <div class="card-body">
        <!-- <h5 class="card-title">Add a new product</h5> -->

        <!-- Multi Columns Form -->
        <form class="row g-3 my-2">
          <div class="col-md-12">
            <label for="inputName5" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="inputName5">
          </div>
          <div class="col-md-6">
            <label for="inputPassword" class="col-sm-2 col-form-label">Textarea</label>
            <div class="col-sm-10">
              <textarea class="form-control" style="height: 100px"></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <label for="inputPassword" class="col-sm-2 col-form-label">Textarea</label>
            <div class="col-sm-10">
              <textarea class="form-control" style="height: 100px"></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <label for="price" class="form-label">Price</label>
            <div class="input-group" id="price">
              <span class="input-group-text">$</span>
              <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
              <span class="input-group-text">.00</span>
            </div>
          </div>


          <div class="col-md-4">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" class="form-select">
              <option selected>Choose...</option>
              <option>...</option>
            </select>
          </div>
          <div class="col-md-2">
            <label for="inputZip" class="form-label">Zip</label>
            <input type="text" class="form-control" id="inputZip">
          </div>
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck">
              <label class="form-check-label" for="gridCheck">
                Check me out
              </label>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
        </form><!-- End Multi Columns Form -->



      </div>
    </div>
  </section>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
</main><!-- End #main -->

<?php
//include ('components/footer.php');
include __DIR__ . '/../components/foot.php';
?>