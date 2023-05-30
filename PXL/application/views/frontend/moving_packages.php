<?php include("common/header.php"); ?>
<style type="text/css">
	
	.card {
		background: #F6F6F6;
	    border: none;
	    box-shadow: none !important;
	}
</style>
<?php include("common/profile_steps.php"); ?>
<form method="post" action="<?php echo base_url();?>pxl/do_submit_testing"  enctype='multipart/form-data'>
	<div class="profile_creation">
		<div class="card wd100 login_box">
			<div class="card_profile_">
				<h3>Get Moving</h3>
			</div>

				<div class="no_div">
					
					<?php 
						$packages = $this->db->query("SELECT * FROM packages WHERE status = 1 ORDER BY id ASC")->result_object();

					?>

					<div class="products packagepro">
						<?php 
							foreach($packages as $key=>$row){ 
								$packages_list = $this->db->query("SELECT * FROM packages_list WHERE pID = ".$row->id)->result_object();
								$row_id = ($row->id);
						?>
							<div class="moving packages <?php echo (($id+1)==$row_id)?"selected_package":"";?>">
								<div class="pro_heading">
									<?php echo $row->title; ?>
								</div>
								<div class="pro_descp">
									<?php foreach($packages_list as $key=>$prow){?>
										<div class="package_listing">
											<svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M11.5224 22.5019C17.5948 22.5019 22.5174 17.5766 22.5174 11.5009C22.5174 5.42528 17.5948 0.5 11.5224 0.5C5.44998 0.5 0.527344 5.42528 0.527344 11.5009C0.527344 17.5766 5.44998 22.5019 11.5224 22.5019Z" fill="#F16623"/>
												<path d="M10.9977 16.2543L6.38281 10.0118L7.01982 9.53986L10.9442 14.8433L15.9919 6.74219L16.663 7.16061L10.9977 16.2543Z" fill="white"/>
												</svg>
											<div>
												<?php echo $prow->title;?>
											</div>
										</div>
									<?php } ?>
									<?php //echo $row['desp']; ?>
								</div>

								<div class="price_package">
									<sup>$</sup>
									<span><?php echo $row->price;?></span>/Month
								</div>
								<div class=" text-center">
									<?php 
										if($row->price == 0){
											$url = base_url()."pxl/downgrade/".$row->id."?return=moving";
										} else {
											$url = base_url().'subscription/'.$row->id;
										}
									?>
									<a href="<?php echo $url;?>">
										<button type="button" class="btn_custom primary">Subscribe</button>
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