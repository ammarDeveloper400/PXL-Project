<?php include("common/header_dashboard.php"); ?>
<style type="text/css">
	.white_list {
		padding: 5px 0px;
	}
</style>
<div class="dahboard_boxes">
	<div class="top_boxes_dashboard">
		<div class="left_dashboard dashboard_card d30 bigdashboard_flex">
			<div class="head_dash text-center" style="justify-content: center;">
				Workouts
			</div>
			<div class="workout_perc text-center">
				<span class="bigworkout">
					<?php 
								echo 
								$this->db->query("SELECT COUNT(*) as total_records
								FROM user_exercises
								WHERE uID = ".user_info()->id."
								AND `finished_at` >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")->result_object()[0]->total_records; 
					?>
				</span>
			</div>
		
			<div class="bar_result">
				<span>Good work. You are on track.</span>
			</div>
		</div>
		<div class="right_dashbaord dashboard_card d70">
			<div class="head_dash mb_20">
				Tasks
				<a href="<?php echo base_url();?>tasks?show=1">
					<button class="">+ Add</button>
				</a>
			</div>

			<?php
			$all_tasks = $this->db->query("SELECT * FROM tasks WHERE complete = 0 AND uID = ".user_info()->id." ORDER by task_date ASC LIMIT 3")->result_object();
			?>
			<?php 
				foreach ($all_tasks as $key => $row) {
			?>
				<div class="tasks_list" id="remove_task_<?php echo $row->id;?>">
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

	<div class="dashboard_card wd100">
			<div class="head_dash mb_20 timelog_act">
				Schedule Activity
			</div>
			<div id="curve_chart" style="height: 300px"></div>
	</div>


	<div class="top_boxes_dashboard">
		<div class="left_dashboard dashboard_card d70">
			<div class="head_dash">
				Workouts
			</div>

			<?php 
				$first_workouts = $this->db->query("SELECT * FROM workouts WHERE status = 1 ORDER BY id ASC LIMIT 3")->result_object();
				foreach ($first_workouts as $key => $wrow) {
					$get_total_time = $this->db->query("SELECT SUM(time) AS TIME_TOTAL FROM workout_exercises WHERE wID = ".$wrow->id)->result_object()[0];
			?>
				<a href="<?php echo base_url();?>workout/detail/<?php echo $wrow->id;?>" class="tasks_list white_list">
					<div class="left_list_section">
						<div class="icon_check">
							<img src="<?php echo base_url();?>resources/uploads/workout/<?php echo $wrow->image;?>">
						</div>
						<div class="text_list">
							<div class="bold_head"><?php echo $wrow->title_1;?></div>
							<span><?php echo $wrow->title;?></span>
						</div>
					</div>
					<div class="time_task">
						<?php echo round($get_total_time->TIME_TOTAL,0); ?> minutes
					</div>
				</a>
			<?php } ?>
			
		</div>
		<div class="right_dashbaord dashboard_card d30 upgrade_plan">
			<div class="head_dash mb_20 text-center">
				Upgrade Plan
			</div>
			<p>
				Quick and Easy! Get more productivity features with premium model
			</p>
			<div class="text-center">
				<a href="<?php echo base_url();?>upgrade/plan">
					<button class="">Upgrade Now</button>
				</a>
			</div>
		</div>
	</div>

</div>


<?php 	
	$date_fasting = null;
	// $today_date = date("Y-m-d");
	// $date_db = date('Y-m-d', strtotime('-7 days'));
	// $datediff = strtotime($today_date) - strtotime($date_db);
  // $total_days_personal = round($datediff / (60 * 60 * 24));
  // if($total_days_personal == 0){
  //   $total_days_personal = 1;
  // }
	//   $fasting = 10;
	//   for($i=0;$i<=$total_days_personal;$i++){
	// 	  	$show_date = date('Y-m-d', strtotime('-'.$i.' days'));
	//   		$personal_data = $this->db->query("SELECT COUNT(id) as COUNT_SCHEDULE FROM schedule WHERE task_date = '".$show_date."' AND uID = ".user_info()->id)->result_object()[0];
	//       $date_display = date("F d", strtotime($show_date));
	//       $date_fasting .= "['".$date_display."',  $personal_data->COUNT_SCHEDULE],";
	//   }
?>

<?php include("common/footer_dashboard.php"); ?>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['', 'Schedule'],
      <?php //echo $date_fasting;?>
      ['<?php echo date("F d");?> ',0],
    ]);

    var options = {
      title: '',
      curveType: 'function',
      'width': '100%',
       'chartArea': {'width': '95%', 'height': '80%'},
       series: {
            0: { lineWidth: 3 },
          },
          colors: ['#F16623'],
      vAxis: {
			    viewWindow: {
			        min: 0,
			        max: 12
				},
				ticks: [0,2,4,6,8,10,12],
				gridlines: {color: '#fafafa'}, 
			},
			
      legend: { position: 'none' }
    };
    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);
  }
</script>