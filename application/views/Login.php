<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<?php require_once "Bar.php" ?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fuild">

			<div class="section" style="padding-bottom: 80px !important;">
				<div class="container">
					<div class="row  justify-content-center">
						<div class="col-sm-12 text-center align-self-center pb-5">
							<div class="section pb-5 pt-5 pt-sm-2 text-center">
								<h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
								<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
								<label for="reg-log"></label>
								<div class="card-3d-wrap mx-auto">
									<div class="card-3d-wrapper">
										<div class="card-front">
											<div class="center-wrap">
												<div class="section text-center">
													<h4 class="mb-4 pb-3" style="color: #8b57c6;">Log In</h4>
													
													<form id ="login-form"  method = "post">
													<div class="form-group">
														<input type="email" name="logemail" class="form-style" placeholder="Your Email" id="logemails" autocomplete="off">
														
													</div>	
													<div class="form-group mt-2">
														<input type="password" name="logpass" class="form-style" placeholder="Your Password" id="logpasss" autocomplete="off">
														<i class="input-icon uil uil-lock-alt"></i>
													</div>
													<button type="submit"  class="btnn mt-4">submit</button>
													<p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot your password?</a></p>
													
													</form>
												</div>
											</div>
										</div>
										<div class="card-back">
											<div class="center-wrap">
												<div class="section text-center">
													<h4 class="mb-4 pb-3" style="color: #8b57c6;">Sign Up</h4>
													<form  action ="<?php echo base_url('Signup/insert'); ?>"  method = "post">
														<div class="row g-0 d-flex justify-content-between">
															<div class="col-5 form-group mt-2">
																<input type="text" name="first_name" class="form-style" placeholder="Your First Name" id="first_name" autocomplete="off">
																<input type="hidden" name="id" id="id" autocomplete="off">
																<i class="input-icon uil uil-user"></i>
															</div>
															<div class="col-5 form-group mt-2">
																<input type="text" name="last_name" class="form-style" placeholder="Your Last Name" id="last_name" autocomplete="off">
																<i class="input-icon uil uil-user"></i>
															</div>
														</div>
														<div class="form-group mt-2">
															<input type="text" name="adresse" class="form-style" placeholder="Adresse" id="adresse" autocomplete="off">
															<i class="input-icon uil uil-user"></i>
														</div>
														<div class="form-group mt-2">
															<input type="text" name="phone" class="form-style" placeholder="Phone" id="phone" autocomplete="off">
															<i class="input-icon uil uil-user"></i>
														</div>
														<div class="form-group mt-2">
															<input type="email" name="email" class="form-style" placeholder="Your Email" id="email" autocomplete="off">
															<i class="input-icon uil uil-at"></i>
														</div>	
														<div class="form-group mt-2">
															<input type="password" name="password" class="form-style" placeholder="Your Password" id="password" autocomplete="off">
															<i class="input-icon uil uil-lock-alt"></i>
														</div>
														<div class="form-group mt-2">
														<input type="hidden" name="type" id="type" autocomplete="off">
															<input type="password" name="confirm_password" class="form-style" placeholder="confirm your password" id="confirm_password" autocomplete="off">
															<i class="input-icon uil uil-lock-alt"></i>
														</div>
														<button type="submit"  class="btnn mt-4">submit</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>

		</div>
	</div>
</div>
<script>
$(document).ready(function() {
    $('#login-form').submit(function(event) {
		event.preventDefault();
		var formData = $(this).serialize();
		$.ajax({
            url: '<?php echo base_url("Signup/login"); ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
			success: function(response) {
        if (response.success) {
            // Redirect to the home page
            window.location.href = '<?php echo base_url("Welcome"); ?>';
        } else {
            // Show an error message
            command: toastr["warning"](response.message, "Error");
        }
    },
    error: function(xhr, status, error) {
		
		command: toastr["warning"]('An error occurred: ' + error, "Error");
    }
        });
    });
});
</script>
</body>
