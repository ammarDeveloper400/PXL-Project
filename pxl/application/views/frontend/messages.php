<?php include("common/header_dashboard.php"); ?>

<style type="text/css">
	::placeholder {
	  color: #333333;
	}
	#country-list {
		    background: #f0f0f0;
	}
</style>
<div class="dahboard_boxes">
	<?php include("common/validation.php"); ?>
	<div class="top_boxes_dashboard">
		<div class="left_dashboard dashboard_card d30">
			<div class="head_dash">
				Inbox
				<button onclick="do_show_player_search()"><svg width="10" height="10" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.98341 7.59155V0.222656H10.4395V7.59155H17.8076V10.0478H10.4395V17.4167H7.98341V10.0478H0.615234V7.59155H7.98341Z" fill="#ffffff"/>
</svg>
Compose</button>
			</div>

			<div class="search_message" style="display:none">
				<input type="text" name="search_message" id="search-box" class="search_message" placeholder="Search players and coaches">
				<div class="close_icon" id="close">
					clear
				</div>
				<div class="sv_msg">
					<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.97054 14.4943C11.5737 14.4943 14.4946 11.5734 14.4946 7.9703C14.4946 4.36719 11.5737 1.44629 7.97054 1.44629C4.36743 1.44629 1.44653 4.36719 1.44653 7.9703C1.44653 11.5734 4.36743 14.4943 7.97054 14.4943Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M16.1256 16.1256L12.5781 12.5781" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>

				</div>
				<div id="suggesstion-box"></div>
			</div>
			<?php 
				// $chats = $this->db->query(
				// 			"SELECT *, max(chat) as last_chat FROM conversations WHERE 
				// 			user_id = ".user_info()->id." OR player_id = ".user_info()->id."
				// 			GROUP BY user_id, player_id ORDER BY id ASC"
				// 		)->result_object();


			// OLD QUERY
			// SELECT * 
			// 			FROM ( 
			// 				SELECT max(chat) as last_chat, user_id, 
			// 				player_id, id, m_read, created_at
			// 				FROM conversations 
			// 				WHERE 
			// 				((user_id = ".user_info()->id." OR player_id = ".user_info()->id."))
			// 				GROUP BY user_id, player_id DESC, id DESC 
			// 			) as t_max 
			// 			GROUP BY t_max.user_id
			// 			ORDER BY m_read ASC, id DESC


				$chats = $this->db->query("
						SELECT *
						FROM (
						    SELECT MAX(chat) AS last_chat, user_id, player_id, id, m_read, created_at
						    FROM conversations
						    WHERE (user_id = ".user_info()->id." OR player_id = ".user_info()->id.")
						    GROUP BY LEAST(user_id, player_id), GREATEST(user_id, player_id), id DESC
						) AS t_max
						GROUP BY LEAST(user_id, player_id), GREATEST(user_id, player_id)
						ORDER BY m_read ASC, id DESC

					")->result_object();
				// echo $this->db->last_query();

				foreach($chats as $key=>$row){
					if($row->player_id == user_info()->id){
						$player_detail = $row->user_id;
						$active_player = $row->player_id;
					} else {
						$player_detail = $row->player_id;
						$active_player = $row->user_id;
					}
					$player_profile = $this->db->query("SELECT * from users WHERE id = ".$player_detail)->result_object()[0];

					$mesasge_link = $player_profile->username!=null?$player_profile->username:$player_profile->id;
			?>
				<a href="<?php echo base_url();?>messages/<?php echo $mesasge_link;?>" class="message_list <?php echo ($user_selected==$player_detail)?'active_message':'';?>">
					<?php if($row->m_read == 0){ ?>
						<span style="position: absolute;left: -8px;">
							<svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="3.26997" cy="3.37349" r="3.26997" fill="#F16623"/>
							</svg>
						</span>
					<?php }
					?>
					<div class="message_image">
						<img src="<?php echo $uploads;?>profiles/<?php echo $player_profile->profile_pic;?>">
					</div>
					<div class="message_data">
						<div class="message_name">
							<?php echo $player_profile->full_name; ?>
						</div>
						<span>
							<?php echo $row->last_chat;?>
						</span>
					</div>
					<div class="time">
						<?php echo $row->created_at!=null?time_elapsed_string_header($row->created_at):''; ?>
					</div>
				</a>
			<?php } ?>
		</div>

		<?php  
			if($player_id!=""){
				$chat_user = $this->db->query("SELECT * FROM users WHERE (id = '".$player_id."' OR username = '".$player_id."')")->result_object()[0];
			}
		?>
		<div class="right_dashbaord dashboard_card d70 nopad_message">	
			<div class="conversation_div">
				
				<?php if($player_id!=""){?>
				<div class="left_conver">
					<div class="message_image">
						<img src="<?php echo $uploads;?>profiles/<?php echo $chat_user->profile_pic;?>">
					</div>
					<div class="message_data">
						<div class="message_name">
							<?php echo $chat_user->full_name; ?>
						</div>
					</div>
				</div>

				<div class="button_for_coach">
					<?php if($user_selected_full->user_type == 2 && user_info()->user_type==1){ ?>
						<a href="javascript:;" onclick="open_appointment_booking()">
							<button type="button" class="btn_convo_small primary">Book an appointment</button>
						</a>
					<?php } ?>
					<div class="show_options_chat" onclick="show_option(<?php echo $row->id;?>)">
						<svg width="36" height="8" viewBox="0 0 36 8" fill="none" xmlns="http://www.w3.org/2000/svg">
							<circle cx="4" cy="4" r="4" fill="#D9D9D9"/>
							<circle cx="18" cy="4" r="4" fill="#D9D9D9"/>
							<circle cx="32" cy="4" r="4" fill="#D9D9D9"/>
						</svg>
					</div>
					<div class="notification_panel" id="chat_options">
							<a href="javascript:;do_delete_chat(<?php echo $chat_user->id;?>)" class="text_list">
								<div class="bold_head">Delete Chat</div>
							</a>
					</div>
				</div>
				
				<?php } ?>
			</div>
			<?php if($player_id!=""){?>
			<div class="message_div"></div>
			<?php } else { ?>
			<div class="no_chat_message">
				Please select a chat to start conversation.
			</div>
			<?php } ?>


			<?php if($player_id!=""){?>
				<div class="message_footer">
					<div class="relative wd100">
						<input type="text" id="chat" name="message_input" class="messsage_conver_input" placeholder="Type Message...">
						<div class="con_sbg" alt="Attach File"> 
							<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M20.2133 0.666992C24.7467 0.666992 27.3333 3.22699 27.3333 7.77366V20.227C27.3333 24.747 24.76 27.3337 20.2267 27.3337H7.77334C3.22667 27.3337 0.666672 24.747 0.666672 20.227V7.77366C0.666672 3.22699 3.22667 0.666992 7.77334 0.666992H20.2133ZM13.9867 8.01366C13.3733 8.01366 12.88 8.50699 12.88 9.12032V12.8803H9.10667C8.81334 12.8803 8.53334 13.0003 8.32 13.2003C8.12001 13.4137 8 13.6923 8 13.987C8 14.6003 8.49334 15.0937 9.10667 15.107H12.88V18.8803C12.88 19.4937 13.3733 19.987 13.9867 19.987C14.6 19.987 15.0933 19.4937 15.0933 18.8803V15.107H18.88C19.4933 15.0937 19.9867 14.6003 19.9867 13.987C19.9867 13.3737 19.4933 12.8803 18.88 12.8803H15.0933V9.12032C15.0933 8.50699 14.6 8.01366 13.9867 8.01366Z" fill="#B7B7B7"/>
							</svg>

						</div>
					</div>
					<input type="file" nmae="logo" style="display: none;" id="file_input" onchange="
					do_update_file(this.files[0])">

					<div id="blah_show_chat">
						<img class="user_photo_chat" id="blah" src="">
					</div>
					<button type="button" class="btn_input_conver primary abs_chat">
						Send
					</button>
				</div>
			<?php } ?>
		</div>
	</div>


</div>

<div class="booking_box">
	<div class="popup_outer ">
		<div class="popup_inner">
			<div class="popup_header">
				<h4>New Appointment</h4>
				<img onclick="close_popup()" src="<?php echo $assets;?>images/close_icon.png">
			</div>
			
			<div class="form_popup_booking">
				<form action="<?php echo base_url();?>pxl/do_submit_appointment" method="post">
					<div class="flex_profile_double">
						<div class="form-group">
								<label>Full Name</label>
								<input type="text" name="full_name" id="full_name" class="form-control custom_input" placeholder="" value="<?php echo user_info()->full_name;?>" required>
						</div>
						<div class="form-group">
								<label>Gender</label>
								<select name="gender" id="gender" class="form-control custom_input" required>
									<option value="">--Select Gender--</option>
								<?php 
								$sports = array("Male", "Female");
								foreach($sports as $sport){
								?>
									<option <?php echo $sport == user_info()->gender?"SELECTED":"";?> value="<?php echo $sport;?>"><?php echo $sport;?></option>
									<?php } ?>
								</select>
						</div>
						<div class="form-group wd100">
								<label>Phone Number</label>
								<input type="text" name="phone" id="phone" class="form-control custom_input" placeholder="" value="<?php echo user_info()->phone;?>" required>
						</div>
						<div class="form-group">
								<label>Address</label>
								<input type="text" name="address" id="address" class="form-control custom_input" placeholder="" value="<?php echo user_info()->address;?>" required>
						</div>

						<div class="form-group">
							<label>Date</label>
							<input type="date" min="<?php echo date("Y-m-d");?>" name="booking_date" id="booking_date" class="form-control custom_input" placeholder="" value="" required>
						</div>

						<div class="form-group">
							<label>Start Time</label>
							<input type="time" name="start_time" id="start_time" class="form-control custom_input" placeholder="" value="" required>
						</div>

						<div class="form-group">
							<label>End Time</label>
							<input type="time" name="end_time" id="end_time" class="form-control custom_input" placeholder="" value="" required>
						</div>

						<div class="form-group wd100">
							<label>Coach Name</label>
							<input type="text" name="coach_name" id="coach_name" readonly class="form-control custom_input" placeholder="" value="<?php echo $user_selected_full->full_name;?>" required>
							<input type="hidden" name="coach_id" id="coach_id" readonly class="form-control custom_input" placeholder="" value="<?php echo $user_selected_full->id;?>" required>
						</div>

						<div class="form-group wd100">
							<label>Notes</label>
							<textarea name="notes" class="form-control custom_input" rows="3"></textarea>
						</div>

						<div class="button_mid text-center">
							<button class="btn_custom_small primary">Book an appointment</button>
						</div>
						</div>

					</div>
				</form>
			</div>
			
	</div>
</div>

<?php include("common/footer_dashboard.php"); ?>
<script type="text/javascript">

function open_appointment_booking(){
	$(".booking_box").fadeIn();
}

function close_popup(){
	$(".booking_box").fadeOut();
}

function do_update_file(value) {
	var file__ = value;
	var file_name__ = file__.name;
	var ext = file_name__.substr(file_name__.lastIndexOf('.') + 1);
	$("#blah_show_chat").show();
	if(ext == "jpg" || ext == "jpeg" || ext == "png") {
		var file_value = window.URL.createObjectURL(file__);
		document.getElementById('blah').src = window.URL.createObjectURL(value)
	} else {
		document.getElementById('blah').src = '<?php echo $uploads;?>chats/file.svg';
	}
	// document.getElementById('blah').src = window.URL.createObjectURL(value)
}
$(document).ready(function(){
	get_chat();
	setInterval(function () {
		get_chat(1);
	}, 2000);

	$(".con_sbg").on("click", function(){
		$("#file_input").click();
	});

});
function get_chat(show=0){
	$.ajax({
		url: '<?php echo base_url()."pxl/get_chat_display/".$player_id; ?>',
		cache: false,
		contentType: false,
		type: 'post',
		success: function(response){
			if(response == "999999"){
				window.location.href = "<?php echo base_url();?>/login";
			} else if(response == "888"){
				window.location.href = "<?php echo current_url();?>";
			} else {
				$(".message_div").html(response);
				if(show != 1){
					$(".message_div").animate({ scrollTop: $('.message_div').prop("scrollHeight")}, 1000);
				}
			}
		}
	});
}


$(".abs_chat").on("click", function(){
	if($("#chat").val() != ""){
			$("#chat, .abs_chat").attr("disabled", true);
			$("#chat").attr('placeholder',"Type Message...");
			$("#chat").removeClass('borderred');
			
			var file_attach = $('#file_input').prop('files').length;

        	
		    var form_data = new FormData();  
		    if(file_attach > 0){    
			    var file_data = $('#file_input').prop('files')[0];               
			    form_data.append('file', file_data);
			}
		    form_data.append('chat_text', $("#chat").val());

        	// var data = {
	        //     chat_text: $("#chat").val(),
	        //     chat_media: form_data,
        	// }
			$.ajax({
				url: '<?php echo base_url()."pxl/send_chat/".$player_id; ?>',
				cache: false,
				dataType: 'json',
				type: 'post',
				contentType: false,
        		processData: false,
				data: form_data,
				success: function(response){
					if(response == "999999"){
						window.location.href = "<?php echo base_url();?>/login";
					} else {
						document.getElementById('blah').src = '';
						$("#blah_show_chat").hide();
						$("#file_input").val('');
						get_chat();
						$("#chat").val('');
						$("#chat, .abs_chat").attr("disabled", false);
					}
				}
			});
	} else {
		$("#chat").attr('placeholder',"Message can't be empty.");
		$("#chat").addClass('borderred');
	}
})

// function search_chat(){
// 	if($(".search_message").val()!=""){
// 		window.location.href = "<?php echo base_url();?>messages?q=".$(".search_message").val();
// 	}
// }

function show_option(id){
	$("#chat_options").slideToggle();
}

function do_delete_chat(id){
	var x  = confirm("Are you sure you want to delete this chat? this won't be undone!");
	if(x){
		window.location.href = "<?php echo base_url();?>pxl/delete_chat/"+id;
	}
}
</script>


<script type="text/javascript">
	function do_show_player_search(){
		$(".search_message").show('slow');
	}
	$(document).ready(function() {
		$("#close").on("click", function(){
			$("#close").hide();
			$("#suggesstion-box").hide();
			$("#search-box").val('');
		});
		$("#search-box").keyup(function() {
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>pxl/get_all_player",
				data: 'keyword=' + $(this).val(),
				beforeSend: function() {
					$("#search-box").css("background", "#FFF url(<?php echo $assets;?>images/loaderIcon.gif) no-repeat right");
				},
				success: function(data) {
					$("#close").show();
					$("#suggesstion-box").show();
					$("#suggesstion-box").html(data);
					$("#search-box").css("background", "#FFF");
				}
			});
		});
	});
</script>