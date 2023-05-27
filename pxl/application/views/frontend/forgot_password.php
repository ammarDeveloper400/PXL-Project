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
						Forgot password
					</h1>
				</div>

				<?php include("common/validation.php"); ?>

				<form method="post" action="<?php echo base_url();?>do/forgot/password">
					<div class="form-group">
						<label>Email</label>
						<div class="abs_icon">
							<div class="svg">
								<svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M15.477 0.312439C16.8379 0.312439 18.1471 0.838441 19.1102 1.78227C20.0743 2.72411 20.6132 3.99445 20.6132 5.32435V13.1648C20.6132 15.9337 18.3094 18.1767 15.477 18.1767H5.45113C2.61864 18.1767 0.315918 15.9337 0.315918 13.1648V5.32435C0.315918 2.55539 2.60849 0.312439 5.45113 0.312439H15.477ZM16.6248 5.47321C16.4116 5.4623 16.2087 5.53276 16.0554 5.67171L11.4794 9.24455C10.8908 9.72192 10.0474 9.72192 9.44969 9.24455L4.8828 5.67171C4.56718 5.44344 4.13079 5.47321 3.86794 5.74118C3.59393 6.00914 3.56348 6.4359 3.79588 6.73363L3.92883 6.86265L8.54646 10.3859C9.11478 10.8226 9.80387 11.0607 10.5254 11.0607C11.245 11.0607 11.9463 10.8226 12.5136 10.3859L17.0916 6.80311L17.1728 6.72371C17.4153 6.4359 17.4153 6.01907 17.1616 5.73125C17.0206 5.58338 16.8267 5.49306 16.6248 5.47321Z" fill="#BDBDBD"/>
									</svg>
							</div>
							<input type="email" name="email" id="email" class="form-control custom_input" required placeholder="Enter your Email">
						</div>
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