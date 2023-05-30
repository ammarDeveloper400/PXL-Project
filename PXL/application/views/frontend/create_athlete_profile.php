<?php include("common/header_dashboard.php"); ?>
<style type="text/css">
	.top_boxes_dashboard {
		justify-content: center;
	}
</style>
<div class="dahboard_boxes">
	<div class="top_boxes_dashboard">
		<div class="right_dashbaord dashboard_card d70">
			<div class="head_dash mb_20">
				Create Athlete Profile
			</div>
			<p>Fill below form to create your Athlete Profile</p>

			<?php include("common/validation.php"); ?>

			<?php 
				$user = $this->db->query("SELECT * FROM users WHERE user_type = 1 AND email = '".user_info()->email."'")->num_rows();
				if($user > 0){
			?>

				<div class="already_setup">
						Athlete Profile with email (<?php echo user_info()->email;?>) already been created.
						<br>
				</div>
			<?php } else { ?>
			<form method="post" action="<?php echo base_url();?>pxl/do_create_athlete_profile"  enctype='multipart/form-data'>
			<div class="form_proile flex_space_between_start">
				<div class="flex_profile_double">
					<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" id="name" class="form-control custom_input" required placeholder="Enter your Name" value="<?php echo user_info()->full_name;?>">
					</div>
					

					<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" id="email" class="form-control custom_input" required placeholder="Enter your Email"  value="<?php echo user_info()->email;?>" disabled>
					</div>

					<div class="form-group wd100">
							<label>Password</label>
							<input type="password" name="password" id="password" class="form-control custom_input" required placeholder="Enter Password"  value="">
					</div>

				</div>
			</div>
			<div class="button_mid text-center">
				<button type="submit" class="btn_custom_profile primary">Create Athlete Profile</button>
			</div>
			</form>
			<?php } ?>
		</div>
	</div>
</div>
<?php include("common/footer_dashboard.php"); ?>
