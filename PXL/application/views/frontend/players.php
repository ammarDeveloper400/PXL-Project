<?php include("common/header.php"); ?>
<style type="text/css">
	
	.products .test_products {
		background: #fff;
		box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.25);
		border-radius: 10px;
    	width: 23.7%;
    	margin-top: 120px;
	}
	.test_products img {
		margin-top: -115px;
	}
	.products {
		justify-content: flex-start;
		gap: 20px;
	}
	.profile_creation {
		position: relative;
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
			<img src="<?php echo $assets;?>images/playerss.png" alt="">
		</div>
	</div>
	<div class="profile_creation">
		<div class="search_option">
			<div  onclick="do_show_search_box()">
				Search Players <i class="fa fa-search" aria-hidden="true"></i>
			</div>

			<?php if(isset($_GET['search_q']) && $_GET['search_q'] != ""){ ?>
				<a href="<?php echo base_url();?>players" style="color: red; margin-top: 5px;">Clear Search</a>
			<?php } ?>
		</div>
		<div class=" wd100 login_box">
			<div class="products">
				<?php 
					// $players = $this->db->query("SELECT * FROM users WHERE status = 1 AND user_type = 1")->result_object();
					
					if(isset($_GET['search_q']) && $_GET['search_q'] != ""){
							$players = $this->db->query("SELECT * FROM users WHERE id != ".user_info()->id." 
								AND (LOWER(full_name) LIKE '%".strtolower($_GET['search_q'])."%' OR LOWER(current_sport) LIKE '%".strtolower($_GET['search_q'])."%') 
								AND status = 1 AND user_type = 1 AND is_public = 1")->result_object();
					} else {
						$players = $this->db->query("SELECT * FROM users WHERE id != ".user_info()->id." AND status = 1 AND user_type = 1 AND is_public = 1")->result_object();
					}

					if(empty($players)){
						echo "<span style='color:red; width: 100%; text-align: center;'>No Record Found!</span>";
					}
					
					foreach ($players as $key => $row) {

						$sport = $this->db->query("SELECT * FROM sports WHERE id = '".$row->current_sport."'")->result_object()[0];
				?>
					<div class="test_products players_profile">
						<div class="image_user_player">
							<img src="<?php echo $uploads;?>profiles/<?php echo $row->profile_pic;?>">
						</div>
						<div class="lower_profile_view">
							<div class="pro_heading text-center">
								<?php echo $row->full_name;?>
							</div>
							<div class="date_ text-center">
								<?php echo $sport->title;?>
							</div>
							<div class="button_product text-center">
								<a href="<?php echo base_url();?>conversation/<?php echo $row->id;?>">
									<button type="button" class="btn_custom_profile primary">Message</button>
								</a>
								<button type="button" class="btn_custom_profile secondary">Profile</button>
							</div>
						</div>
						
						
					</div>
				<?php } ?>
			</div>
		</div>
	</div>




<div class="booking_box">
	<div class="popup_outer ">
		<div class="popup_inner">
			<div class="popup_header">
				<h4>Search for a <span>Players.</span></h4>
				<img onclick="close_popup()" src="<?php echo $assets;?>images/close_icon.png">
			</div>
			
			<div class="">
				<form action="<?php echo base_url();?>players" method="get">
						<div class="form-group wd100">
							<div class="relative">
								<input type="text" name="search_q" id="search_q" class="form-control custom_input" placeholder="Search by name" required>
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