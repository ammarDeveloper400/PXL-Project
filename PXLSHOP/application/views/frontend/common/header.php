<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo settings()->site_title;?></title>
	<link rel="icon" type="image/png" href="<?php echo $assets;?>images/logo.svg" />
	<link rel="stylesheet" type="text/css" href="<?php echo $assets;?>css/styles.css?time=<?php echo time();?>">
	<link rel="stylesheet" href="<?php echo $assets; ?>dropify/dist/css/dropify.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div id="mirror_loader">
	 <div class="innerloading">
	    <img src="<?php echo $assets;?>images/logo.svg" alt="" height="60">
	 </div>
</div>

	<div id="sidebarMenu" class="mobile">
		<div class="menu_left_pad">
			<div class="menu_cat">
				<a href="<?php echo base_url();?>" class="nav_link">Elite</a>
				<a href="<?php echo base_url();?>" class="nav_link">Shop</a>
				<a href="https://pxlelite.com/knowledge/" class="nav_link">Knowledge</a>
				
			</div>
			 <?php if(isset($_SESSION["PXLLOGIN"])){?>

				<a href="<?php echo base_url();?>logout" class="btn_custom primary m-r-5">Logout</a>
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
							<li  class="show_sub_menu_elite">
								<a href="<?php echo base_url();?>" class="nav_link center_flex <?php echo $active_athlete==1?'active_link':'';?>">
									Elite
									<svg width="18" height="19" viewBox="0 0 29 30" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-left: 3px; margin-top: 2px;">
									<path d="M5.40085 10.4426C5.72259 10.1208 6.22606 10.0916 6.58084 10.3548L6.68248 10.4426L14.5 18.2597L22.3175 10.4426C22.6393 10.1208 23.1427 10.0916 23.4975 10.3548L23.5991 10.4426C23.9209 10.7643 23.9501 11.2678 23.6869 11.6225L23.5991 11.7242L15.1408 20.1825C14.8191 20.5043 14.3156 20.5335 13.9608 20.2703L13.8592 20.1825L5.40085 11.7242C5.04694 11.3703 5.04694 10.7965 5.40085 10.4426Z" fill="black"/>
									</svg>
								</a>
								<div class="sub_menu_elite">
									<a href="https://pxlelite.com/team/">Management</a>
									<a href="https://pxlelite.com/about/">About</a>
									<a href="https://pxlelite.com/faqs/">FAQs</a>
								</div>
							</li>
							<li>
								<a href="<?php echo base_url();?>" class="nav_link <?php echo $active_shop==1?'active_link':'';?>">Shop</a>
							</li>
							<li>
								<a style="margin-right: 35px;" href="https://pxlelite.com/knowledge/" class="nav_link">Knowledge</a>
							</li>
							<li class="show_sub_menu">
							<a href="https://myaccount.pxlelite.com/pxl/plus" class="nav_link bg_color">PXL+ <svg width="29" height="30" viewBox="0 0 29 30" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.40087 10.4426C5.72261 10.1208 6.22608 10.0916 6.58086 10.3548L6.6825 10.4426L14.5 18.2597L22.3175 10.4426C22.6393 10.1208 23.1427 10.0916 23.4975 10.3548L23.5992 10.4426C23.9209 10.7643 23.9502 11.2678 23.6869 11.6225L23.5992 11.7242L15.1408 20.1825C14.8191 20.5043 14.3156 20.5335 13.9608 20.2703L13.8592 20.1825L5.40087 11.7242C5.04696 11.3703 5.04696 10.7965 5.40087 10.4426Z" fill="white"/>
							</svg>
						</a>
						<div class="sub_menu">
							<a href="https://myaccount.pxlelite.com/players">Players</a>
							<a href="https://myaccount.pxlelite.com/coaches">Coaches</a>
							<a href="https://myaccount.pxlelite.com/events">Affiliates</a>
							
						</div>
					</li>

						</div>
						<?php if(isset($_SESSION["PXLLOGIN"]) && 2==4){?>
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
	