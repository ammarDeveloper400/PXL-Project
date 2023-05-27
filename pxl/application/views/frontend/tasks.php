<?php include("common/header_dashboard.php"); ?>
	<div class="popup_outer" id="show_task" style="display: <?php echo isset($_GET['show']) && $_GET['show']==1?'':'none';?>">
			<div class="popup_inner text-left">
				<form method="post" action="<?php echo base_url();?>pxl/do_submit_task">
					<div class="heading">Add New Task</div>
					<div class="form-group wd100">
						<label>Task Name</label>
						<input type="text" name="task_name" id="task_name" required class="custom_payment_input" value="">
					</div>
					<?php /* ?>
					<div class="form-group wd100">
						<label>Task Detail</label>
						<input type="text" name="task_detail" id="task_detail" required class="custom_payment_input" value="">
					</div>
					<?php */ ?>
					<div class="form-group wd100">
						<label>Task Date</label>
						<input type="date" name="task_date" id="task_date" required class="custom_payment_input" value="">
					</div>
					<div class="">
						<div class="button_mid text-center m-t-5">
							<button type="button" class="btn_custom_small black close_popup">Close</button>
							<button type="submit" class="btn_custom_small primary">Save</button>
						</div>
					</div>
				</form>
			</div>
	</div>

<?php
	$all_tasks = $this->db->query("SELECT * FROM tasks WHERE complete = 0 AND uID = ".user_info()->id." ORDER by task_date ASC")->result_object();
	$complete_tasks = $this->db->query("SELECT * FROM tasks WHERE complete = 1 AND uID = ".user_info()->id."")->num_rows();
	$incomplete_tasks = $this->db->query("SELECT * FROM tasks WHERE complete = 0 AND uID = ".user_info()->id."")->num_rows();
	$due_tasks = $this->db->query("SELECT * FROM tasks WHERE complete = 0 AND uID = ".user_info()->id."  AND DATE(task_date) <= CURDATE()")->num_rows();
	$total_tasks = $this->db->query("SELECT * FROM tasks WHERE uID = ".user_info()->id."")->num_rows();
?>

<div class="top_taks_count">
	<div class="task_box_big dashboard_card">
		<div class="heading">Completed tasks</div>
		<div class="count_task">
			<?php echo $complete_tasks;?>
		</div>
	</div>
	<div class="task_box_big dashboard_card">
		<div class="heading">Incomplete Tasks</div>
		<div class="count_task">
			<?php echo $incomplete_tasks;?>
		</div>
	</div>
	<div class="task_box_big dashboard_card">
		<div class="heading">Due Tasks</div>
		<div class="count_task">
			<?php echo $due_tasks;?>
		</div>
	</div>
	<div class="task_box_big dashboard_card">
		<div class="heading">Total Tasks</div>
		<div class="count_task">
			<?php echo $total_tasks; ?>
		</div>
	</div>
</div>
<div class="dahboard_boxes">
	<div class="top_boxes_dashboard">
		<div class="right_dashbaord dashboard_card wd100">
			<div class="head_dash mb_20">
				Tasks
				<button class="add_task_new">+ Add</button>
			</div>

			<?php include("common/validation.php"); ?>

			<?php 
				
				foreach ($all_tasks as $key => $row) {
			?>
				<div class="tasks_list">
					<div class="left_list_section">
						<div class="icon_check <?php echo $row->complete==1?'active_complete':'';?>" id="icon_check_<?php echo $row->id;?>" onclick="do_update_task_info(<?php echo $row->id;?>)">
							<svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M15.8678 0C19.619 0 22.1309 2.77667 22.1309 6.90667V16.4395C22.1309 20.5567 19.619 23.3333 15.8678 23.3333H6.2741C2.52292 23.3333 0 20.5567 0 16.4395V6.90667C0 2.77667 2.52292 0 6.2741 0H15.8678ZM15.6908 8.16667C15.3146 7.77 14.6949 7.77 14.3187 8.16667L9.74864 12.985L7.81219 10.9433C7.43597 10.5467 6.8163 10.5467 6.44008 10.9433C6.06386 11.34 6.06386 11.9817 6.44008 12.39L9.07365 15.155C9.26176 15.3533 9.5052 15.4467 9.74864 15.4467C10.0031 15.4467 10.2466 15.3533 10.4347 15.155L15.6908 9.61333C16.067 9.21667 16.067 8.575 15.6908 8.16667Z" fill="#DADADA"/>
							</svg>
						</div>
						<div class="text_list">
							<div class="bold_head"><?php echo $row->task_name;?></div>
							<span><?php //echo $row->task_detail;?></span>
						</div>
					</div>
					<div class="time_task">
						<?php echo date("d F Y", strtotime($row->task_date));?>
					</div>
				</div>
			<?php } ?>

		</div>
	</div>
</div>

<?php include("common/footer_dashboard.php"); ?>
<script type="text/javascript">
	$(".add_task_new").on("click", function(){
		$("#show_task").show();
	})
	$(".close_popup").on("click", function(){
		$("#show_task").hide();
	})
</script>