<?php include("common/header_dashboard.php"); ?>

<?php include("common/validation.php"); ?>
<div class="dahboard_boxes">
	<div class="top_boxes_dashboard">
			<div class="workout_wrap wd100">
				<h3>Workouts</h3>
				<div class="work_out_flex">
					<?php 
						$workouts = $this->db->query("SELECT * FROM workouts WHERE status = 1")->result_object();
						foreach ($workouts as $key => $row) {

							$get_total_time = $this->db->query("SELECT SUM(time) AS TIME_TOTAL FROM workout_exercises WHERE status = 1 AND wID = ".$row->id)->result_object()[0];
					?>
					<div class="workout_boxes">
							<div class="left_workout">
								<div class="yellow_work"><?php echo $row->title;?></div>
								<div class="black_work"><?php echo $row->title_1;?></div>
								<div class="sub_work_"><?php echo $row->sub_head;?></div>
								<div class="sub_work_">Strenght: <?php echo $row->strength;?></div>
								<div class="sub_work_">Total time: <?php echo round($get_total_time->TIME_TOTAL,0);?> minutes</div>

								<a href="<?php echo base_url();?>workout/detail/<?php echo $row->id;?>" class="start_button">
									<button type="button" class="btn_convo_small primary" style="height:35px">Start</button>
								</a>
							</div>
							<div class="right_workout">
									<img src="<?php echo $uploads;?>workout/<?php echo $row->image;?>?time=<?php echo time();?>">
							</div>
					</div>
					<?php } ?>
				</div>
			</div>
	</div>

</div>

<?php include("common/footer_dashboard.php"); ?>