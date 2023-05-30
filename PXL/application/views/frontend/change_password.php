<?php include("common/header_dashboard.php"); ?>

<div class="dahboard_boxes">
	<div class="top_boxes_dashboard">
		<?php include("common/setting_common.php"); ?>
		<div class="right_dashbaord dashboard_card d70">
			<div class="head_dash mb_20">
				Change Password
			</div>

			<?php include("common/validation.php"); ?>
			<form method="post" action="">
			<div class="form_proile ">
				<div class="form-group">
					<label>Old Password</label>
					<input type="password" name="opass" id="opass" class="form-control custom_input" required placeholder="">
				</div>
				<div class="form-group">
					<label>New Password</label>
					<input type="password" name="npass" id="npass" class="form-control custom_input" required placeholder="">
				</div>
				<div class="form-group">
					<label>Confirm New Password</label>
					<input type="password" name="cnpass" id="cnpass" class="form-control custom_input" required placeholder="">
				</div>
			</div>
			<div class="button_mid text-center m-t">
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