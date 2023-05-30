<?php include("common/header_dashboard.php"); ?>

<div class="dahboard_boxes">

	<div class="top_boxes_dashboard">
		<?php include("common/setting_common.php"); ?>
		<div class="right_dashbaord dashboard_card d70">
			<div class="head_dash mb_20">
				Account Setting
			</div>
			<?php include("common/validation.php"); ?>
			<div class="settings_boxes">
				<div class="show_option">
					<div class="left_setting">
						Password
					</div>
					<div class="right_settings">
						<a href="javascript:;" onclick="show_detail_settings('show_password')" class="setting_show_btn show_password" id="show_password">
							Show
						</a>
					</div>
				</div>
				<div class="hide_option" id="show_password_class">
					Your last password was set on 
					<?php 
					$date_change = user_info()->password_change!=null?user_info()->password_change:user_info()->created_at;
					echo date("F,d Y H:i A",strtotime($date_change));?> 
					<span> <a href="<?php echo base_url();?>change/password">Change Password</a> </span>
				</div>
			</div>

			<div class="settings_boxes">
				<div class="show_option">
					<div class="left_setting">
						Username
					</div>
					<div class="right_settings">
						<a href="javascript:;" onclick="show_detail_settings('show_username')" class="setting_show_btn show_username" id="show_username">
							Show
						</a>
					</div>
				</div>
				<div class="hide_option" id="show_username_class">
					<?php if(user_info()->username==null){?>
						You have not set any username yet. <span> <a href="<?php echo base_url();?>change/username">Set username</a> </span>
					<?php } else {?>
						You username is (<?php echo user_info()->username;?>). <span> <a href="#">Change username</a> </span>
					<?php } ?>
				</div>
			</div>

			<div class="settings_boxes">
				<div class="show_option">
					<div class="left_setting">
						Email Address
					</div>
					<div class="right_settings">
						<a href="javascript:;" onclick="show_detail_settings('show_email')" class="setting_show_btn show_email" id="show_email">
							Show
						</a>
					</div>
				</div>
				<div class="hide_option" id="show_email_class">
						You email address is (<?php echo user_info()->email;?>). 
				</div>
			</div>

			<div class="settings_boxes">
				<div class="show_option">
					<div class="left_setting">
						Language
					</div>
					<div class="right_settings">
						<a href="javascript:;" onclick="show_detail_settings('lang_show')" class="setting_show_btn lang_show" id="lang_show">
							Show
						</a>
					</div>
				</div>
				<div class="hide_option" id="lang_show_class">
						Your language is currently set to: English (US) 
				</div>
			</div>

			<div class="settings_boxes">
				<div class="show_option">
					<div class="left_setting">
						Profile Visiblity
					</div>
					<div class="right_settings">
						<a href="javascript:;" onclick="show_detail_settings('show_visibility')" class="setting_show_btn show_username" id="show_username">
							Show
						</a>
					</div>
				</div>
				<div class="hide_option" id="show_visibility_class">
					<?php if(user_info()->is_public==1){?>
						Your profile is public. <span> <a href="<?php echo base_url();?>pxl/do_make_profile/0">Make Private</a> </span>
					<?php } else {?>
						You profile is private. <span> <a href="<?php echo base_url();?>pxl/do_make_profile/1">Make Public</a> </span>
					<?php } ?>
				</div>
			</div>

			<div class="settings_boxes">
				<div class="show_option">
					<div class="left_setting">
						Delete Your Account
					</div>
					<div class="right_settings">
						<a href="javascript:;" onclick="show_detail_settings('delete_account')" class="setting_show_btn delete_account" id="delete_account">
							Show
						</a>
					</div>
				</div>
				<div class="hide_option" id="delete_account_class">
						When you delete your account, you lose access to <b>PXL account services</b>, and we permanently delete your personal data. You can cancel the deletion for 14 days.
					<form action="<?php echo base_url();?>do/delete/account" method="post">
						<div class="input_setting">
							<label>
								<input type="checkbox" name="accept" value="1" required>
								Confirm that I want to delete my account.
							</label>
						</div>

						<div class="button_delete">
							<button type="submit" class="btn_custom_profile primary">Delete Account</button>
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>


</div>

<?php include("common/footer_dashboard.php"); ?>
<script type="text/javascript">
	function show_detail_settings(val){
		if($("#"+val+"_class").is(':visible')){
			$("#"+val).html('Show');
		} else {
			$("#"+val).html('Hide');
		}
		$("#"+val+"_class").slideToggle();
	}

	function show_user_name_div(){
		$("#user_name").slideToggle();
	}
</script>