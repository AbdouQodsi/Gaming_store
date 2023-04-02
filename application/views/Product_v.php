<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add Poduct</title>
	    <!-- Bootstrap Css -->
		<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo base_url('assets/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
    
    <!-- App Css-->
    <link href="<?php echo base_url('assets/css/app.min.css'); ?>" id="app-style" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet" type="text/css" />
	<!-- Custom Css-->
  
	<link href="<?php echo base_url('assets\css\custom.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets\css\datatables.min.css'); ?>" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/libs/toastr/build/toastr.min.css');?>">

    </head>
<body>
<?php require_once "Bar.php" ?>
<div class="main-content">
    <div class="page-content">
      <div class="container-fuild">
        <div class="wrapper ">
        <div class="card" id="wowo">
      <div class="card-body" id="add" style="background: #343a40!important">
            <button  class="btn btn-outline-primary waves-effect waves-light">Add Product</button>
          </div>
        </div>

    <table id="Productable" class="table table-dark mb-0">
      <thead>
        <tr>
          <th scope="col" >Image</th>
          <th scope="col" >Name</th>
          <th scope="col" >Price</th>
          <th scope="col" >Quantity</th>
          <th scope="col" >Brand</th>
          <th scope="col" >Catagory</th>
          <th scope="col" >Date</th>
          <th scope="col" style="width:80px;" ></th>
        </tr>
      </thead>
    </table>





    

<div class="addproduct" style="display: none;">
  <form  id="inserorm" method="post" action="<?php echo base_url('Product/insert_data'); ?>" enctype="multipart/form-data">
    <div class="card">
      <div class="card-body" style="background: #2a3042!important; color: white !important;">
        <h4 class="card-title mb-4">Add Product</h4>
        <div class="row mb-4">
            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Name">
              <input type="hidden" class="form-control" id="product_id" name="product_id" >
            </div>
        </div>
        <div class="row mb-4">
            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Price</label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" id="product_price" name="product_price" placeholder="Price">
            </div>
        </div>

        <div class="row mb-4">
            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Quantity</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="product_quantity" name="product_quantity" placeholder="Price">
            </div>
        </div>
        <div class="row mb-4">
            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="product_description" name="product_description" placeholder="Price">
            </div>
        </div>
        <div class="row mb-4">
            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Brand</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="product_brand" name="product_brand" placeholder="Price">
            </div>
        </div>
        <div class="row mb-4">
            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Date</label>
            <div class="col-sm-9">
                <input type="Date" class="form-control" id="published_date" name="published_date" placeholder="Price">
            </div>
        </div>
        <div class="row mb-4">
          <label for="horizontal-email-input" class="col-sm-3 col-form-label">Catagory</label>
          <div class="col-sm-9">
            <select class="form-select" id="product_category" name="product_category">
              <option value="--------">--------</option>
              <option value="COMPUTER MOUSE">COMPUTER MOUSE</option>
              <option value="GAME HEADPHONES">GAME HEADPHONES</option>
              <option value="GAMEPADS">GAMEPADS</option>
              <option value="VR GLASSES">VR GLASSES</option>
              <option value="KEYBOARDS">KEYBOARDS</option>
              <option value="COMPUTERS">COMPUTERS</option>
              <option value="GAMES">GAMES</option>
            </select>
          </div>
        </div>
        <div class="row mb-4">
            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Image</label>
            <div class="col-sm-9">
              <input type="file" class="form-control" id="image_product" name="image_product" />
            </div>
        </div>
        <div class="row mb-4">
          <div class="col-sm-6">
            <button type="submit" class="btn btn-primary w-md col-sm-12">Add Product</button>
          </div>
          <div class="col-sm-6">
          <a  class="btn btn-warning w-md col-12 annuler-form">Annuler</a>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>







<div class="editproduct" style="display: none;">
  <form class="editform" method="post" action="<?php echo base_url('Product/Edit_Users'); ?>">
    <div class="card">
      <div class="card-body" style="background: #2a3042!important; color: white !important;">
        <h4 class="card-title mb-4">Edit Product</h4>
        <div class="row mb-4">
            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Name">
              <input type="hidden" class="form-control" id="product_id" name="product_id" >
            </div>
        </div>
        <div class="row mb-4">
            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Price</label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" id="product_price" name="product_price" placeholder="Price">
            </div>
        </div>

        <div class="row mb-4">
            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Quantity</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="product_quantity" name="product_quantity" placeholder="Price">
            </div>
        </div>
        <div class="row mb-4">
            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="product_description" name="product_description" placeholder="Price">
            </div>
        </div>
        <div class="row mb-4">
            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Brand</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="product_brand" name="product_brand" placeholder="Price">
            </div>
        </div>
        <div class="row mb-4">
            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Date</label>
            <div class="col-sm-9">
                <input type="Date" class="form-control" id="published_date" name="published_date" placeholder="Price">
            </div>
        </div>
        <div class="row mb-4">
          <label for="horizontal-email-input" class="col-sm-3 col-form-label">Catagory</label>
          <div class="col-sm-9">
            <select class="form-select" id="product_category" name="product_category">
              <option value="--------">--------</option>
              <option value="COMPUTER MOUSE">COMPUTER MOUSE</option>
              <option value="GAME HEADPHONES">GAME HEADPHONES</option>
              <option value="GAMEPADS">GAMEPADS</option>
              <option value="VR GLASSES">VR GLASSES</option>
              <option value="KEYBOARDS">KEYBOARDS</option>
              <option value="COMPUTERS">COMPUTERS</option>
              <option value="GAMES">GAMES</option>
            </select>
          </div>
        </div>
        <div class="row mb-4">
            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Image</label>
            <div class="col-sm-9">
              <input type="file" class="form-control" id="image" name="image" multiple="multiple">
            </div>
        </div>
        <div class="row mb-4">
          <div class="col-sm-6">
          <button type="submit" class="btn btn-primary w-md col-sm-12">Edit Product</button>
          </div>
          <div class="col-sm-6">
            <a  class="btn btn-warning w-md col-12 annuler-form">Annuler</a>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>




      </div>
    </div>
  </div>
</div>

<!-- JAVASCRIPT -->
<script src="<?php echo base_url('assets/libs/jquery/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<script src="<?php echo base_url('assets/libs/bootstrap/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/libs/metismenu/metisMenu.min.js');?>"></script>
<script src="<?php echo base_url('assets/libs/simplebar/simplebar.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/fontawesome.init.js');?>"></script>
<script src="<?php echo base_url('assets/js/pages/datatables.min.js');?>"></script>

<script src="<?php echo base_url('assets/libs/toastr/build/toastr.min.js');?>"></script>
<script src="<?php echo base_url('assets\js\js\product.js');?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


</body>
</html>
