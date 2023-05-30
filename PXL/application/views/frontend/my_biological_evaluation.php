<?php include("common/header_dashboard.php"); ?>
<?php
	$testing = $this->db->query("SELECT * FROM testing WHERE uID = ".user_info()->id)->result_object()[0];
?>
<div class="dahboard_boxes">
	<div class="top_boxes_dashboard">
		<div class="right_dashbaord dashboard_card d100">
			<div class="head_dash mb_20">
				Biological Evaluation
			</div>

			<?php include("common/validation.php"); ?>
			<form method="post" action="<?php echo base_url();?>pxl/do_submit_testing?return=1" enctype='multipart/form-data'>
			<div class="form_proile flex_space_between_start">
				<div class="flex_profile_double">
						<div class="form-group">
								<label>Hemoglobin</label>
								<input type="text" name="hemoglobin" id="hemoglobin" class="form-control custom_input" placeholder="" value="<?php echo $testing->hemoglobin;?>" required>
						</div>
						<input name="tested" value="1" type="hidden">
						<div class="form-group">
							<label>Hematocrit</label>
							<input type="text" name="hematocrit" id="hematocrit" class="form-control custom_input" placeholder="" value="<?php echo $testing->hematocrit;?>" required>
						</div>

						<div class="form-group">
							<label>White Blood Cell Count</label>
							<input type="text" name="white_blood_count" id="white_blood_count" class="form-control custom_input" placeholder="" value="<?php echo $testing->white_blood_count;?>" required>
						</div>
						<div class="form-group">
							<label>Platelet Count</label>
							<input type="text" name="platelet_count" id="platelet_count" class="form-control custom_input" placeholder="" value="<?php echo $testing->platelet_count;?>" required>
						</div>
						<div class="form-group">
							<label>Glucose</label>
							<input type="text" name="glucose" id="glucose" class="form-control custom_input" placeholder="" value="<?php echo $testing->glucose;?>" required>
						</div>
						<div class="form-group">
							<label>Creatine Kinase</label>
							<input type="text" name="creatine" id="creatine" class="form-control custom_input" placeholder="" value="<?php echo $testing->creatine;?>" required>
						</div>
						<div class="form-group">
							<label>Aspartate aminotransferase (AST)</label>
							<input type="text" name="ast" id="ast" class="form-control custom_input" placeholder="" value="<?php echo $testing->ast;?>" required>
						</div>
						<div class="form-group">
							<label>Alanine aminotransferase (ALT)</label>
							<input type="text" name="alt" id="alt" class="form-control custom_input" placeholder="" value="<?php echo $testing->alt;?>" required>
						</div>
						<div class="form-group">
							<label>Total protein</label>
							<input type="text" name="protein" id="protein" class="form-control custom_input" placeholder="" value="<?php echo $testing->protein;?>" required>
						</div>
						<div class="form-group">
							<label>Anion Gap</label>
							<input type="text" name="anion" id="anion" class="form-control custom_input" placeholder="" value="<?php echo $testing->anion;?>" required>
						</div>

						<div class="form-group wd100">
								<label>Upload your test</label>

								<input type="file" id="input-file-disable-remove logo" class="dropify" data-show-errors="true" data-show-loader="true" data-errors-position="outside" data-show-remove="false" name="file_test" data-allowed-file-extensions="pdf" data-default-file="<?php echo base_url()."resources/uploads/collection/".$testing->test_1; ?>" />
								<small>Only .pdf file allowed.</small>
						</div>

						<?php if($testing->test_1!=null){?>
							<a href="<?php echo base_url()."resources/uploads/collection/".$testing->test_1; ?>" download><b>Download Test</b></a>
						<?php } ?>
						
					</div>
			</div>
			<div class="button_mid pull-right">
				<button type="submit" class="btn_custom_profile primary">Save Evaluation</button>
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