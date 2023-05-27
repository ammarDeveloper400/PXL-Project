<?php include("common/header_dashboard.php"); ?>
<?php $bank = $this->db->query("SELECT * FROM user_bank WHERE uID = ".user_info()->id)->result_object()[0]; ?>
<div class="dahboard_boxes">
	<div class="top_boxes_dashboard">
		<?php include("common/setting_common.php"); ?>
		<div class="right_dashbaord dashboard_card d70">
			<div class="head_dash mb_20">
				My Wallet

				<div class="">
					<a href="javascript:;" onclick="show_popup_bank()">
						<button type="button" class="secondary" style="background: var(--secondary-color);">Add Bank Details</button>
					</a>
					<a href="<?php echo base_url();?>wallet?withdraw=1">
						<button type="button">Withdaraw</button>
					</a>
				</div>
			</div>
			<?php include("common/validation.php"); ?>

			<?php if(empty($bank)){?>
				<div class="bank_details_info">
					No Payout bank details added, Please add one by clicking on "Add Bank Details".
				</div>
			<?php } ?>

			<div class="withdrawal_div">
				$<?php echo user_info()->wallet; ?>
			</div>

			<div class="head_dash m-t-5">
				Withdarwal History
			</div>
			<?php 
				$notifications = $this->db->query("SELECT * FROM withdrawal WHERE uID = ".user_info()->id." ORDER BY id DESC")->result_object();
				foreach ($notifications as $key => $notiff) {
			?>
					<div class="tasks_list">
							<div class="left_list_section">
								<div class="icon_check">
									<?php if($notiff->status == 0){?>
										<div class="payment_amount_box">
											Pending
										</div>
									<?php }  else { ?>
										<div class="payment_amount_box_confimed">
											Confirmed
										</div>
									<?php } ?>
								</div>
								<div class="text_list">
									<span>An Amount of $<?php echo $notiff->amount;?> is requested for withdrawal.</span>
								</div>
							</div>
							<div class="time_task">
								<?php echo time_elapsed_string_header($notiff->created_at);?>
							</div>
					</div>
			<?php }?>

			<?php if(empty($notifications)){?>
				<span class="no_comments">No history found</span>
			<?php } ?>
			
		</div>
	</div>
</div>


<?php if(isset($_GET['withdraw']) && $_GET['withdraw'] == 1){?>
	<div class="confirm_book">
		<div class="popup_outer ">
			<div class="popup_inner">
				<div class="popup_header">
					<h4>Withdraw Amount</h4>
					<img onclick="close_popup()" src="<?php echo $assets;?>images/close_icon.png">
				</div>
				<span style="color:#959595;">Enter the amount you would like to withdraw. Admin will be notified and you will get money in your bank account.</span>

				<div class="">
					<form action="<?php echo base_url();?>pxl/do_submit_withdrawal_request" method="post" id="booking_form">
						<div class="flex_profile_double">
							
							<div class="form-group wd100">
									<label>Amount</label>
									<input type="number" min="0" step="0.01" max="<?php echo user_info()->wallet;?>" name="amount" id="amount" class="form-control custom_input" placeholder="" value="<?php echo user_info()->wallet;?>" required>
							</div>

							<div class="button_mid text-center">
								<button class="btn_custom_small primary">Submit</button>
							</div>
							</div>

						</div>
					</form>
				</div>
				
		</div>
	</div>
<?php } ?>



<div class="booking_box">
	<div class="popup_outer ">
		<div class="popup_inner">
			<div class="popup_header">
				<h4>Payout Bank Information</h4>
				<img onclick="close_popup()" src="<?php echo $assets;?>images/close_icon.png">
			</div>
			
			<div class="">
				<form action="<?php echo base_url();?>pxl/do_save_bank_payout" method="post" id="booking_form">
					<div class="flex_profile_double">
						<div class="form-group ">
								<label>Account Holder Name</label>
								<div class="relative">
									<input type="text" name="account_name" id="account_name" class="form-control custom_input" placeholder="" value="<?php echo $bank->account_name!=""?$bank->account_name:user_info()->full_name;?>" required>
								</div>
						</div>
						
						<div class="form-group">
								<label>Bank Name</label>
								<input type="text" name="bank_name" id="bank_name" class="form-control custom_input" placeholder="" value="<?php echo $bank->bank_name;?>" required>
						</div>

						<div class="form-group">
								<label>Account Number (IBAN)</label>
								<input type="text" name="account_number" id="account_number" class="form-control custom_input" placeholder="" value="<?php echo $bank->account_number;?>" required>
						</div>

						
						<div class="button_mid text-center">
							<button class="btn_custom_small primary">Save</button>
						</div>
						</div>

					</div>
				</form>
			</div>
			
	</div>
</div>

<?php include("common/footer_dashboard.php"); ?>
<script type="text/javascript">

function show_popup_bank(){
	$(".booking_box").show();
}
function close_popup(){
	$(".booking_box, .confirm_book").fadeOut();
}

</script>