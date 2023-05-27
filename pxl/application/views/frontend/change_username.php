<?php include("common/header_dashboard.php"); ?>

<div class="dahboard_boxes">
	<div class="top_boxes_dashboard">
		<?php include("common/setting_common.php"); ?>
		<div class="right_dashbaord dashboard_card d70">
			<div class="head_dash mb_20">
				Change Username
			</div>

			<?php include("common/validation.php"); ?>
			<form method="post" action="<?php echo base_url();?>pxl/do_update_username"  enctype='multipart/form-data'>
			<div class="form_proile flex_space_between_start">
				<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" id="username" class="form-control custom_input" required placeholder="Enter your username" value="<?php echo user_info()->username;?>">
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