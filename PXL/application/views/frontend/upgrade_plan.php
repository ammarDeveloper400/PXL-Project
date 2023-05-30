<?php include("common/header_dashboard.php"); ?>
<style type="text/css">
	.left_side_number h1 {
		font-weight: 800;
		font-size: 152px;
		line-height: 95.02%;
		margin-bottom: 25px;
	}
	.profile_creation {
	    margin-top: 5rem;
	}
	.card_profile_ span {
		font-size: 24px;
    	line-height: normal;
	}
	.card {
		background: #F6F6F6;
	    border: none;
	    box-shadow: none !important;
	}
	.pro_descp {
		float: left;
		clear: both;
	    min-height: 280px;
	    width: 100%;
	}
	.price_package sup {
		left: -10px;
	}
	.plans_upgrade .moving {
		width: 47.5%;
	}
</style>
<form method="post" action="<?php echo base_url();?>pxl/do_submit_testing"  enctype='multipart/form-data'>
	<div class=" plans_upgrade">
		<div class="card wd100 login_box">
			<!-- <div class="">
				<h3>Your Plans</h3>
			</div> -->

			<?php include("common/validation.php"); ?>

				<div class="no_div">
					
					<?php 
						$packages = $this->db->query("SELECT * FROM packages ORDER BY id ASC")->result_object();
					?>

					<div class="products packagepro">
						<?php 
							foreach($packages as $key=>$row){ 
								$packages_list = $this->db->query("SELECT * FROM packages_list WHERE pID = ".$row->id)->result_object();
						?>
							<div class="moving <?php echo (user_info()->package_id==$row->id)?"selected_package":"";?>">

								<div class="image_tier text-left">
									<?php if($key==0){?>
										<img src="<?php echo $assets;?>images/tier3.png">
									<?php } else { ?>
										<img src="<?php echo $assets;?>images/tier<?php echo $key;?>.png">
									<?php } ?>
								</div>
								<div class="pro_heading text-left">
									<?php echo $row->title; ?>
								</div>

								<p class="m-t text-left" style="color: #808080; height: 20px;"></p>
								<div class="price_package">
									
									<span style="position: relative;"><sup>$</sup><?php echo $row->price;?></span>/Month
								</div>
								<div class="pro_descp">
									<?php foreach($packages_list as $key=>$prow){?>
										<li>
											<?php echo $prow->title;?>
										</li>
									<?php } ?>
									<?php //echo $row['desp']; ?>
								</div>

								
								<div class=" text-center">
									<?php if((user_info()->package_id==$row->id)){?>
										<button type="button" class="btn_custom primary">Your Plan</button>
									<?php } else {
										if($row->price == 0){
											$url = base_url()."pxl/downgrade/".$row->id;
										} else {
											$url = base_url().'subscription/'.$row->id.'?plan=upgrade';
										}
										?>
										<a href="<?php echo $url;?>">
											<button type="button" class="btn_custom primary">Upgrade Plan</button>
										</a>
									<?php } ?>
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
	
<?php include("common/footer_dashboard.php"); ?>
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