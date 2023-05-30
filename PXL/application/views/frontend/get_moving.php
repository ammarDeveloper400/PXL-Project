<?php include("common/header.php"); ?>
<style type="text/css">
	
</style>
<?php include("common/profile_steps.php"); ?>
<form method="post" action="<?php echo base_url();?>pxl/do_submit_testing"  enctype='multipart/form-data'>
	<div class="profile_creation">
		<?php include("common/validation.php"); ?>
		<div class="card wd100 login_box">
			<div class="card_profile_">
				<h3>Get Moving</h3>
				<span>What level do you compete at?</span>
			</div>

				<div class="no_div">
					
					<?php
						$moving = array(
											array(
													"image"=>"vitality.png",
													"title"=>"Vitality",
													"desp" => "All levels",
													"id" => 1
												),
											array(
													"image"=>"development.png",
													"title"=>"Development",
													"desp" => "Athlete",
													"id" => 2
												),
											array(
													"image"=>"pro.png",
													"title"=>"Pro",
													"desp" => "Elite Athlete",
													"id" => 3
												),
										);
					?>

					<div class="products">
						<?php foreach($moving as $key=>$row){ ?>
							<div class="moving">
								<div class="border_top">
								</div>
								<div class="image_mov">
									<img src="<?php echo $assets;?>images/<?php echo $row['image'];?>">
								</div>
								<div class="pro_heading">
									<?php echo $row['title']; ?>
								</div>
								<div class="pro_descp">
									<?php echo $row['desp']; ?>
								</div>
								<div class="button_product text-center">
									<a href="<?php echo base_url();?>moving/packages/<?php echo $row['id'];?>">
										<button type="button" class="btn_custom_profile primary">Choose</button>
									</a>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>


			<?php /* />
					<div class="button_mid text-center m-t-5">
						<button type="submit" class="btn_custom_profile primary">Next</button>
					</div>
			<?php */ ?>
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