<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title!=""?$title:settings()->site_title;?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo $assets;?>css/styles.css?time=<?php echo time();?>">
</head>
<style type="text/css">
	.card {
		padding: 20px 30px;
	}
</style>

<body class="login_bg">
	<div class="center_width">
		<div class="login_box card">
			<div class="logo text-center">
				<img src="<?php echo $assets;?>images/logo.svg" alt="Logo" />
			</div>

			<div class="tabs_auth flex_space_between">
				<a href="javascript:;" class="athlete_tab <?php echo isset($_SESSION['TAB_SIGNUP']) && $_SESSION['TAB_SIGNUP']==1?'active_tab':'';?>" onclick="change_type(1)">
					Athlete
				</a>
				<a href="javascript:;" class="coach_tab <?php echo isset($_SESSION['TAB_SIGNUP']) && $_SESSION['TAB_SIGNUP']==2?'active_tab':'';?>" onclick="change_type(2)">
					Coach
				</a>
			</div>

			<div class="login_form">
				<div class="login_info">
					<p>Welcome!</p>
					<h1 style="display: flex; gap: 6px;">
						<div class="type_title">Athlete</div> Sign Up 
					</h1>
				</div>

				<form action="" method="post">

					<?php include("common/validation.php");?>
					<div class="form-group">
						<label>Name</label>
						<div class="abs_icon">
							<div class="svg">
								<svg width="15" height="20" viewBox="0 0 15 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M7.5 12.6631C11.5675 12.6631 15 13.324 15 15.874C15 18.425 11.545 19.0625 7.5 19.0625C3.43348 19.0625 0 18.4016 0 15.8515C0 13.3006 3.45505 12.6631 7.5 12.6631ZM7.5 0.3125C10.2554 0.3125 12.4631 2.5194 12.4631 5.27286C12.4631 8.02633 10.2554 10.2342 7.5 10.2342C4.74553 10.2342 2.53689 8.02633 2.53689 5.27286C2.53689 2.5194 4.74553 0.3125 7.5 0.3125Z" fill="#BDBDBD"/>
								</svg>
							</div>
							<input type="text" name="name" id="name" class="form-control custom_input"  placeholder="Enter your Name">
						</div>
					</div>
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

					<input type="hidden" name="type" id="type" value="1" >
					<div class="form-group mt-0">
						<button type="submit" class="btn_custom primary wd100">Sign Up</button>
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

<script type="text/javascript" src="<?php echo $assets;?>js/jquery.min.js"></script>
<script type="text/javascript">
	function change_type(val){
		$("#type").val(val);
		if(val == 1){
			$(".athlete_tab").addClass('active_tab');
			$(".coach_tab").removeClass('active_tab');
			$(".type_title").html('Athlete');
		} else {
			$(".athlete_tab").removeClass('active_tab');
			$(".coach_tab").addClass('active_tab');
			$(".type_title").html('Coach');
		}

	}
</script>