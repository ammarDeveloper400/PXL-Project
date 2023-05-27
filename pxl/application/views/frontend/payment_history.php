<?php include("common/header_dashboard.php"); ?>


<?php if(user_info()->user_type==2){?>
<div class="payment_stats">
	<div class="payment_stats_details">
		<h4>Total Students</h4>
		<p><?php echo $this->db->query("SELECT * FROM bookings WHERE coach_id = ".user_info()->id." AND status = 1")->num_rows();?></p>
	</div>
	<div class="payment_stats_details">
		<h4>Total Training time</h4>
		<p>
			<?php 
				$toal_earning = $this->db->query("SELECT SUM(total_hours) AS TOTAL_TIME FROM bookings WHERE coach_id = ".user_info()->id." AND status = 1 AND payment_id = 1")->result_object()[0];
				
				$time_in_hours = $toal_earning->TOTAL_TIME; // the time in hours
				// calculate the hours and minutes
				$hours = floor($time_in_hours);
				$minutes = round(($time_in_hours - $hours) * 60);

				// output the result
				echo $hours."h , ". $minutes."m";
			?>
		</p>
	</div>
	<div class="payment_stats_details">
		<h4>Total Earning</h4>
		<p>
			$<?php 
				$toal_earning = $this->db->query("SELECT SUM(amount_paid) AS TOTAL_AMOUNT FROM payment_history WHERE coach_id = ".user_info()->id."")->result_object()[0];
				echo number_format_short($toal_earning->TOTAL_AMOUNT);
			?>
		</p>
	</div>
	<div class="payment_stats_details">
		<h4>Monthly Earning</h4>
		<p>
			$<?php 
				$toal_earning = $this->db->query("SELECT SUM(amount_paid) AS TOTAL_AMOUNT
													FROM payment_history
													WHERE coach_id = ".user_info()->id."
													  AND DATE_FORMAT(created_at, '%Y-%m') = '2023-05'"
												)->result_object()[0];
				echo number_format_short($toal_earning->TOTAL_AMOUNT);
			?>
		</p>
	</div>

</div>

<?php } ?>


<div class="dahboard_boxes">
	<div class="top_boxes_dashboard">
		<div class="right_dashbaord dashboard_card wd100">
			<div class="head_dash mb_20">
				Payment History
			</div>

			<?php include("common/validation.php"); ?>
			<div class="mobile_wrap_width">
				<table class="booking_table">
					<tr>
						<th><?php echo user_info()->user_type == 1?"Coach Name":"Name";?></th>
						<th>Payment Date</th>
						<th>Fee</th>
						<th>Payment Method</th>
						<th>Action</th>
					</tr>

					<?php 
						if(user_info()->user_type == 1){
							$type_column = 'uID ';
						} else {
							$type_column = 'coach_id ';
						}
						$all_bookings = $this->db->query("SELECT * FROM payment_history WHERE ".$type_column." = ".user_info()->id." ORDER BY id DESC")->result_object();

					if(empty($all_bookings)){
					?>

					<tr class="bototm_bx">
						<td colspan="5" style="text-align: center; color: red;padding: 15px;">No Payment history found!</td>
					</tr>
					<?php } 

						foreach ($all_bookings as $key => $row) {
							$bookind_details = $this->db->query("SELECT * FROM bookings WHERE id = ".$row->bID."")->result_object()[0];

							if(user_info()->user_type == 1){
								$user = $this->db->query("SELECT * FROM users WHERE id = ".$bookind_details->coach_id)->result_object()[0];
							} else {
								$user = $this->db->query("SELECT * FROM users WHERE id = ".$bookind_details->uID)->result_object()[0];
							}
							$picture = $user->profile_pic;


					?>
					<tr class="bototm_bx">
						<td class="wrap_td">
							<img src="<?php echo $uploads;?>profiles/<?php echo $picture; ?>">
							<span><?php echo $user->full_name;?></span>
						</td> 
						<td>
							<?php echo date("F, d Y H:i A", strtotime($row->created_at));?><br>
						</td>
						<td>
							<span style="color:#1CBE49">$<?php echo $bookind_details->total_price;?></span><br>
							<small class="small_td">(<?php echo $bookind_details->total_hours;?> Hours)</small>
						</td>
						<td>
							Credit Card
						</td>
						<td class="action_button">
							<a href="javascript:;" class="booking_accept">COFNIRMED</a>	
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>

		</div>
	</div>
</div>


<?php if(user_info()->user_type == 1) {?>
<?php 
	if(isset($_SESSION['BOOKING_PAYMENT'])){
		$payment_details = $this->db->query("SELECT * FROM payment_history WHERE id = ".$_SESSION['BOOKING_PAYMENT']." AND uID = ".user_info()->id)->result_object()[0];
?>
<div class="confirm_book">
<div class="popup_outer">
		<div class="popup_inner">
			<img src="<?php echo $assets;?>images/booking_dome.png">
			<h3>Payment Successfull</h3>
			<p class="booking_p_tag">
				Your payment has been processed!<br>
				Details of transaction are included below
			</p>

			<small style="color:var(--primary-color); margin-bottom: 50px;">Transaction Number : <?php echo $payment_details->json_response;?></small>

			<div class="bookingconf">
				<div class="confirm_booking_details">
					<div class="">TOTAL AMOUNT PAID</div>
					<span class="">$<?php echo $payment_details->amount_paid;?></span>
				</div>
				<div class="confirm_booking_details">
					<div class="">TRANSACTION DATE</div>
					<span class=""><?php echo date("F, d Y H:i A", strtotime($payment_details->created_at));?></span>
				</div>
			</div>
			<div class="button_mid text-center m-t-5">
				<a href="javascript:;" onclick="close_popup()">
					<button type="button" class="btn_custom_small primary">Done!</button>
				</a>
			</div>
		</div>
</div>		
</div>

<?php 
		unset($_SESSION['BOOKING_PAYMENT']);
	} 
?>
<div class="booking_box">
	<div class="popup_outer ">
		<div class="popup_inner">
			<div class="popup_header">
				<h4>Booking Payment</h4>
				<img onclick="close_popup()" src="<?php echo $assets;?>images/close_icon.png">
			</div>
			
			<div class="">
				<form action="" method="post" id="booking_form">
					<div class="flex_profile_double">
						<div class="form-group ">
								<label>Card Number</label>
								<div class="relative">
									<input type="text" name="card_number" id="card_number" class="form-control custom_input" placeholder="" value="<?php echo user_info()->full_name;?>" required>
									<div class="icon_position_right" style="top:1px">
										<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
											<mask id="mask0_1179_1242" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="46" height="46">
											<rect width="46" height="46" fill="white"/>
											</mask>
											<g mask="url(#mask0_1179_1242)">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M46.0004 23.0002C46.0004 30.5938 39.8671 36.8002 32.2004 36.8002C24.6067 36.8002 18.4004 30.5938 18.4004 23.0002C18.4004 15.4065 24.5337 9.2002 32.1274 9.2002C39.8671 9.20019 46.0004 15.4065 46.0004 23.0002Z" fill="#FFB600"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M32.2004 9.2002C39.794 9.2002 46.0004 15.4065 46.0004 23.0002C46.0004 30.5938 39.8671 36.8002 32.2004 36.8002C24.6067 36.8002 18.4004 30.5938 18.4004 23.0002" fill="#F7981D"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M32.2002 9.2002C39.7938 9.2002 46.0002 15.4065 46.0002 23.0002C46.0002 30.5938 39.8669 36.8002 32.2002 36.8002" fill="#FF8500"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M13.654 9.2002C6.13333 9.27321 0 15.4065 0 23.0002C0 30.5938 6.13333 36.8002 13.8 36.8002C17.3778 36.8002 20.5905 35.4129 23.073 33.2224C23.5841 32.7843 24.0222 32.2732 24.4603 31.7621H21.6127C21.2476 31.324 20.8825 30.8129 20.5905 30.3748H25.4825C25.7746 29.9367 26.0667 29.4256 26.2857 28.9145H19.7873C19.5683 28.4764 19.3492 27.9653 19.2032 27.4542H26.7968C27.2349 26.0669 27.527 24.6065 27.527 23.0732C27.527 22.051 27.381 21.1018 27.2349 20.1526H18.7651C18.8381 19.6415 18.9841 19.2034 19.1302 18.6923H26.7238C26.5778 18.1811 26.3587 17.67 26.1397 17.2319H19.7143C19.9333 16.7208 20.2254 16.2827 20.5175 15.7716H25.4095C25.1175 15.2605 24.7524 14.7494 24.3143 14.3113H21.6127C22.0508 13.8002 22.4889 13.3621 23 12.924C20.5905 10.6605 17.3048 9.34623 13.727 9.34623C13.727 9.2002 13.727 9.2002 13.654 9.2002Z" fill="#FF5050"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M0 22.9997C0 30.5933 6.13333 36.7997 13.8 36.7997C17.3778 36.7997 20.5905 35.4124 23.073 33.2219C23.5841 32.7838 24.0222 32.2727 24.4603 31.7616H21.6127C21.2476 31.3235 20.8825 30.8124 20.5905 30.3743H25.4825C25.7746 29.9362 26.0667 29.4251 26.2857 28.914H19.7873C19.5683 28.4759 19.3492 27.9648 19.2032 27.4536H26.7968C27.2349 26.0663 27.527 24.606 27.527 23.0727C27.527 22.0505 27.381 21.1013 27.2349 20.1521H18.7651C18.8381 19.6409 18.9841 19.2028 19.1302 18.6917H26.7238C26.5778 18.1806 26.3587 17.6695 26.1397 17.2314H19.7143C19.9333 16.7203 20.2254 16.2822 20.5175 15.7711H25.4095C25.1175 15.26 24.7524 14.7489 24.3143 14.3108H21.6127C22.0508 13.7997 22.4889 13.3616 23 12.9235C20.5905 10.66 17.3048 9.3457 13.727 9.3457H13.654" fill="#E52836"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M13.8003 36.7997C17.3781 36.7997 20.5908 35.4124 23.0733 33.2219C23.5845 32.7838 24.0225 32.2727 24.4606 31.7616H21.613C21.2479 31.3235 20.8829 30.8124 20.5908 30.3743H25.4829C25.7749 29.9362 26.067 29.4251 26.286 28.914H19.7876C19.5686 28.4759 19.3495 27.9648 19.2035 27.4536H26.7972C27.2352 26.0663 27.5273 24.606 27.5273 23.0727C27.5273 22.0505 27.3813 21.1013 27.2352 20.1521H18.7654C18.8384 19.6409 18.9845 19.2028 19.1305 18.6917H26.7241C26.5781 18.1806 26.3591 17.6695 26.14 17.2314H19.7146C19.9337 16.7203 20.2257 16.2822 20.5178 15.7711H25.4099C25.1178 15.26 24.7527 14.7489 24.3146 14.3108H21.613C22.0511 13.7997 22.4892 13.3616 23.0003 12.9235C20.5908 10.66 17.3051 9.3457 13.7273 9.3457H13.6543" fill="#CB2026"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M18.6917 26.5045L18.9107 25.2632C18.8377 25.2632 18.6917 25.3362 18.5456 25.3362C18.0345 25.3362 17.9615 25.0442 18.0345 24.8981L18.4726 22.3426H19.2758L19.4949 20.9553H18.7647L18.9107 20.0791H17.4504C17.4504 20.0791 16.5742 24.8981 16.5742 25.4823C16.5742 26.3585 17.0853 26.7235 17.7425 26.7235C18.1806 26.7235 18.5456 26.5775 18.6917 26.5045Z" fill="white"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M19.2031 24.168C19.2031 26.2124 20.5904 26.7236 21.7587 26.7236C22.8539 26.7236 23.292 26.5045 23.292 26.5045L23.5841 25.1172C23.5841 25.1172 22.7809 25.4823 22.0507 25.4823C20.4444 25.4823 20.7365 24.314 20.7365 24.314H23.7301C23.7301 24.314 23.9492 23.3648 23.9492 22.9997C23.9492 22.0505 23.438 20.8823 21.8317 20.8823C20.2984 20.7363 19.2031 22.3426 19.2031 24.168ZM21.7588 22.0505C22.562 22.0505 22.4159 22.9997 22.4159 23.0728H20.8096C20.8096 22.9997 20.9556 22.0505 21.7588 22.0505Z" fill="white"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M31.0315 26.5044L31.3236 24.8981C31.3236 24.8981 30.5934 25.2631 30.0823 25.2631C29.0601 25.2631 28.622 24.46 28.622 23.5838C28.622 21.8314 29.4982 20.8822 30.5204 20.8822C31.2505 20.8822 31.8347 21.3203 31.8347 21.3203L32.0537 19.787C32.0537 19.787 31.1775 19.4219 30.3744 19.4219C28.695 19.4219 27.0156 20.8822 27.0156 23.6568C27.0156 25.4822 27.8918 26.7235 29.6442 26.7235C30.2283 26.7235 31.0315 26.5044 31.0315 26.5044Z" fill="white"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M10.6603 20.7363C9.63812 20.7363 8.90797 21.0284 8.90797 21.0284L8.68892 22.2697C8.68892 22.2697 9.34606 21.9776 10.2953 21.9776C10.8064 21.9776 11.2445 22.0506 11.2445 22.4887C11.2445 22.7808 11.1715 22.8538 11.1715 22.8538C11.1715 22.8538 10.7334 22.8538 10.5143 22.8538C9.27304 22.8538 7.88574 23.3649 7.88574 25.0443C7.88574 26.3586 8.76193 26.6506 9.27304 26.6506C10.2953 26.6506 10.7334 25.9935 10.8064 25.9935L10.7334 26.5776H12.0476L12.6318 22.5617C12.6318 20.8093 11.1715 20.7363 10.6603 20.7363ZM10.9523 24.0221C10.9523 24.2411 10.8063 25.4094 9.93007 25.4094C9.49198 25.4094 9.34595 25.0443 9.34595 24.8252C9.34595 24.4601 9.565 23.949 10.6602 23.949C10.8793 24.0221 10.9523 24.0221 10.9523 24.0221Z" fill="white"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M14.0192 26.6504C14.3843 26.6504 16.2097 26.7234 16.2097 24.752C16.2097 22.9266 14.4573 23.2917 14.4573 22.5615C14.4573 22.1964 14.7494 22.0504 15.2605 22.0504C15.4795 22.0504 16.2827 22.1234 16.2827 22.1234L16.5017 20.8091C16.5017 20.8091 15.9906 20.6631 15.1144 20.6631C14.0192 20.6631 12.924 21.1012 12.924 22.5615C12.924 24.2409 14.7494 24.0948 14.7494 24.752C14.7494 25.1901 14.2383 25.2631 13.8732 25.2631C13.216 25.2631 12.5589 25.044 12.5589 25.044L12.3398 26.3583C12.4129 26.5044 12.7779 26.6504 14.0192 26.6504Z" fill="white"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M43.1521 19.5684L42.8601 21.5398C42.8601 21.5398 42.276 20.8096 41.4728 20.8096C40.1585 20.8096 38.9902 22.416 38.9902 24.3144C38.9902 25.4826 39.5744 26.7239 40.8156 26.7239C41.6918 26.7239 42.2029 26.1398 42.2029 26.1398L42.1299 26.6509H43.5902L44.6855 19.6414L43.1521 19.5684ZM42.4951 23.4382C42.4951 24.2414 42.13 25.2636 41.3269 25.2636C40.8157 25.2636 40.5237 24.8255 40.5237 24.0954C40.5237 22.9271 41.0348 22.197 41.6919 22.197C42.203 22.197 42.4951 22.562 42.4951 23.4382Z" fill="white"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M2.70175 26.5779L3.57794 21.3207L3.72398 26.5779H4.7462L6.64461 21.3207L5.84144 26.5779H7.37477L8.54302 19.5684H6.1335L4.67318 23.8763L4.60017 19.5684H2.48271L1.31445 26.5779H2.70175Z" fill="white"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M25.3368 26.5771C25.7749 24.1676 25.8479 22.1961 26.8702 22.5612C27.0162 21.612 27.2352 21.2469 27.3813 20.8818C27.3813 20.8818 27.3082 20.8818 27.0892 20.8818C26.4321 20.8818 25.9209 21.758 25.9209 21.758L26.067 20.9549H24.6797L23.7305 26.6501H25.3368V26.5771Z" fill="white"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M34.3908 20.7363C33.3686 20.7363 32.6384 21.0284 32.6384 21.0284L32.4194 22.2697C32.4194 22.2697 33.0765 21.9776 34.0257 21.9776C34.5368 21.9776 34.9749 22.0506 34.9749 22.4887C34.9749 22.7808 34.9019 22.8538 34.9019 22.8538C34.9019 22.8538 34.4638 22.8538 34.2448 22.8538C33.0035 22.8538 31.6162 23.3649 31.6162 25.0443C31.6162 26.3586 32.4924 26.6506 33.0035 26.6506C34.0257 26.6506 34.4638 25.9935 34.5368 25.9935L34.4638 26.5776H35.7781L36.3622 22.5617C36.4353 20.8093 34.9019 20.7363 34.3908 20.7363ZM34.756 24.0221C34.756 24.2411 34.61 25.4094 33.7338 25.4094C33.2957 25.4094 33.1497 25.0443 33.1497 24.8252C33.1497 24.4601 33.3687 23.949 34.4639 23.949C34.683 24.0221 34.683 24.0221 34.756 24.0221Z" fill="white"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M37.6034 26.5771C38.0415 24.1676 38.1145 22.1961 39.1368 22.5612C39.2828 21.612 39.5018 21.2469 39.6479 20.8818C39.6479 20.8818 39.5749 20.8818 39.3558 20.8818C38.6987 20.8818 38.1875 21.758 38.1875 21.758L38.3336 20.9549H36.9463L35.9971 26.6501H37.6034V26.5771Z" fill="white"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M16.4287 25.4823C16.4287 26.3585 16.9398 26.7235 17.597 26.7235C18.1081 26.7235 18.5462 26.5775 18.6922 26.5045L18.9113 25.2632C18.8382 25.2632 18.6922 25.3362 18.5462 25.3362C18.0351 25.3362 17.962 25.0442 18.0351 24.8981L18.4732 22.3426H19.2763L19.4954 20.9553H18.7652L18.9113 20.0791" fill="#DCE5E5"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M19.9336 24.168C19.9336 26.2124 20.5907 26.7236 21.759 26.7236C22.8542 26.7236 23.2923 26.5045 23.2923 26.5045L23.5844 25.1172C23.5844 25.1172 22.7812 25.4823 22.0511 25.4823C20.4447 25.4823 20.7368 24.314 20.7368 24.314H23.7304C23.7304 24.314 23.9495 23.3648 23.9495 22.9997C23.9495 22.0505 23.4384 20.8823 21.832 20.8823C20.2987 20.7363 19.9336 22.3426 19.9336 24.168ZM21.759 22.0505C22.5622 22.0505 22.7082 22.9997 22.7082 23.0728H20.8098C20.8098 22.9997 20.9558 22.0505 21.759 22.0505Z" fill="#DCE5E5"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M31.0318 26.5044L31.3239 24.8981C31.3239 24.8981 30.5937 25.2631 30.0826 25.2631C29.0604 25.2631 28.6223 24.46 28.6223 23.5838C28.6223 21.8314 29.4985 20.8822 30.5207 20.8822C31.2509 20.8822 31.835 21.3203 31.835 21.3203L32.054 19.787C32.054 19.787 31.1778 19.4219 30.3747 19.4219C28.6953 19.4219 27.7461 20.8822 27.7461 23.6568C27.7461 25.4822 27.8921 26.7235 29.6445 26.7235C30.2286 26.7235 31.0318 26.5044 31.0318 26.5044Z" fill="#DCE5E5"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M8.68892 22.3422C8.68892 22.3422 9.34606 22.0501 10.2953 22.0501C10.8064 22.0501 11.2445 22.1231 11.2445 22.5612C11.2445 22.8533 11.1715 22.9263 11.1715 22.9263C11.1715 22.9263 10.7334 22.9263 10.5143 22.9263C9.27304 22.9263 7.88574 23.4374 7.88574 25.1168C7.88574 26.431 8.76193 26.7231 9.27304 26.7231C10.2953 26.7231 10.7334 26.066 10.8064 26.066L10.7334 26.6501H12.0476L12.6318 22.6342C12.6318 20.9549 11.1715 20.8818 10.5873 20.8818M11.6825 24.0215C11.6825 24.2405 10.8063 25.4088 9.93007 25.4088C9.49198 25.4088 9.34595 25.0437 9.34595 24.8247C9.34595 24.4596 9.565 23.9485 10.6602 23.9485C10.8793 24.0215 11.6825 24.0215 11.6825 24.0215Z" fill="#DCE5E5"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M12.4131 26.5044C12.4131 26.5044 12.8512 26.6504 14.0925 26.6504C14.4575 26.6504 16.2829 26.7234 16.2829 24.752C16.2829 22.9266 14.5305 23.2917 14.5305 22.5615C14.5305 22.1964 14.8226 22.0504 15.3337 22.0504C15.5528 22.0504 16.3559 22.1234 16.3559 22.1234L16.575 20.8091C16.575 20.8091 16.0639 20.6631 15.1877 20.6631C14.0925 20.6631 13.7274 21.1012 13.7274 22.5615C13.7274 24.2409 14.8226 24.0948 14.8226 24.752C14.8226 25.1901 14.3115 25.2631 13.9464 25.2631" fill="#DCE5E5"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M42.8608 21.539C42.8608 21.539 42.2767 20.8089 41.4735 20.8089C40.1592 20.8089 39.7211 22.4152 39.7211 24.3136C39.7211 25.4819 39.5751 26.7232 40.8164 26.7232C41.6925 26.7232 42.2037 26.139 42.2037 26.139L42.1306 26.6501H43.591L44.6862 19.6406M42.7879 23.4374C42.7879 24.2406 42.1308 25.2628 41.3276 25.2628C40.8165 25.2628 40.5244 24.8247 40.5244 24.0946C40.5244 22.9263 41.0355 22.1962 41.6927 22.1962C42.2038 22.1962 42.7879 22.5612 42.7879 23.4374Z" fill="#DCE5E5"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M2.70175 26.5779L3.57794 21.3207L3.72398 26.5779H4.7462L6.64461 21.3207L5.84144 26.5779H7.37477L8.54302 19.5684H6.71763L4.67318 23.8763L4.60017 19.5684H3.79699L1.31445 26.5779H2.70175Z" fill="#DCE5E5"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M23.8027 26.5771H25.3361C25.7742 24.1675 25.8472 22.1961 26.8694 22.5612C27.0154 21.612 27.2345 21.2469 27.3805 20.8818C27.3805 20.8818 27.3075 20.8818 27.0884 20.8818C26.4313 20.8818 25.9202 21.758 25.9202 21.758L26.0662 20.9549" fill="#DCE5E5"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M32.4194 22.3422C32.4194 22.3422 33.0765 22.0501 34.0257 22.0501C34.5368 22.0501 34.9749 22.1231 34.9749 22.5612C34.9749 22.8533 34.9019 22.9263 34.9019 22.9263C34.9019 22.9263 34.4638 22.9263 34.2448 22.9263C33.0035 22.9263 31.6162 23.4374 31.6162 25.1168C31.6162 26.431 32.4924 26.7231 33.0035 26.7231C34.0257 26.7231 34.4638 26.066 34.5368 26.066L34.4638 26.6501H35.7781L36.3622 22.6342C36.3622 20.9549 34.9019 20.8818 34.3178 20.8818M35.4129 24.0215C35.4129 24.2405 34.5367 25.4088 33.6605 25.4088C33.2224 25.4088 33.0764 25.0437 33.0764 24.8247C33.0764 24.4596 33.2955 23.9485 34.3907 23.9485C34.6828 24.0215 35.4129 24.0215 35.4129 24.0215Z" fill="#DCE5E5"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M36.0703 26.5771H37.6036C38.0417 24.1675 38.1148 22.1961 39.137 22.5612C39.283 21.612 39.5021 21.2469 39.6481 20.8818C39.6481 20.8818 39.5751 20.8818 39.356 20.8818C38.6989 20.8818 38.1878 21.758 38.1878 21.758L38.3338 20.9549" fill="#DCE5E5"/>
											</g>
											</svg>
										</div>
								</div>
						</div>
						
						<div class="form-group">
								<label>Name</label>
								<input type="text" name="card_name" id="card_name" class="form-control custom_input" placeholder="" value="<?php echo user_info()->full_name;?>" required>
						</div>

						<div class="card_year_month">
							<div class="form-group wd100">
								<label>Expiration</label>
								<div class="year_mon">
									<input type="text" minlength="2" maxlength="2" name="expiry_month" id="expiry_month" required class="form-control custom_input" value="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="Month">
									<span>/</span>
									<input type="text" minlength="4" maxlength="4" name="expiry_year" id="expiry_year" required class="form-control custom_input" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '');" value="" placeholder="Year">
								</div>
							</div>
							<div class="form-group wd100">
								<label>
									CVC
								</label>
								<input type="text" name="cvv" minlength="3" maxlength="3" id="cvv" required class="form-control custom_input" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="">
							</div>
						</div>

						<div class="button_mid text-center">
							<button class="btn_custom_small primary">Make Payment</button>
						</div>
						</div>

					</div>
				</form>
			</div>
			
	</div>
</div>
<?php } ?>


<?php include("common/footer_dashboard.php"); ?>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#card_number').mask('0000 0000 0000 0000');
	})
</script>
<script type="text/javascript">

	function show_popup_payment(val) {
		$("#booking_form").attr("action", '<?php echo base_url();?>pxl/do_booking_payment/'+val);
		$(".booking_box").fadeIn();
	}
	function close_popup(){
		$(".booking_box, .confirm_book").fadeOut();
	}

	function reject_booking(url){
		var x = confirm("Are you syre? you want to reject this booking");
		if(x){
			window.location.href = url;
		}
	}
</script>