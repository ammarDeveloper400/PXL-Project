<?php include("common/header.php"); ?>

<?php if(isset($_SESSION['SUBSCRIBE_DONE'])){?>
		<div class="popup_outer">
			<div class="popup_inner">
				<img src="<?php echo $assets;?>images/check.png">
				<p>Your Order has been placed</p>
				<div class="button_mid text-center m-t-5">
					<a href="<?php echo base_url();?>pxl/do_back_shop">
						<button type="button" class="btn_custom_small primary">Back</button>
					</a>
				</div>
			</div>
		</div>
	<?php 
		} 
	?>
	<div class="profile_creation">
		<div class=" wd100 login_box shop_dual_box">
			<div class="card d65 card_2">
				<?php include("common/shop_steps.php"); ?>
				<div class="shop_data_boxes">
					<?php include("common/validation.php"); ?>
					<div class="heading_shop">
						Payment details
					</div>
					<form action="<?php echo base_url();?>pxl/do_payment_shop/<?php echo $id;?>" method="post">
						<?php include("common/payment_form.php");?>

						<div class="button_login_shop_form m-t-5">
							<a href="<?php echo base_url();?>pxl/cance_order">
								Cancel Order
							</a>
							<div class=" pull-right">
								<button type="submit" class="btn_custom_small primary">Complete Order</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="card d35">
				<?php if(!isset($_SESSION['SUBSCRIBE_DONE'])){?>
					<div class="update_shop_data">
						<?php include("common/summary_product.php"); ?>
					</div>
				<?php } ?>
			</div>
			
		</div>
	</div>
<?php include("common/footer.php"); ?>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#card_number').mask('0000 0000 0000 0000');
	})
</script>