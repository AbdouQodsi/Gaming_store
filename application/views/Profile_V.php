<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Profile</title>
	    <!-- Bootstrap Css -->
		<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo base_url('assets/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
    
    <!-- App Css-->
    <link href="<?php echo base_url('assets/css/app.min.css'); ?>" id="app-style" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet" type="text/css" />
	<!-- Custom Css-->
	<link href="<?php echo base_url('assets\css\custom.css'); ?>" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/libs/toastr/build/toastr.min.css');?>">

  

    </head>
<body>
<?php require_once "Bar.php" ?>
<div class="main-content">
    <!-- <div class="page-content"> -->
        <div class="container-fuild">
        <div class="wrapper ">
    
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row" id="prfl">
            <div class="col-md-12">
              <div class="card fback">
                <div class="card-header card-header-primary" style="background: #8b57c6 !important; display: flex; flex-direction: column; align-items: center;">
                  <h4 class="titleeprof">Edit Profile</h4>
                  <p class="minutitle">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form class="proflupdate" method="post" action="<?php echo base_url('Profile/profile_update'); ?>">
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"  style="color: #ced4da !important;">Fist Name</label>
                          <input type="text" name="first_name" id="first_name" class="form-control inputcolor infoo">
                          <input type="hidden" name="id" id="id" class="infoo" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"  style="color: #ced4da !important;">Last Name</label>
                          <input type="text" name="last_name" id="last_name" class="form-control inputcolor infoo">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating" style="color: #ced4da !important;">Username</label>
                          <input type="text" name="username" id="username" class="form-control inputcolor infoo">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"  style="color: #ced4da !important;">Email address</label>
                          <input type="email" name="email" id="email" class="form-control inputcolor infoo">
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"  style="color: #ced4da !important;">Password</label>
                          <input type="text" name="password" id="password" class="form-control inputcolor infoo">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"  style="color: #ced4da !important;">confirm  Password</label>
                          <input type="text" class="form-control inputcolor infoo">
                        </div>
                    </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"  style="color: #ced4da !important;">Adresse</label>
                          <input type="text" name="adresse" id="adresse" class="form-control inputcolor infoo">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"  style="color: #ced4da !important;">Phone</label>
                          <input type="text" name="phone" id="phone" class="form-control inputcolor infoo">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"  style="color: #ced4da !important;">City</label>
                          <input type="text" name="city" id="city" class="form-control inputcolor infoo">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"  style="color: #ced4da !important;">Country</label>
                          <input type="text" name="country" id="country" class="form-control inputcolor infoo">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"  style="color: #ced4da !important;">Postal Code</label>
                          <input type="text" name="postal_code" id="postal_code" class="form-control inputcolor infoo">
                        </div>
                      </div>
                    </div>
                    <div style="display: flex; justify-content: center;">
                    <button type="submit"  class="btn updateprofi">Update Profile</button>
                    </div>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
              <!-- <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="../assets/img/faces/marc.jpg" />
                  </a>
                </div>
              </div> -->

          </div>
        </div>
      </div>
    </div>
  </div>
  
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/libs/toastr/build/toastr.min.js');?>"></script>
<script src="<?php echo base_url('assets\js\js\profile.js');?>"></script>
</body>
</html>
