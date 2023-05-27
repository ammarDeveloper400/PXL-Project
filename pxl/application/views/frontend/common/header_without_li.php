<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo settings()->site_title;?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo $assets;?>css/styles.css?time=<?php echo time();?>">
	<link rel="stylesheet" href="<?php echo $assets; ?>dropify/dist/css/dropify.css">
</head>
<body>
<div id="mirror_loader">
	 <div class="innerloading">
	    <img src="<?php echo $assets;?>images/logo.svg" alt="" height="60">
	    <p>Loading...</p>
	 </div>
</div>

	<div id="sidebarMenu" class="mobile">
		<div class="menu_left_pad">
			<div class="menu_cat">
				<a href="<?php echo base_url();?>" class="nav_link">Athletics</a>
				<a href="#" class="nav_link">Shop</a>
				<a href="#" class="nav_link">Messages</a>
				<a href="<?php echo base_url();?>#" class="nav_link">Knowledge</a>
			</div>
			 <?php if(isset($_SESSION["PXLLOGIN"])){?>
				<a href="<?php echo base_url();?>logout" class="btn_custom primary m-r-5">Logout</a>
			<?php } else {?>
				<a href="<?php echo base_url();?>login" class="btn_custom primary m-r-5">Log in</a>
				<a href="<?php echo base_url();?>signup" class="btn_custom secondary">Sign up</a>
			<?php } ?>
		</div>
	</div>
	<section class="top_logo_nav fixed_top_bar">
		<div class="wrapper">
			<div class="header_inner">
				<div class="logo">
					<a href="<?php echo base_url();?>">
						<img src="<?php echo $assets;?>images/logo.svg" alt="">
					</a>
				</div>
				<div class="right_nav">
					<div class="desktop">
						<div class="normal_link">
							<a href="<?php echo base_url();?>" class="nav_link center_flex <?php echo $active_athlete==1?'active_link':'';?>">
								Athletics
								<!-- <svg width="29" height="30" viewBox="0 0 29 30" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.40085 10.4426C5.72259 10.1208 6.22606 10.0916 6.58084 10.3548L6.68248 10.4426L14.5 18.2597L22.3175 10.4426C22.6393 10.1208 23.1427 10.0916 23.4975 10.3548L23.5991 10.4426C23.9209 10.7643 23.9501 11.2678 23.6869 11.6225L23.5991 11.7242L15.1408 20.1825C14.8191 20.5043 14.3156 20.5335 13.9608 20.2703L13.8592 20.1825L5.40085 11.7242C5.04694 11.3703 5.04694 10.7965 5.40085 10.4426Z" fill="black"/>
								</svg> -->

							</a>
							<a href="#" class="nav_link">Shop</a>
							<a href="#" class="nav_link">Knowledge</a>
							<a href="#" class="nav_link bg_color show_sub_menu">PXL+ <svg width="29" height="30" viewBox="0 0 29 30" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.40087 10.4426C5.72261 10.1208 6.22608 10.0916 6.58086 10.3548L6.6825 10.4426L14.5 18.2597L22.3175 10.4426C22.6393 10.1208 23.1427 10.0916 23.4975 10.3548L23.5992 10.4426C23.9209 10.7643 23.9502 11.2678 23.6869 11.6225L23.5992 11.7242L15.1408 20.1825C14.8191 20.5043 14.3156 20.5335 13.9608 20.2703L13.8592 20.1825L5.40087 11.7242C5.04696 11.3703 5.04696 10.7965 5.40087 10.4426Z" fill="white"/>
</svg>
</a>
					<div class="sub_menu">
						<a href="#"><img src="<?php echo $assets;?>images/coaches.png" > Coach Board</a>
						<a href="#"><img src="<?php echo $assets;?>images/affiliate.png" > Affiliates + Events</a>
						<a href="#"> <img src="<?php echo $assets;?>images/player.png" > Players</a>
					</div>

						</div>
						<?php if(isset($_SESSION["PXLLOGIN"])){?>
							<a href="<?php echo base_url();?>dashboard">
								<img class="user_pro_img" src="<?php echo $uploads;?>profiles/<?php echo user_info()->profile_pic;?>">
							</a>
						<?php } ?>
					</div>
					<div class="mobile">
						<div class="bars_mobile">
							<input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
							<label for="openSidebarMenu" class="sidebarIconToggle" onclick="show_left_navbar()">
							    <div class="spinner diagonal part-1"></div>
							    <div class="spinner horizontal"></div>
							    <div class="spinner diagonal part-2"></div>
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<div class="container">
	<div class="wrapper">

		<?php include("common/validation.php"); ?>
	