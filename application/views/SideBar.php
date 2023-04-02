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
    <link href="<?php echo base_url('assets/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
    
    <!-- App Css-->
    <link href="<?php echo base_url('assets/css/app.min.css'); ?>" id="app-style" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet" type="text/css" />
    
    <!-- Custom Css-->
    <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets\css\datatables.min.css'); ?>" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="sidebarcolor" >
    <div class="vertical-menu sidebarcolor">
        <div data-simplebar class="h-100">
            <div class="d-flex flex-column">
                <div class="SideBar">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="<?php echo base_url('Welcome');?>" class="logo logo-dark ">
                            <span class="logo-lg ">
                                <img  src="<?php echo base_url('assets/images/logo.png');?>" alt="" height="100" >
                            </span>
                        </a>
                    </div>
                    <div class="menu">
                    <div class="adminside">
                    <ul class="metismenu list-unstyled">
                    <?php if ($this->session->userdata('Active_login') === TRUE and $this->session->userdata('user_type') === 'Admin' ) {
?>
                        <a href="javascript:void(0);" id="admin"><h1 class="titlee">Admin Pages<i id="arroww" class='bx bxs-down-arrow'></i></h1></a>
                        <div id="Drop2" style="display: none;">
                        <ul  class="metismenu list-unstyled" >
                        <a href="<?php echo base_url();?>Product/index"><li style="diplay" class="menu-title">Add product</li></a>
                        <a href="<?php echo base_url();?>Statistics/index"><li style="diplay" class="menu-title">Statistics Store</li></a>
                        <li style="diplay" class="menu-title">Send Message</li>
                        <li style="diplay" class="menu-title">Money statistics</li>
                        </ul>
                    </div>
                    




      <?php } ?>
                            
                        </ul>
                    </div>
                    <button class="mainbtn">Go To Catalog</button>           
                        <ul class="metismenu list-unstyled">
                            <a href="<?php echo base_url();?>Profile/index"><li class="menu-title"><i class='bx bx-user'></i> Profile</li></a>
                            <a href="<?php echo base_url();?>Welcome/searchV"><li class="menu-title"><i class='bx bx-search-alt' ></i> Search</li></a>
                            <a href="<?php echo base_url();?>Welcome/favorite"><li class="menu-title"><i class='bx bx-heart' ></i> Favorites</li></a>
                            <li class="menu-title"><i class='bx bx-wallet-alt' ></i> Balance</li>
                        </ul>
                    </div>
                    <div class="cat">
                        <a href="javascript:void(0);" id="xc"><h1 class="titlee">Category<i id="arrow" class='bx bxs-up-arrow'></i></h1></a>
                        <div id="er" >
                        <ul  class="metismenu list-unstyled" >
                        <a href="<?php echo base_url();?>Welcome/Mouse"><li class="menu-title"><i class='bx bx-mouse-alt' ></i> Computer Mouse</li></a>
                        <a href="<?php echo base_url();?>Welcome/Headphones"><li class="menu-title"><i class='bx bx-headphone' ></i> Game Headphones</li></a>
                        <a href="<?php echo base_url();?>Welcome/Gamepad"><li class="menu-title"><i class="mdi mdi-gamepad-square-outline" ></i> GamePads</li></a>
                        <a href="<?php echo base_url();?>Welcome/Glasses"><li class="menu-title"><i class="mdi mdi-safety-goggles" ></i> VR Glasses</li></a>
                        <a href="<?php echo base_url();?>Welcome/keyboards"><li class="menu-title"><i class="mdi mdi-keyboard-settings-outline" ></i> Keyboards</li></a>
                        <a href="<?php echo base_url();?>Welcome/Computer"><li class="menu-title"><i class="mdi mdi-desktop-classic" ></i> Computers</li></a>
                        <a href="<?php echo base_url();?>Welcome/Games"><li class="menu-title"><i class="mdi mdi-gamepad-circle-outline" ></i> Games</li></a>
                        </ul>
                    </div>
                    </div> 
                    <div class="icon">
                        <i  class='bx bxl-twitter' ></i>
                        <i class='bx bxl-facebook' ></i>
                        <i class='bx bxl-instagram' ></i>
                        <i class='bx bxl-behance' ></i>
                    </div>
                    <div class="more">
                        <ul class="metismenu list-unstyled">
                            <a href="<?php echo base_url();?>Contact/index"><li class="menu-title"><i class='bx bx-support' ></i> Help</li></a>
                            <a href="<?php echo base_url();?>Welcome/cod"><li class="menu-title"><i class='bx bx-help-circle' ></i> Coditions</li></a>
                            <a href="<?php echo base_url();?>Welcome/CONFIDENTIALITY"><li class="menu-title"><i class='bx bx-notepad'></i> Confidentiality</li></a>
                        </ul>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

  
</body>
</html>