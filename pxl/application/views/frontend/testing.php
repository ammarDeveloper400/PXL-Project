<?php include("common/header.php"); ?>

<?php include("common/profile_steps.php"); ?>
<form method="post" action="<?php echo base_url();?>pxl/do_submit_testing"  enctype='multipart/form-data'>
	<div class="profile_creation">
		<?php include("common/validation.php"); ?>
		<div class="card wd100 login_box">
			<div class="card_profile_">
				<h3>Testing</h3>
				<span>Have you ever had blood <span style="color:var(--primary-color)">Testing</span> and do you have a<br>report in hand?</span>
			</div>

			<div class="form-group tested_question">
				<label>
					<input required type="radio" name="tested" value="1" onclick="do_show_data(1)">
					Yes
				</label>
				<label>
					<input required type="radio" name="tested" value="0" onclick="do_show_data(0)">
					No
				</label>
			</div>

			<div class="form_proile flex_space_between_start yes_div" style="display: none;">
					<div class="flex_profile_double">
						<div class="form-group">
								<label>Hemoglobin</label>
								<input type="text" name="hemoglobin" id="hemoglobin" class="form-control custom_input" placeholder="" value="<?php echo $testing->hemoglobin;?>">
						</div>
						<div class="form-group">
							<label>Hematocrit</label>
							<input type="text" name="hematocrit" id="hematocrit" class="form-control custom_input" placeholder="" value="<?php echo $testing->hematocrit;?>">
						</div>

						<div class="form-group">
							<label>White Blood Cell Count</label>
							<input type="text" name="white_blood_count" id="white_blood_count" class="form-control custom_input" placeholder="" value="<?php echo $testing->white_blood_count;?>">
						</div>
						<div class="form-group">
							<label>Platelet Count</label>
							<input type="text" name="platelet_count" id="platelet_count" class="form-control custom_input" placeholder="" value="<?php echo $testing->platelet_count;?>">
						</div>
						<div class="form-group">
							<label>Glucose</label>
							<input type="text" name="glucose" id="glucose" class="form-control custom_input" placeholder="" value="<?php echo $testing->glucose;?>">
						</div>
						<div class="form-group">
							<label>Creatine Kinase</label>
							<input type="text" name="creatine" id="creatine" class="form-control custom_input" placeholder="" value="<?php echo $testing->creatine;?>">
						</div>
						<div class="form-group">
							<label>Aspartate aminotransferase (AST)</label>
							<input type="text" name="ast" id="ast" class="form-control custom_input" placeholder="" value="<?php echo $testing->ast;?>">
						</div>
						<div class="form-group">
							<label>Alanine aminotransferase (ALT)</label>
							<input type="text" name="alt" id="alt" class="form-control custom_input" placeholder="" value="<?php echo $testing->alt;?>">
						</div>
						<div class="form-group">
							<label>Total protein</label>
							<input type="text" name="protein" id="protein" class="form-control custom_input" placeholder="" value="<?php echo $testing->protein;?>">
						</div>
						<div class="form-group">
							<label>Anion Gap</label>
							<input type="text" name="anion" id="anion" class="form-control custom_input" placeholder="" value="<?php echo $testing->anion;?>">
						</div>






						<div class="form-group wd100">
								<label>Upload your test</label>

								<input type="file" id="input-file-disable-remove logo" class="dropify" data-show-errors="true" data-show-loader="true" data-errors-position="outside" data-show-remove="false" name="file_test" data-allowed-file-extensions="pdf" data-default-file="<?php echo base_url()."resources/uploads/collection/".$testing->test_1; ?>" />
								<small>Only .pdf file allowed.</small>
						</div>
						
					</div>
					<div class="right_image_girl">
						<img src="<?php echo $assets;?>images/profile.png" alt="">
						<div class="bar text-center m-t-5" style="margin-left: 55px; margin-top: 60px;">
							<svg width="300" height="10" viewBox="0 0 402 10" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect x="0.652832" y="0.726562" width="400.8" height="8.57327" rx="4.28664" fill="#E8E8E8"/>
								<rect x="0.652832" y="0.726562" width="113.596" height="8.57327" rx="4.28664" fill="#F16623"/>
							</svg>
						</div>
					</div>
			</div>

				<div class="no_div" style="display: none;">
					<div class="card_profile_">
						<span>Would you like to register for biological testing?</span>
					</div>

					<div class="products">
						<?php for($i=1;$i<=4;$i++){?>
							<div class="test_products">
								<img src="<?php echo $assets;?>images/dummy_testing.png">
								<div class="pro_heading">
									Bio Laboratory
								</div>
								<div class="pro_descp">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent convallis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent convallis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent convallis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent convallis.
								</div>
								<div class="button_product text-center">
									<button type="button" class="btn_custom_profile primary">Buy</button>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>



			<div class="button_mid text-center m-t-5">
				<button type="submit" class="btn_custom_profile primary">Next</button>
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