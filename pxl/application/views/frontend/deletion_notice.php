<?php include("common/header_dashboard.php"); ?>

<style type="text/css">
	.auto_center {
		height: 100vh;
	    display: flex;
	    justify-content: center;
	    align-items: center;
	}
</style>
<div class="auto_center">
<div class="dahboard_boxes" >
	<div class="text-center card">
			<h2>Account Deletion</h2>
			<br>
			Your acocunt will be delete permanently on "<?php echo date("F d Y",strtotime(user_info()->delete_date));?>".<br>

			If you would like to reverse this process, click below.

			<br>
			<br>

			<a href="<?php echo base_url();?>pxl/cancel_deletion">
				<div class="button_delete">
					<button type="button" class="btn_custom_profile primary">Cancel</button>
				</div>
			</a>
	</div>
</div>

<?php include("common/footer_dashboard.php"); ?>
</div>