<?php include("common/header.php"); ?>
<?php include("common/profile_steps.php"); ?>
<form method="post" action="<?php echo base_url();?>pxl/do_invite_coaches"  enctype='multipart/form-data'>
	<div class="profile_creation">
		<div class="card wd100 login_box">
			<div class="invite_coach">
				<h3>Would you like to <span>invite</span>/<span>add</span> a coach?</h3>
			</div>

			<div class="form_proile flex_space_between_start">
				<div class=" wd50 double_wrap margin-right-25">
				<div class="form-group">
						<label>Enter Their Email </label>
						<small>If you don't have their email, we can add your coach through the dashboard later.</small>
						<input type="email" name="email_coach" id="email_coach" class="form-control custom_input" required placeholder="Enter their Email" style="    background-color: transparent !important;border-color: #BABABA;border-width: 2px;">
				</div>

				<div class="button_mid text-center m-t-5">
					<button type="submit" class="btn_custom_profile primary">Next</button>
					<a href="<?php echo base_url();?>testing">
						<button type="button" class="btn_custom_profile primary onlyborder">Skip</button>
					</a>
				</div>
				</div>
				<div class="svg_frame">
					<img src="<?php echo $assets;?>images/Frame.png">
				</div>
				
			</div>

			
		</div>
	</div>
</form>
	
<?php include("common/footer.php"); ?>
<script type="text/javascript">
	$(".right_svg").on("click", function(){
		$("#file").click();
		// alert("a");
	})
</script>