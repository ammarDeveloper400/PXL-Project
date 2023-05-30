<?php include("common/header.php"); ?>
	<div class="profile_creation">
		<div class=" wd100 login_box shop_dual_box">
			<div class="card d65 card_2">
				<?php include("common/shop_steps.php"); ?>
				<div class="shop_data_boxes">
					<?php include("common/validation.php"); ?>
					<div class="heading_shop">
						Shipping details
					</div>
					<form action="<?php echo base_url();?>pxl/save_shipping/<?php echo $id;?>" method="post">
					<div class="">
						<?php 

						if(isset($_SESSION['SHIPPING_DETAILS'])){
							$address = $_SESSION['SHIPPING_DETAILS']['address'];
							$street = $_SESSION['SHIPPING_DETAILS']['street'];
							$zipcode = $_SESSION['SHIPPING_DETAILS']['zipcode'];
						}
						$save_address = $this->db->query("SELECT * FROM user_save_address WHERE uID = ".user_info()->id)->result_object();
						if(!empty($save_address)){
						?>
						<div class="card_year_month wd100">
								<div class="form-group wd100">
									<label>Use saved address</label>
								</div>
								<div class="form-group wd100">
									<select class="custom_payment_input" name="save_address" id="save_address" onchange="update_address(this.value)">
										<option value="">--Select Address--</option>
										<?php foreach ($save_address as $key => $address_) { ?>
											<option <?php echo isset($_SESSION['ADDRESS_SAVE']) && $_SESSION['ADDRESS_SAVE'] == $address_->id?"SELECTED":""; ?> value="<?php echo $address_->id;?>"><?php echo $address_->address.", ".$address_->street;?></option>
										<?php } ?>
									</select>
								</div>
						</div>
						<?php } ?>
						<div class="form-group wd100">
							<label>First line of address</label>
							<input type="text" name="address" id="address" required class="custom_payment_input" value="<?php echo $address;?>">
						</div>
						<div class="form-group wd100">
							<label>Street name</label>
							<input type="text" name="street" id="street" required class="custom_payment_input" value="<?php echo $street;?>">
						</div>

						<div class="card_year_month wd100">
								<div class="form-group wd100">
									<label>Postcode</label>
									<input type="text" name="zipcode" id="zipcode" required class="custom_payment_input" value="<?php echo $zipcode;?>">
								</div>
								<div class="form-group wd100">
									<label>
										Select shipping
									</label>
									<select class="custom_payment_input" name="shipping" id="shipping">
										<option value="0">Free Shipping</option>
									</select>
								</div>
						</div>

						<div class="button_login_shop_form m-t-5">
							<a href="<?php echo base_url();?>pxl/cance_order">
								Cancel Order
							</a>
							<div class=" pull-right">
								<button type="submit" class="btn_custom_small primary">Payment</button>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>

			<div class="card d35">
				<div class="update_shop_data">
					<?php include("common/summary_product.php"); ?>
				</div>
			</div>
			
		</div>
	</div>
<?php include("common/footer.php"); ?>

<script type="text/javascript">
	function update_address(val) {
		window.location.href = "<?php echo base_url();?>pxl/update_address/"+val;
	}
</script>