<?php include("common/header.php"); ?>
<?php include("common/validation.php"); ?>

<style>
	.moving {
		margin:  0;
		box-shadow: none;
	}
	.price_package {
		position: absolute;
	    right: 0;
	    width: 143px;
	    top: 133px;
	}
	.price_package span {
		font-size: 30px;
		letter-spacing: -2px;
	}
	.price_package sup {
	    position: absolute;
	    left: 4px;
	    font-size: 14px;
	    font-weight: 600;
	    top: 0px;
	}
	.packages .pro_descp {
	    min-height: auto;
	}
	</style>

	<?php if(isset($_SESSION['SUBSCRIBE_DONE'])){?>
		<div class="popup_outer">
			<div class="popup_inner">
				<img src="<?php echo $assets;?>images/check.png">
				<p>Subscription completed successfully </p>
				<div class="button_mid text-center m-t-5">
					<?php if(isset($_GET['plan'])){?>
						<a href="<?php echo base_url();?>dashboard">
							<button type="button" class="btn_custom_small primary">Dashboard</button>
						</a>
					<?php } else { ?>
					<a href="<?php echo base_url();?>explore">
						<button type="button" class="btn_custom_small primary">Back</button>
					</a>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php 
		unset($_SESSION['SUBSCRIBE_DONE']);
		} 
	?>

<form method="post" action="<?php echo base_url();?>pxl/do_payment_subscription/<?php echo $package_id;?>"  enctype='multipart/form-data'>
	<div class="payment_form">
		<div class="form_card">
			<div class="card login_box">
				<div class="form_payment">
					

					<?php if((user_info()->subscriptin_start == 1 && (strtotime(date("Y-m-d")) < strtotime(user_info()->subscription_expiry))) && !isset($_GET['plan'])) { ?>

						<div class="already_subscribed text-center">
							You've already subscribed to the subscription. <br><br>please visit your dashboard to continue.
						</div>
						<div class="button_mid text-center m-t-5">
							<a href="<?php echo base_url();?>dashboard">
								<button type="button" class="btn_custom_small primary">Dashboard</button>
							</a>
						</div>

					<?php } else { ?>
						<div class="card_header">
							Payment Details
						</div>
						<?php include("common/payment_form.php");?>
						<div class="button_mid pull-right border_top">
							<button type="submit" class="btn_custom_small primary">Proceed</button>
						</div>
					<?php } ?>
				</div>
				
			</div>
		</div>
		<div class="package_card">
			
				<div class="card login_box">
					<?php 
						$packages = $this->db->query("SELECT * FROM packages WHERE id = ".$package_id)->result_object(); 
					?>
					<div class="card_header" style="margin-bottom: 0;">
						Package Details
					</div>

					<?php 
						foreach($packages as $key=>$row){ 
							$packages_list = $this->db->query("SELECT * FROM packages_list WHERE pID = ".$row->id)->result_object();
					?>
						<div class="moving packages wd100">
							<div class="pro_heading">
								<?php echo $row->title; ?>
							</div>
							<div class="pro_descp">
								<?php foreach($packages_list as $key=>$prow){?>
									<div class="package_listing ">
										<svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M11.5224 22.5019C17.5948 22.5019 22.5174 17.5766 22.5174 11.5009C22.5174 5.42528 17.5948 0.5 11.5224 0.5C5.44998 0.5 0.527344 5.42528 0.527344 11.5009C0.527344 17.5766 5.44998 22.5019 11.5224 22.5019Z" fill="#F16623"/>
											<path d="M10.9977 16.2543L6.38281 10.0118L7.01982 9.53986L10.9442 14.8433L15.9919 6.74219L16.663 7.16061L10.9977 16.2543Z" fill="white"/>
											</svg>
										<div>
											<?php echo $prow->title;?>
										</div>
									</div>
								<?php } ?>

								
							</div>

							<div class="TOTAL">
								<div class="">Total</div>
								<div class="">
									$<?php echo $row->price;?>
								</div>
							</div>
							
						</div>
					<?php } ?>
							
				</div>

		</div>
	</div>
</form>
	
<?php include("common/footer.php"); ?>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#card_number').mask('0000 0000 0000 0000');
	})
</script>