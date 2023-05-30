<?php 
	$user_check = $this->db->query("SELECT * FROM users WHERE (id = '".$id."' OR username = '".$id."')")->result_object()[0];
	$chats_all = $this->db->query(
							"SELECT * FROM conversations WHERE 
							(user_id = ".user_info()->id." OR player_id = ".user_info()->id.")
							AND (user_id = ".$user_check->id." OR player_id = ".$user_check->id.")
							ORDER BY id ASC"
						)->result_object();

	foreach ($chats_all as $key => $row_chat) {

		
		
		if($row_chat->chat != null){

			if($row_chat->media != null){
				$ext = pathinfo($row_chat->media, PATHINFO_EXTENSION);
				if($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
					$file_name = $row_chat->media;
				} else {
					$file_name = "file.svg";
				}
			}
			if($row_chat->sender_id == $row_chat->user_id){
				$player_detail = $row_chat->user_id;
			} else {
				$player_detail = $row_chat->player_id;
			}
			$player_profile_ = $this->db->query("SELECT * from users WHERE id = ".$player_detail)->result_object()[0];
?>

<div class="message_wrap <?php echo $player_detail==user_info()->id?'':'message_wrap_left';?>">
	<div class="message">
		<?php echo $row_chat->chat; ?>
		<?php if($row_chat->media != null){?>
			<a title="Click to download" download href="<?php echo $uploads;?>chats/<?php echo $row_chat->media;?>">
				<img src="<?php echo $uploads;?>chats/<?php echo $file_name;?>">
			</a>
		<?php } ?>
	</div>
	<div class="image_person">
		<img src="<?php echo $uploads;?>profiles/<?php echo $player_profile_->profile_pic;?>">
	</div>
</div>
<?php }} ?>