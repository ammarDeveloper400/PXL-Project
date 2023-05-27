<?php include("common/header_dashboard.php"); ?>
<?php
	$testing = $this->db->query("SELECT * FROM athlete_evaluation WHERE uID = ".user_info()->id)->result_object()[0];
	$testing = json_decode($testing->evaluation_data);
?>
<div class="dahboard_boxes">
	<div class="top_boxes_dashboard">
		<div class="right_dashbaord dashboard_card d100">
			<div class="head_dash mb_20">
				Athletic Evaluation
			</div>

			<?php include("common/validation.php"); ?>
			<form method="post" action="<?php echo base_url();?>pxl/do_submit_athletic_evaluation?return=1" enctype='multipart/form-data'>
			<div class="form_proile flex_space_between_start">
				<div class="flex_profile_doubles">
						<div class="form-group">
								<label>How many jump squats can you do in 1 min?</label>
								<input type="text" name="field_1" id="field_1" class="form-control custom_input" required value="<?php echo $testing->field_1;?>" placeholder="Enter Value">
						</div>
						<div class="form-group">
							<label>How many push ups can you do in 1 min?</label>
							<input type="text" name="field_2" id="field_2" class="form-control custom_input" required value="<?php echo $testing->field_2;?>" placeholder="Enter Value">
						</div>

						<div class="form-group">
							<label>How many superman’s can you do in 1 min?</label>
							<input type="text" name="field_3" id="field_3" class="form-control custom_input" required value="<?php echo $testing->field_3;?>" placeholder="Enter Value">
						</div>
						<div class="form-group">
							<label>How many glute bridges can you do on each leg?</label>
							<input type="text" name="field_4" id="field_4" class="form-control custom_input" required value="<?php echo $testing->field_4;?>" placeholder="Enter Value">
						</div>
						<div class="form-group">
							<label>How long can you hold the heel elevated wall sit?</label>
							<input type="text" name="field_5" id="field_5" class="form-control custom_input" required value="<?php echo $testing->field_5;?>" placeholder="Enter Value">
						</div>
						<div class="form-group">
							<label>How many reverse lunges can you do in 1 min?</label>
							<input type="text" name="field_6" id="field_6" class="form-control custom_input" required value="<?php echo $testing->field_6;?>" placeholder="Enter Value">
						</div>
						<div class="form-group">
							<label>How any skater jumps can you do in 1 min?</label>
							<input type="text" name="field_7" id="field_7" class="form-control custom_input" required value="<?php echo $testing->field_7;?>" placeholder="Enter Value">
						</div>
						<div class="form-group">
							<label>How many plank jacks can you do in 1 min?</label>
							<input type="text" name="field_8" id="field_8" class="form-control custom_input" required value="<?php echo $testing->field_8;?>" placeholder="Enter Value">
						</div>
						<div class="form-group">
							<label>How many Pilates crunches can you do in 1 min</label>
							<input type="text" name="field_9" id="field_9" class="form-control custom_input" required value="<?php echo $testing->field_9;?>" placeholder="Enter Value">
						</div>
						<div class="form-group">
							<label>How many burpee tuck jumps can you do in 1 min?</label>
							<input type="text" name="field_10" id="field_10" class="form-control custom_input" required  value="<?php echo $testing->field_10;?>" placeholder="Enter Value">
						</div>

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