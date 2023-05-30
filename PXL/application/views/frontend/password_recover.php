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
						Reset Your password
					</h1>
				</div>

				<?php include("common/validation.php"); ?>

				<form method="post" action="<?php echo base_url();?>do/update/password">
					
					<div class="form-group">
						<label>Password</label>
						<div class="abs_icon">
							<div class="svg">
								<svg width="18" height="21" viewBox="0 0 18 21" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M9.14112 0.0858154C12.333 0.0858154 14.9013 2.55615 14.9013 5.60595V7.17457C16.6927 7.72455 17.998 9.31959 17.998 11.2247V16.2752C17.998 18.6337 16.01 20.5459 13.559 20.5459H4.756C2.30397 20.5459 0.315918 18.6337 0.315918 16.2752V11.2247C0.315918 9.31959 1.62226 7.72455 3.41267 7.17457V5.60595C3.42323 2.55615 5.99153 0.0858154 9.14112 0.0858154ZM9.15169 11.732C8.64437 11.732 8.23218 12.1285 8.23218 12.6164V14.8733C8.23218 15.3714 8.64437 15.7679 9.15169 15.7679C9.66957 15.7679 10.0818 15.3714 10.0818 14.8733V12.6164C10.0818 12.1285 9.66957 11.732 9.15169 11.732ZM9.16226 1.86487C7.01673 1.86487 5.27283 3.53209 5.26226 5.58562V6.95396H13.0517V5.60595C13.0517 3.54225 11.3078 1.86487 9.16226 1.86487Z" fill="#BDBDBD"/>
								</svg>
							</div>
							<input type="password" name="password" id="password" class="form-control custom_input" required placeholder="Enter your Password">
						</div>
					</div>

					<div class="form-group">
						<label>Confirm Password</label>
						<div class="abs_icon">
							<div class="svg">
								<svg width="18" height="21" viewBox="0 0 18 21" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M9.14112 0.0858154C12.333 0.0858154 14.9013 2.55615 14.9013 5.60595V7.17457C16.6927 7.72455 17.998 9.31959 17.998 11.2247V16.2752C17.998 18.6337 16.01 20.5459 13.559 20.5459H4.756C2.30397 20.5459 0.315918 18.6337 0.315918 16.2752V11.2247C0.315918 9.31959 1.62226 7.72455 3.41267 7.17457V5.60595C3.42323 2.55615 5.99153 0.0858154 9.14112 0.0858154ZM9.15169 11.732C8.64437 11.732 8.23218 12.1285 8.23218 12.6164V14.8733C8.23218 15.3714 8.64437 15.7679 9.15169 15.7679C9.66957 15.7679 10.0818 15.3714 10.0818 14.8733V12.6164C10.0818 12.1285 9.66957 11.732 9.15169 11.732ZM9.16226 1.86487C7.01673 1.86487 5.27283 3.53209 5.26226 5.58562V6.95396H13.0517V5.60595C13.0517 3.54225 11.3078 1.86487 9.16226 1.86487Z" fill="#BDBDBD"/>
								</svg>
							</div>
							<input type="password" name="cpassword" id="cpassword" class="form-control custom_input" required placeholder="Enter Confirm Password">
						</div>
					</div>


					<div class="form-group mt-0">
						<button type="submit" class="btn_custom primary wd100">Update</button>
					</div>

					
				</form>
			</div>
		</div>
	</div>
</body>

</body>
</html>