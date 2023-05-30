<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo settings()->site_title;?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo $assets;?>css/styles.css?time=<?php echo time();?>">
</head>
<body class="login_bg">
	<div class="center_width">
		<div class="login_box card">
			<div class="logo text-center">
				<img src="<?php echo $assets;?>images/logo.svg" alt="Logo" />
			</div>

			<div class="login_form">
				<div class="login_info">
					<h1>
						Enter OTP
					</h1>
				</div>

				<?php include("common/validation.php"); ?>

				<form method="post" action="<?php echo base_url();?>do/validate/otp">
					<div class="form-group">
						<label>OTP Code</label>
							<input type="number" name="otp" id="otp" class="form-control custom_input" required placeholder="Enter OTP Code">
					</div>
					
					<div class="form-group mt-0">
						<button type="submit" class="btn_custom primary wd100">Submit</button>
					</div>

					<div class="form-group text_center wd100 mb-0 m-t">
						<a href="<?php echo base_url();?>login" class="signup_text">Already have an account? <span>Sign In</span></a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</body>
</html>