<?php include("common/header.php"); ?>
<style type="text/css">
	
	.products .test_products {
		background: #fff;
		box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.25);
		border-radius: 10px;
		margin-top: 80px;
    	
	}
	.test_products img {
		margin-top: -115px;
	}
	
	.players_profile img {
		aspect-ratio: auto;
	}
	.players_profile .button_product {
		justify-content: space-between;
	}
	.onlyborder {
		border-width: 1px;
		margin-left: 0;
	}
	.profile_creation {
		position: relative;
		margin-top: 0;
	}
	.players_profile .date_ {
		margin-bottom: 10px;
	}
	.button_product  button {
		height: 50px;
    	width: 50%;
	}
	.button_product .onlyborder{
		font-size: 12px
	}
</style>
	<div class="flex_space_between_start">
		<div class="left_side_number">
			<div class="left_big_heading">
				<h1>
					<?php echo $heading;?>
				</h1>
				<p><?php echo $text;?></p>
			</div>
		</div>
		<div class="right_illustration">
			<img src="<?php echo $assets;?>images/coach_page_.svg" alt="">
		</div>
	</div>

	
	<div class="profile_creation">
		<div class="label_sorting">
			<label>Sort</label>
			<select name="sorting" id="sorting">
				<option value="">PXL Rating</option>
			</select>



		</div>

		<div class="search_option">

			<div  onclick="do_show_search_box()">
				Search Coaches <i class="fa fa-search" aria-hidden="true"></i>
			</div>

			<?php if(isset($_GET['search_q']) && $_GET['search_q'] != ""){ ?>
				<a href="<?php echo base_url();?>coaches" style="color: red; margin-top: 5px;">Clear Search</a>
			<?php } ?>
		</div>



		<div class=" wd100 login_box">
			<div class="products">

				<?php 
					if(isset($_GET['search_q']) && $_GET['search_q'] != ""){
						$players = $this->db->query("SELECT * FROM users WHERE id != ".user_info()->id." 
							AND (LOWER(full_name) LIKE '%".strtolower($_GET['search_q'])."%' OR LOWER(current_sport) LIKE '%".strtolower($_GET['search_q'])."%') 
							AND status = 1 AND user_type = 2")->result_object();
					} else {
						$players = $this->db->query("SELECT * FROM users WHERE id != ".user_info()->id." AND status = 1 AND user_type = 2")->result_object();
					}

					if(empty($players)){
						echo "<span style='color:red; width: 100%; text-align: center;'>No Record Found!</span>";
					}
					foreach ($players as $key => $row) {
				?>
				<?php 
					
					//for($i=1;$i<=6;$i++) {
				?>
					<div class="test_products players_profile">
						<div class="image_user_player">
							<img src="<?php echo $uploads;?>profiles/<?php echo $row->profile_pic;?>">
						</div>
						<div class="lower_profile_view">
							<div class="pro_heading text-center">
								<?php echo $row->full_name;?>
							</div>
							<div class="date_ text-center" style="    min-height: 15px;">
								<?php echo $row->current_sport;?>
							</div>

							<div class="rating" style="text-align: center;margin-bottom: 20px;">
								<?php for($j=1;$j<=5;$j++){ /*?>
								<svg width="28" height="28" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M23.8951 19.593C23.5498 19.9277 23.3911 20.4117 23.4698 20.8863L24.6551 27.4463C24.7551 28.0023 24.5204 28.565 24.0551 28.8863C23.5991 29.2197 22.9924 29.2597 22.4951 28.993L16.5898 25.913C16.3844 25.8037 16.1564 25.745 15.9231 25.7383H15.5618C15.4364 25.757 15.3138 25.797 15.2018 25.8583L9.29509 28.953C9.00309 29.0997 8.67242 29.1517 8.34842 29.0997C7.55909 28.9503 7.03242 28.1983 7.16176 27.405L8.34842 20.845C8.42709 20.3663 8.26842 19.8797 7.92309 19.5397L3.10842 14.873C2.70576 14.4823 2.56576 13.8957 2.74976 13.3663C2.92842 12.8383 3.38442 12.453 3.93509 12.3663L10.5618 11.405C11.0658 11.353 11.5084 11.0463 11.7351 10.593L14.6551 4.60634C14.7244 4.47301 14.8138 4.35034 14.9218 4.24634L15.0418 4.15301C15.1044 4.08367 15.1764 4.02634 15.2564 3.97967L15.4018 3.92634L15.6284 3.83301H16.1898C16.6911 3.88501 17.1324 4.18501 17.3631 4.63301L20.3218 10.593C20.5351 11.029 20.9498 11.3317 21.4284 11.405L28.0551 12.3663C28.6151 12.4463 29.0831 12.833 29.2684 13.3663C29.4431 13.901 29.2924 14.4877 28.8818 14.873L23.8951 19.593Z" fill="#F1C423"/>
								</svg>
								<?php */} ?>

							</div>
						
							<div class="button_product text-center">
								<a class="profile_coa" href="<?php echo base_url();?>conversation/<?php echo $row->id;?>">
									<button type="button" class="btn_custom_profile onlyborder">Contact</button>
								</a>
								</a>
								<a class="profile_coa" href="<?php echo base_url();?>profile/coach/<?php echo $row->id;?>">
									<button type="button" class="btn_custom_profile primary">Profile</button>
								</a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<!-- <div class="button_mid text-center m-t-5">
				<a href="#">
					<button type="button" class="btn_custom_profile primary">More</button>
				</a>
			</div> -->
		</div>
	</div>



<div class="booking_box">
	<div class="popup_outer ">
		<div class="popup_inner">
			<div class="popup_header">
				<h4>Search for a <span>Coach.</span></h4>
				<img onclick="close_popup()" src="<?php echo $assets;?>images/close_icon.png">
			</div>
			
			<div class="">
				<form action="<?php echo base_url();?>coaches" method="get">
						<div class="form-group wd100">
							<div class="relative">
								<input type="text" name="search_q" id="search_q" class="form-control custom_input" placeholder="Search by name or specialization" required>
							</div>
						</div>
						
						<div class="button_mid text-center">
							<button class="btn_custom_small primary">Search</button>
						</div>

					</div>
				</form>
			</div>
			
	</div>
</div>

<?php include("common/footer.php"); ?>

<script type="text/javascript">
	function do_show_search_box(){
		$(".booking_box").show();
	}
	function close_popup(){
		$(".booking_box, .confirm_book").fadeOut();
	}
</script>