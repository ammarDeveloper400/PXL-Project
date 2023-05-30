<?php include("common/header.php"); ?>
<style type="text/css">
	
	.card {
		background: #F6F6F6;
	    border: none;
	    box-shadow: none !important;
	}
	.products .test_products {
		background: #fff;
		box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.25);
		border-radius: 10px;
    	width: 32%;
    	margin-top: 0px;
	}
	.products {
	    gap: 20px;
	}
	.test_products img {
		margin-top: 0px;
	}
</style>
<?php include("common/profile_steps.php"); ?>
<form method="post" action="<?php echo base_url();?>pxl/do_submit_testing"  enctype='multipart/form-data'>
	<div class="profile_creation">
		<div class="card wd100 login_box">
			<div class="card_profile_">
				<h3>Explore</h3>
			</div>

				<div class="no_div">
					
					<div class="products">
						<?php 
							$events = $this->db->query("SELECT * FROM events_affiliates WHERE status = 1 AND type = 1")->result_object();
							foreach ($events as $key => $row) {
						?>
							<div class="test_products">
								<img src="<?php echo $uploads;?>events/<?php echo $row->image;?>">
								<div class="pro_heading">
									<?php echo $row->title;?>
								</div>
								<div class="date_">
									19th feb 2023
								</div>
								<div class="pro_descp">
									<?php echo $row->description;?>
								</div>
								<div class="button_product text-center">
									<a href="<?php echo $row->link_external;?>" target="_blank">
										<button type="button" class="btn_custom_profile primary">Register</button>
									</a>
								</div>
							</div>
						<?php } ?>
					</div>

					<!-- <div class="button_mid text-center m-t-5">
					<a href="javascript:;">
						<button type="button" class="btn_custom_profile primary">More</button>
					</a>
					</div> -->
				</div>


				<div class="button_mid text-center m-t-5">
					<a href="<?php echo base_url();?>dashboard">
						<button type="button" class="btn_custom_profile primary">Continue to Dashboard</button>
					</a>
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