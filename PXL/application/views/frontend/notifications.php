<?php include("common/header_dashboard.php"); ?>

<div class="dahboard_boxes">
	<div class="top_boxes_dashboard">
		<?php include("common/setting_common.php"); ?>
		<div class="right_dashbaord dashboard_card d70">
			<div class="head_dash mb_20">
				Notifications
			</div>
			<?php include("common/validation.php"); ?>
			<?php 
				$notifications = $this->db->query("SELECT * FROM notifications WHERE user_id = ".user_info()->id." AND n_read = 0 ORDER BY id DESC")->result_object();
				foreach ($notifications as $key => $notiff) {
			?>
					<div class="tasks_list">
							<div class="left_list_section">
								<div class="icon_check">
									<?php if($notiff->n_type==1){?>
										<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect width="40" height="40" fill="#F6FBFF"/>
											<path d="M14 16.5H26M24 20.5H14M11 24V13C11 12.4477 11.4477 12 12 12H28C28.5523 12 29 12.4477 29 13V24C29 24.5523 28.5523 25 28 25H14.75L11.1625 27.87C11.097 27.9224 11 27.8758 11 27.7919V24Z" stroke="#00BBF6" stroke-width="2"/>
										</svg>
									<?php } else if($notiff->n_type==2){ ?>
										<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="4" y="4" width="40" height="40" fill="#F3FFF5"/>
											<path d="M28 19C28 16.7909 26.2091 15 24 15C21.7909 15 20 16.7909 20 19M28 23C28 25.2091 26.2091 27 24 27C21.7909 27 20 25.2091 20 23M16 20H32V31C32 32.1046 31.1046 33 30 33H18C16.8954 33 16 32.1046 16 31V20Z" stroke="#00C222" stroke-width="2"/>
										</svg>
									<?php } ?>
								</div>
								<div class="text_list">
									<!-- <div class="bold_head">Emerson Curtis</div> -->
									<span><?php echo $notiff->message;?></span>
								</div>
							</div>
							<div class="time_task">
								<?php echo time_elapsed_string_header($notiff->created_at);?>
							</div>
					</div>
			<?php }?>

			<?php if(empty($notifications)){?>
								<span class="no_comments">No notifications yet!</span>
							<?php } ?>
			
		</div>
	</div>
</div>
<?php include("common/footer_dashboard.php"); ?>