<?php include("common/header_dashboard.php"); ?>

<?php 
if($row->country != null){
	$country = $this->db->query("SELECT * FROM countries WHERE id = ".$row->country)->result_object()[0]; 
}
?>


<div class="dahboard_boxes">
	<div class="dashboard_card wd100 text-center">
			<div class="coach_wrap">

				<?php 
					
				?>
				
				<div class="coach_image_info">
					<img src="<?php echo $uploads;?>profiles/<?php echo $row->profile_pic;?>">
					<div class="right_info_coach">
						<b><?php echo $row->full_name; ?></b>
						<p class="coach_certificate"><?php echo $row->current_sport;?></p>
						<p class="coach_certificates">Hourly Rate: $<?php echo $row->dob;?></p>
						<?php if($row->country != null){ ?>
						<p class="address_coach"><i class="fa fa-map-marker"></i><?php echo $row->address;?>, <?php echo $country->name;?></p>
						<?php } ?>
					</div>
				</div>
				<div class="button_profile_edit">
					<?php if($id == 0){ ?>
						<a href="<?php echo base_url();?>public/profile">
						<button class="profile_coach_edit">Edit Profile</button>
						</a>
					<?php } else {?>
						<a href="<?php echo base_url();?>conversation/<?php echo $user_id;?>">
							<button class="profile_coach_edit">Contact</button>
						</a>
					<?php } ?>
				</div>
			</div>

			<div class="overview_div">
				<h5>Overview</h5>
				<div class="overview_text">
					<p>
						<?php echo $row->overview;?>
					</p>
				</div>
			</div>

			<div class="overview_div">
				<h5>Experience</h5>
				<div class="overview_text">
					<p>
						<?php echo $row->experience;?>
					</p>
				</div>
			</div>

	</div>
</div>


<?php include("common/footer_dashboard.php"); ?>
