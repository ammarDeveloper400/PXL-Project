<?php include("common/header.php"); ?>
<style type="text/css">
	.card {
		background: #F6F6F6;
	    border: none;
	    box-shadow: none !important;
	}
</style>
<?php include("common/profile_steps.php"); ?>
<form method="post" action="<?php echo base_url();?>pxl/do_submit_testing"  enctype='multipart/form-data'>
	<div class="profile_creation">
		<div class="card wd100 login_box">
			<div class="card_profile_">
				<h3>
					<svg width="140" height="40" viewBox="0 0 349 94" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0.572799 93.5V0.409088H39.0273C45.997 0.409088 52.0122 1.77273 57.0728 4.5C62.1637 7.19697 66.088 10.9697 68.8455 15.8182C71.6031 20.6364 72.9819 26.2424 72.9819 32.6364C72.9819 39.0606 71.5728 44.6818 68.7546 49.5C65.9667 54.2879 61.9819 58 56.8001 60.6364C51.6183 63.2727 45.4667 64.5909 38.3455 64.5909H14.6183V46.8636H34.1637C37.5576 46.8636 40.391 46.2727 42.6637 45.0909C44.9667 43.9091 46.7092 42.2576 47.891 40.1364C49.0728 37.9848 49.6637 35.4848 49.6637 32.6364C49.6637 29.7576 49.0728 27.2727 47.891 25.1818C46.7092 23.0606 44.9667 21.4242 42.6637 20.2727C40.3607 19.1212 37.5273 18.5455 34.1637 18.5455H23.0728V93.5H0.572799ZM106.846 0.409088L123.846 29.8182H124.573L141.755 0.409088H166.936L138.846 46.9545L167.846 93.5H142.027L124.573 63.7727H123.846L106.391 93.5H80.7546L109.618 46.9545L81.4819 0.409088H106.846ZM178.573 93.5V0.409088H201.073V75.2273H239.8V93.5H178.573Z" fill="black"/>
					<path d="M306.675 88.8636V23.0455H324.993V88.8636H306.675ZM282.902 65.1364V46.8182H348.721V65.1364H282.902Z" fill="#F16623"/>
					</svg>
				</h3>
			</div>

			<div class="pxl_page">
				<div class="card_pxl_plus">
					<div class="left_pxl_box">
						<h5>Athletes + PXL</h5>
						<p>We’re committed to building an internal network between athletes and PXL to access a broad range of services.</p>
						<a href="<?php echo base_url();?>players">
							<span>More Details</span>
							<svg width="6" height="10" viewBox="0 0 8 18" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M7.52702 8.73801L0.860352 17.1705L0.860351 0.305513L7.52702 8.73801Z" fill="#F16623"/>
							</svg>
						</a>
					</div>
					<div class="right_pxl_box more_right_abs">
						<img src="<?php echo $assets;?>images/athletes_pxl_plus.svg">
					</div>
				</div>
				<div class="card_pxl_plus">
					<div class="left_pxl_box">
						<h5>Coaches + PXL</h5>
						<p>We know coaches want to support their athletes as best as they can. PXL has tooling, management and evaluations.</p>
						<a href="<?php echo base_url();?>coaches">
							<span>More Details</span>
							<svg width="6" height="10" viewBox="0 0 8 18" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M7.52702 8.73801L0.860352 17.1705L0.860351 0.305513L7.52702 8.73801Z" fill="#F16623"/>
							</svg>
						</a>
					</div>
					<div class="right_pxl_box">
						<img src="<?php echo $assets;?>images/coaches.svg">
					</div>
				</div>
				<div class="card_pxl_plus">
					<div class="left_pxl_box">
						<h5>Federations + PXL</h5>
						<p>Partnerships with federations allow us to help athletes reach the professional level of their sport.</p>
						<a href="#">
							<span>More Details</span>
							<svg width="6" height="10" viewBox="0 0 8 18" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M7.52702 8.73801L0.860352 17.1705L0.860351 0.305513L7.52702 8.73801Z" fill="#F16623"/>
							</svg>
						</a>
					</div>
					<div class="right_pxl_box">
						<img src="<?php echo $assets;?>images/federations.svg">
					</div>
				</div>
			</div>

			<div class="button_mid text-center m-t-5">
				<a href="#" class=" m-t-5">
					<button type="button" class="btn_custom_profile primary">Explore PXL+</button>
				</a>
			</div>
		</div>
	</div>
</form>
	
<?php include("common/footer.php"); ?>
<script type="text/javascript">
	function do_show_data(val){
		if(val == 1){
			$(".yes_div").show();
			$(".no_div").hide();
			$(".flex_profile_double input").attr("required", true);
		} else {
			$(".no_div").show();
			$(".yes_div").hide();
			$(".flex_profile_double input").attr("required", false);
		}
	}
</script>