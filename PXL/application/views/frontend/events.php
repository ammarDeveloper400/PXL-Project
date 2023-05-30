<?php include("common/header.php"); ?>
<style type="text/css">
	
	.products .test_products {
		background: #fff;
		    width: 48%;
	}
	
	.profile_creation {
		margin-top: -110px;
	}
	.players_profile img {
		aspect-ratio: auto;
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
		<div class="right_illustration events_page_illus">
			<img src="<?php echo $assets;?>images/Isolation_Mode.svg" alt="">
		</div>
	</div>
	<div class="profile_creation">
		<h4>Events</h4>
		<div class=" wd100 login_box">
			<div class="products">
				<?php 
					$events = $this->db->query("SELECT * FROM events_affiliates WHERE status = 1 AND type = 1")->result_object();
					foreach ($events as $key => $row) {
				?>
					<div class="test_products players_profile">
						<img src="<?php echo $uploads;?>events/<?php echo $row->image;?>">
						<div class="pro_heading">
							<?php echo $row->title;?>
						</div>
						<div class="date_">
							<?php echo $row->description;?>
						</div>
						
						<div class="button_product text-center">
							<a href="<?php echo $row->link_external;?>" target="_blank">
								<button type="button" class="btn_custom_profile primary">Register</button>
							</a>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<div class="affiliates_wrap">
		<h4>Affiliates</h4>
		<div class=" wd100 login_box">
			<div class="products">
				<?php 
					$events = $this->db->query("SELECT * FROM events_affiliates WHERE status = 1 AND type = 2")->result_object();
					foreach ($events as $key => $row) {
				?>
					<div class="test_products players_profile">
						<img src="<?php echo $uploads;?>events/<?php echo $row->image;?>">
						<div class="pro_heading">
							<?php echo $row->title;?>
						</div>
						<div class="date_">
							<?php echo $row->description;?>
						</div>
						
						<div class="button_product text-center">
							<a href="<?php echo $row->link_external;?>" target="_blank">
								<button type="button" class="btn_custom_profile primary">Register</button>
							</a>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php include("common/footer.php"); ?>