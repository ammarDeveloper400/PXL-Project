<?php include("common/header_dashboard.php"); ?>

<div class="dahboard_boxes">
	<div class="top_boxes_dashboard">
		<?php include("common/setting_common.php"); ?>
		<div class="right_dashbaord dashboard_card d70">
			<div class="head_dash mb_20">
				Edit Profile
			</div>

			<?php include("common/validation.php"); ?>
			<form method="post" action="<?php echo base_url();?>pxl/do_submit_profile?return=1"  enctype='multipart/form-data'>
			<div class="form_proile flex_space_between_start">
				<div class="flex_profile_double">
					<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" id="name" class="form-control custom_input" required placeholder="Enter your Name" value="<?php echo user_info()->full_name;?>" disabled>
					</div>
					<div class="form-group">
							<label><?php echo user_info()->user_type==2?"Rate $ (Per Hour)":"Age";?></label>
							<input type="number" min="0" <?php echo user_info()->user_type==2?"step='0.01'":"";?> name="age" id="age" class="form-control custom_input" required placeholder="Enter your Age" value="<?php echo user_info()->dob;?>">
					</div>

					<?php if(user_info()->user_type==1){?>
						<div class="form-group">
							<label>Weight (Kg)</label>
							<input type="text" onkeyup="value=value.replace(/\D/g,'').substring(0, 3)" name="weight" id="weight" class="form-control custom_input" value="<?php echo user_info()->weight;?>">
						</div>
						<div class="form-group">
							<label>Height (cm)</label>
							<input type="number" min="0" step='1' name="height" id="height" class="form-control custom_input" placeholder="e.g: 180" value="<?php echo user_info()->height;?>">
						</div>

					<?php } ?>

					<div class="form-group">
							<label><?php echo user_info()->user_type==1?"Sport":"Qualification/Certification";?></label>
							<?php if(user_info()->user_type==1){?>
								<select name="sports" id="sports" class="form-control custom_input" required>
									<option value="">--Select Sport--</option>
								<?php 
								$sports = $this->db->query("SELECT * FROM sports WHERE status = 1 ORDER BY title ASC")->result_object();
								foreach($sports as $key=>$sport){
								?>
									<option <?php echo $sport->id == user_info()->current_sport?"SELECTED":"";?> value="<?php echo $sport->id;?>"><?php echo $sport->title;?></option>
									<?php } ?>
								</select>
							<?php } else { ?>
								<input type="text" name="sports" id="sports" class="form-control custom_input" required placeholder="Qualification/Certification" value="<?php echo user_info()->current_sport;?>">
							<?php } ?>
					</div>

					<div class="form-group">
							<label>Address</label>
							<input type="text" name="address" id="address" class="form-control custom_input" required placeholder="Enter your Address" value="<?php echo user_info()->address;?>">
					</div>

					<div class="form-group">
							<label>Phone Number</label>
							<input type="text" name="phone" id="phone" class="form-control custom_input" required placeholder="Enter your Phone Number" value="<?php echo user_info()->phone;?>">
					</div>

					<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" id="email" class="form-control custom_input" required placeholder="Enter your Email"  value="<?php echo user_info()->email;?>" disabled>
					</div>

					<div class="form-group wd100">
							<label>Country</label>
							<select name="country" id="country" class="form-control custom_input" required>
								<option value="">--Select Country--</option>
								<?php
									$countries = $this->db->query("SELECT * FROM countries ORDER BY name ASC")->result_object();
									foreach ($countries as $key => $country) {
								?>
									<option <?php echo $country->id == user_info()->country?"SELECTED":"";?> value="<?php echo $country->id;?>"><?php echo $country->name;?></option>
								<?php } ?>
							</select>
					</div>


					<?php if(user_info()->user_type==2){?>
						<div class="form-group wd100">
							<label>Overview</label>
							<textarea name="overview" class="form-control custom_input" rows="3"><?php echo strip_tags(user_info()->overview);?></textarea>
						</div>
						<div class="form-group wd100">
							<label>Experience</label>
							<textarea name="experience" class="form-control custom_input" rows="3"><?php echo strip_tags(user_info()->experience);?></textarea>
						</div>

					<?php } ?>



					<div class="form-group wd100">
							<label>Photo</label>
							<div class="abs_icon right_svg custom_input">
								<div class="svg">
									<svg width="27" height="20" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_761_3450)">
										<path d="M23.9081 13.6078L14.0368 23.4791C12.6666 24.8142 10.8256 25.5558 8.91248 25.5433C6.99939 25.5309 5.1682 24.7654 3.81542 23.4126C2.46264 22.0598 1.69714 20.2286 1.68469 18.3155C1.67225 16.4024 2.41384 14.5614 3.74891 13.1912L13.9151 3.02499C14.8246 2.11548 16.0582 1.60452 17.3444 1.60452C18.6306 1.60452 19.8642 2.11548 20.7737 3.02499C21.6832 3.9345 22.1942 5.16806 22.1942 6.4543C22.1942 7.74054 21.6832 8.9741 20.7737 9.88361L10.9007 19.7566C10.446 20.2113 9.8292 20.4668 9.18608 20.4668C8.54296 20.4668 7.92618 20.2113 7.47142 19.7566C7.01667 19.3018 6.76119 18.6851 6.76119 18.0419C6.76119 17.3988 7.01667 16.782 7.47142 16.3273L17.0495 6.74922" stroke="#BABABA" stroke-width="1.60749"/>
										</g>
										<defs>
										<clipPath id="clip0_761_3450">
										<rect width="25.7198" height="25.7198" fill="white" transform="translate(0.760254 0.74707)"/>
										</clipPath>
										</defs>
									</svg>
								</div>
							<span>Upload your Photo</span>
						</div>
						<?php if(user_info()->profile_pic != ""){?>
							<img class="user_photo" id="blah" src="<?php echo $uploads;?>profiles/<?php echo user_info()->profile_pic;?>" >
						<?php } ?> 
					</div>
					<input type="file" name="logo" id="file" style="display: none;" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
				</div>
			</div>
			<div class="button_mid text-center">
				<button type="submit" class="btn_custom_profile primary">Update</button>
			</div>
			</form>
		</div>
	</div>
</div>
<?php include("common/footer_dashboard.php"); ?>
<script type="text/javascript">
	$(".right_svg").on("click", function(){
		$("#file").click();
		// alert("a");
	})
</script>