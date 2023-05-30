<?php include("common/header_dashboard.php"); ?>
	
<?php
	$workout = $this->db->query("SELECT * FROM workouts WHERE id = ".$id."")->result_object()[0];
?>

<div class="dahboard_boxes">
	<div class="top_boxes_dashboard">
		<div class="right_dashbaord dashboard_card wd100" style="background: rgba(255, 255, 255, 0.13);box-shadow: 0px 10px 99px rgba(0, 0, 0, 0.09);">
			<div class="head_dash mb_20">
				Workouts -::- <?php echo $workout->title_1;?>
			</div>

			<?php include("common/validation.php"); ?>

			<?php 
				$all_tasks = $this->db->query("SELECT * FROM workout_exercises WHERE status = 1 AND wID = ".$id)->result_object();
				foreach ($all_tasks as $key => $row) {
					$completed = $this->db->query("SELECT * FROM user_exercises WHERE exercide_id = ".$row->id." AND uID = ".user_info()->id)->num_rows();
			?>
				<a href="<?php echo base_url();?>exercise/<?php echo $row->id;?>" class="tasks_list white_task_list">
					<div class="left_list_section">
						<div class="icon_check exercise_chck">
							<img src="<?php echo base_url();?>resources/uploads/workout/<?php echo $row->image!=null?$row->image:"dummy_exercise.png";?>">
						</div>
						<div class="text_list" style="line-height: 20px;">
							<div class="bold_head"><?php echo $row->title;?></div>
							<span>
								<?php echo date("H:i",strtotime($row->time));?> Minutes
							</span>
						</div>
					</div>
					<div class="time_task">
						<?php if($completed>0){?>
							<span style="color:green"><b>FINISHED</b></span>
						<?php } ?>
					</div>
				</a>
			<?php } ?>

			<?php if(empty($all_tasks)){
				echo "<span class='not_found_data'>No Exercise Found!</span>";
			} ?>

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