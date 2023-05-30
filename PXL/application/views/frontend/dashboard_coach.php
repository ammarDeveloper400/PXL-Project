<?php include("common/header_dashboard.php"); ?>
<style type="text/css">
	.white_list {
		padding: 5px 0px;
	}
</style>
<div class="dahboard_boxes">
	<div class="top_boxes_dashboard">
		
		<div class="right_dashbaord dashboard_card wd100">
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
		<!-- <div class="left_dashboard dashboard_card d30">
			<div class="head_dash">
				Courses
			</div>
			
		</div> -->
	</div>

	<div class="dashboard_card wd100">
			<div class="head_dash mb_20 timelog_act">
				Athlete count

				<div class="log_week_month">
					<button type="button" class="btn_log_actvity active_log">
						Weekly
					</button>
					<button type="button" class="btn_log_actvity">
						Monthly
					</button>
				</div>
			</div>
				<div id="curve_chart" style="height: 300px"></div>

	</div>


	<div class="">
		<div class="dashboard_card">
			<div class="head_dash">
				Payment History
				<a href="#" style="font-size: 15px;
    color: var(--primary-color);
    text-transform: uppercase;">View All</a>
			</div>

			<div class="no_history_found">
				 No payment history found!
			</div>
		</div>

	</div>

</div>

<?php include("common/footer_dashboard.php"); ?>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

 function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['', 'hours'],
      ['Jan ',10],
      ['Feb',10],
      ['Mar',6],
      ['Apr',20],
      ['May',8],
      ['Jun',30],
      ['Jul',4],
      ['Aug',40],
      ['Sep',14],
      ['Oct',4],
      ['Nov',24],
      ['Dec',50],
      
    ]);

    var options = {
      title: '',
      curveType: 'function',
      'width': '100%',
       'chartArea': {'width': '95%', 'height': '80%'},
       series: {
            0: { lineWidth: 3 },
            1: { lineWidth: 3 },
          },
          colors: ['#F16623'],
      vAxis: {
			    viewWindow: {
			        min: 0,
			        max: 50
				},
				ticks: [10,20,30,40,50],
				gridlines: {color: '#f0f0f0'}, 
			},
			
      legend: { position: 'none' }
    };
    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);
  }
</script>