<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap Css -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <!-- <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/icons.min.css'); ?>">
    <!-- App Css-->
    <link href="<?php echo base_url('assets/css/app.min.css'); ?>" id="app-style" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet" type="text/css" />
 
    <!-- Custom Css-->
    <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets\css\datatables.min.css'); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="toobarcolor">
<header id="page-topbar " >
    <div class="navbar-header ">
        <form method="get" class="app-search d-none d-lg-block " action="<?php echo base_url('Welcome/search')?>">
        <div style="position: absolute;
    right: 1180px;
    top: 17px;">
        <input type="text" class="form-control input1" name="search" id="search" style="width: 400px; border-radius:none" placeholder="Search...">
                    <span class="bx bx-search-alt"></span>
            </div>
        </form>
        <!-- <form class="app-search d-none d-lg-block ">
            
                <div class="position-relative ">
                    <input type="text" class="form-control input1" style="width: 400px; border-radius:none" placeholder="Search...">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form> -->
        
        <div class="d-flex top">
            <a class="nom" href="<?php echo base_url();?>Signup/index">
            <?php if ($this->session->userdata('Active_login') == FALSE) {
                echo 'Sign Up';
            } else {
                echo  $this->session->userdata('first_name')." ". $this->session->userdata('last_name');
                
            }
             ?>
           </a>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src=" <?php echo base_url('assets/images/logo.png');?>" alt="Header Avatar">
                </button>
                <?php if ($this->session->userdata('Active_login') == True) {
                    ?>
                               <div class="dropdown-menu dropdown-menu-end" id="Drop1" style="display: none;">
                               <!------- item----------->
                               <a class="dropdown-item" href="<?php echo base_url('Profile/index');?>"><i class="bx bx-user font-size-16 align-middle me-1"></i><span key="t-profile">Profile</span></a>
                               
                               <a class="dropdown-item d-block" href="<?php echo base_url('Settings/index');?>"><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Settings</span></a>
                               <div class="dropdown-divider"></div>
                                   <a class="dropdown-item text-danger" href="<?php echo base_url('Signup/logout');?>"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                           </div>
                           <?php } 
             ?>

               
                <!------ Notification ---------->
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                            <i class="bx bx-bell bx-tada" style=" color: #899498;"></i>
                            <!-- <span class="badge bg-danger rounded-pill">   Number of Notifaction </span> -->
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0" key="t-notifications"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small" key="t-view-all"> View All</a>
                            </div>
                        </div>
                    </div>
                    <!-- <div data-simplebar style="max-height: 230px;">
                     Place Of NOTIFICATION 
                    </div> -->
</div>
            <a href="<?php echo base_url();?>Cart/view_cart" class="btn noti-icon waves-effect"><i class='bx bx-shopping-bag' style=" color: #899498;"></i></a>

                
            </div>
         </div>
    </div>
</header>

</div>


</body>
</html>