<?php include("common/header.php"); ?>
	<div class="profile_creation">
		<div class=" wd100 login_box shop_dual_box">
			<div class="card d65 card_2">
				<?php include("common/shop_steps.php"); ?>
				<div class="shop_data_boxes">
					<div class="heading_shop">
						Account details
					</div>
					<form action="<?php echo base_url();?>do/login?ret=shop&id=<?php echo $id;?>" method="post">
					<div class="">
						<div class="form-group wd100">
							<label>Email Address</label>
							<input type="text" name="email" id="email" required class="custom_payment_input" value="">
						</div>
						<div class="form-group wd100">
							<label>Password</label>
							<input type="password" name="password" id="password" required class="custom_payment_input" value="">
						</div>

						<div class="button_login_shop_form m-t-5">
							<a href="<?php echo base_url();?>signup?return=shop&id=<?php echo $id;?>">
								Register for Account
							</a>
							<div class=" pull-right">
								<button type="submit" class="btn_custom_small primary">Login</button>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>

			<div class="card d35">
				<?php include("common/summary_product.php"); ?>
			</div>
			
		</div>
	</div>
<?php include("common/footer.php"); ?>