<?php include("common/header_dashboard.php"); ?>
	
<?php
	$row = $this->db->query("SELECT * FROM workout_exercises WHERE id = ".$id."")->result_object()[0];
?>

<div class="dahboard_boxes">
	<div class="top_boxes_dashboard">
		<div class="right_dashbaord dashboard_card wd100" style="background: rgba(255, 255, 255, 0.13);box-shadow: 0px 10px 99px rgba(0, 0, 0, 0.09);">
			<?php include("common/validation.php"); ?>

			<div class="exercise_dash_head mb_20">
				<h4>
					<?php echo $row->title;?>
				</h4>
				<div class="exercise_time_count" id="demo">
					00:00
				</div>
			</div>

			<div class="video_exercise">
				<video width="100%" height="240" controls>
				  <source src="<?php echo base_url();?>resources/uploads/workout/<?php echo $row->video;?>" type="video/mp4">
				  <source src="<?php echo base_url();?>resources/uploads/workout/<?php echo $row->video;?>" type="video/ogg">
				Your browser does not support the video tag.
				</video>
			</div>

			<div class="small_description_exercise">
				<?php echo $row->description;?>
			</div>


			<div class="calories_dumbellss">
				<div class="box_dubmbells">
					<span>Equipment</span>
					<div class=""><?php echo $row->equipments;?></div>
				</div>
				<div class="box_dubmbells">
					<span>Time</span>
					<div class=""><?php echo date("H:i", strtotime($row->time));?> min</div>
				</div>
				<div class="box_dubmbells">
					<span>Intensity</span>
					<div class=""><?php echo $row->intensity;?></div>
				</div>
				<div class="box_dubmbells">
					<span>Calories</span>
					<div class=""><?php echo $row->calories;?> kcal</div>
				</div>
			</div>


			<div class="abc_tech">
				<h5>Exercise technique</h5>
				<div class="technique_desc">
					<?php echo $row->technique_description;?>
				</div>

			</div>


			<div class="button_support float_right">
				<div class="button_mid m-t-5">
					<a href="javascript:;">
						<button type="button" class="btn_convo_small_ee primary onlyborder" id="button">Pause</button>
					</a>
					<a href="<?php echo base_url();?>pxl/do_finish_exercise/<?php echo $row->id;?>/<?php echo $id;?>">
						<button type="submit" class="btn_convo_small_ee primary">Finish</button>
					</a>
				</div>
			</div>

		</div>
	</div>
</div>
			
			<h5 class="work_next">NEXT EXERCISE</h5>

			<?php 
				$all_tasks = $this->db->query("SELECT * FROM workout_exercises WHERE id > ".$id." AND status = 1 ORDER BY id LIMIT 1")->result_object();
				foreach ($all_tasks as $key => $row) {
					$completed = $this->db->query("SELECT * FROM user_exercises WHERE exercide_id = ".$row->id." AND uID = ".user_info()->id)->num_rows();
			?>
				<a href="<?php echo base_url();?>exercise/<?php echo $row->id;?>" class="tasks_list white_task_list" style="margin-bottom: 30px;">
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

<?php include("common/footer_dashboard.php"); ?>

<script type="text/javascript">
$(document).ready(function() {
  // Get the current time
  var now = new Date();
  
  // Add the user-defined time (in minutes)
  var userTime = <?php echo round($row->time,0);?>;
  now.setMinutes(now.getMinutes() + userTime);

  // Variable to store the remaining time when countdown is paused
  var remainingTime = null;

  function updateCountdown() {
    var currentTime = new Date().getTime();

    // Calculate the time remaining
    var timeRemaining;
    if (remainingTime !== null) {
      timeRemaining = remainingTime - currentTime;
    } else {
      timeRemaining = now - currentTime;
    }

    // Calculate minutes and seconds
    var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
    
    if (minutes < 10) {
      minutes = "0" + minutes;
    }

    // Display the countdown
    $("#demo").text(minutes+":"+seconds);
    
    // If the countdown is finished, clear the interval
    if (timeRemaining < 0) {
      clearInterval(countdown);
      $("#demo").text("Time's up!");
    }
  }

  // Start the countdown
  var countdown = setInterval(updateCountdown, 1000);

  // Handle the button click event
  $("#button").click(function() {
    if ($(this).text() === "Pause") {
      // If the button says "Pause", stop the countdown and change the button text to "Start"
      clearInterval(countdown);
      remainingTime = now.getTime() - new Date().getTime();
      $(this).text("Start");
    } else {
      // If the button says "Start", start the countdown from the remaining time and change the button text to "Pause"
      now = new Date(new Date().getTime() + remainingTime);
      countdown = setInterval(updateCountdown, 1000);
      remainingTime = null;
      $(this).text("Pause");
    }
  });
});



</script>