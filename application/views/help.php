<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
    </head>
<body>
<?php require_once "Bar.php" ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fuild">
            <form action="<?php echo base_url(); ?>Contact/Send" method="post">
                        <div class="card fback" >
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2" style="background: #8b57c6 !important; display: flex; flex-direction: column; align-items: center;">
                                    <h3 class="titleeprof"><i class="fa fa-envelope"></i> Contact Us</h3>
                                    <p class="minutitle m-0">Drop Us a Message</p>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-4">
                                        
                                            <div class="input-group-text inputcolor info"><i class="fa fa-user " style="color: #8b57c6 !important;"></i></div>
                                        
                                        <input type="text" class="form-control inputcolor infoo" id="name" name="name" placeholder="Your Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-4">
                                        
                                            <div class="input-group-text inputcolor infoo"><i class="fa fa-envelope" style="color: #8b57c6 !important;"></i></div>
                                        
                                        <input type="email" class="form-control inputcolor infoo" id="email" name="email" placeholder="Your Email" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-4">
                                        
                                            <div class="input-group-text inputcolor info"><i class="fa fa-comment " style="color: #8b57c6 !important;"></i></div>
                                        
                                        <textarea class="form-control inputcolor infoo" id="message" name="message" placeholder="Your Message" required></textarea>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <input type="submit" value="Send Message" class="btn updateprofi">
                                </div>
                            </div>

                        </div>
                    </form>
        </div>
    </div>
</div>


</body>
</html>