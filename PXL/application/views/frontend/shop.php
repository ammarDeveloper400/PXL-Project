<?php include("common/header.php"); ?>
<style type="text/css">
	.close_icon {
		right: 54px;
    	top: 18px;
	}
</style>

	<div class="flex_space_between_start">
		<div class="left_side_number">
			<div class="left_big_heading">
				<h1>
					<?php echo $text;?>
				</h1>
			</div>
			<?php  ?>
			<div class="search_shop">
				<input type="text" name="search" id="search-box" class="search_products" value="" placeholder="Type to search">
				<div class="close_icon" id="close">
					clear
				</div>
				<div class="search_svg">
					<svg width="24" height="25" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M11.6339 4.11854C9.57693 4.11854 7.60417 4.93564 6.14964 6.39009C4.69512 7.84455 3.87798 9.81721 3.87798 11.8741C3.87798 13.931 4.69512 15.9037 6.14964 17.3581C7.60417 18.8126 9.57693 19.6297 11.6339 19.6297C13.6909 19.6297 15.6637 18.8126 17.1182 17.3581C18.5727 15.9037 19.3899 13.931 19.3899 11.8741C19.3899 9.81721 18.5727 7.84455 17.1182 6.39009C15.6637 4.93564 13.6909 4.11854 11.6339 4.11854ZM2.20001e-07 11.8741C-0.000233434 10.0432 0.431701 8.23813 1.26068 6.60564C2.08965 4.97315 3.29225 3.55935 4.77068 2.47925C6.24911 1.39914 7.96161 0.683223 9.76891 0.389715C11.5762 0.0962064 13.4273 0.233398 15.1715 0.79013C16.9158 1.34686 18.5041 2.30742 19.8071 3.59367C21.1101 4.87992 22.0911 6.45555 22.6704 8.19241C23.2496 9.92927 23.4107 11.7783 23.1405 13.5892C22.8704 15.4 22.1766 17.1215 21.1156 18.6137L30.4557 27.9534C30.8089 28.3191 31.0043 28.8088 30.9999 29.3172C30.9955 29.8256 30.7916 30.3119 30.4321 30.6714C30.0726 31.0309 29.5863 31.2348 29.0779 31.2392C28.5695 31.2436 28.0797 31.0482 27.714 30.695L18.3758 21.3573C16.6353 22.5948 14.5877 23.3294 12.4574 23.4806C10.3271 23.6317 8.19625 23.1936 6.29842 22.2142C4.40059 21.2348 2.80899 19.7519 1.69802 17.928C0.587049 16.1042 -0.000415042 14.0097 2.20001e-07 11.8741Z" fill="#F16623"/>
					</svg>
				</div>

				<div id="suggesstion-box"></div>
			</div>
			<?php  ?>
		</div>
		<div class="right_illustration">
			<img src="<?php echo $assets;?>images/shop.png" alt="">
		</div>
	</div>

	<div class="profile_creation">
		<div class=" wd100 login_box">
			<?php  /* ?>
			<div class="wd100" style="padding: 30px;text-align: center;">
				<div class="wd50" style="margin:auto;font-size: 17px;">
					We have partnerships with companies to bring you the highest quality testing. Testing is available for a reduced cost through PXL at Quantum Diagnostics.
				</div>
			</div>

			<div class="button_mid text-center">
				<a href="mailto:pxlcorporate@gmail.com" class="">
					<button type="button" class="btn_custom_profile primary">Get in touch for testing</button>
				</a>
			</div>
			<?php */ ?>
			
			<div class="products_shop_wrap">
				<?php
					$products = $this->db->query("SELECT * FROM products WHERE status = 1 ORDER BY id DESC")->result_object();
					foreach ($products as $key => $row) {
				?>
					<div class="product_box">
						<div class="image_shop">
							<img src="<?php echo $uploads;?>products/<?php echo $row->image;?>">
						</div>
						<div class="info_shop">
							<h4><?php echo $row->title;?></h4>
							<p><?php echo substr($row->description,0,120);?></p>
							<span>$<?php echo $row->price;?></span>
						</div>
						<div class="button_shop">
							<a href="<?php echo base_url();?>shop/account/<?php echo $row->id;?>">
								<button type="button" class="btn_custom_small primary">Buy</button>
							</a>
						</div>
					</div>
				<?php } ?>
			</div>

			<!-- <div class="button_mid text-center m-t-5">
				<a href="#" class=" m-t-5">
					<button type="button" class="btn_custom_profile primary">More</button>
				</a>
			</div> -->

			
		</div>
	</div>
<?php include("common/footer.php"); ?>
<script type="text/javascript">
	// AJAX call for autocomplete 
$(document).ready(function() {
	$("#close").on("click", function(){
		$("#close").hide();
		$("#suggesstion-box").hide();
		$("#search-box").val('');
	});
	$("#search-box").keyup(function() {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>pxl/get_products",
			data: 'keyword=' + $(this).val(),
			beforeSend: function() {
				$("#search-box").css("background", "#FFF url(<?php echo $assets;?>images/loaderIcon.gif) no-repeat right");
			},
			success: function(data) {
				$("#close").show();
				$("#suggesstion-box").show();
				$("#suggesstion-box").html(data);
				$("#search-box").css("background", "#FFF");
			}
		});
	});
});
</script>