<?php include("common/header_dashboard.php"); ?>
<link rel="stylesheet" href="<?php echo $assets;?>css/simple-calendar.css">
<link rel="stylesheet" href="<?php echo $assets;?>css/demo.css">
<?php include("common/validation.php"); ?>
<div class="dahboard_boxes">
	<div class="top_boxes_dashboard">
		<div class="left_dashboard dashboard_card d65">
			<div class="head_dash text-center">
				Schedule
				<a href="javascript:;show_details()">
					<button class="">+ Add</button>
				</a>
			</div>

			<div id="calendar_full"></div>
		
		</div>
		<div class="right_dashbaord d35">
			<div class="dashboard_card">
				 <div id="container" class="calendar-container"></div>
			</div>
			<?php if(user_info()->user_type == 1){?>
			<div class="dashboard_card">
				<div class="head_dash text-center">
					Exercise Volume
				</div>
				<div class="exercise_volum" id="columnchart_values" style="height: 200px;"></div>
			</div>
			<?php } ?>
			
		</div>
	</div>

</div>



<div class="popup_outer" id="show_task" style="display: none">
			<div class="popup_inner text-left">
				<form method="post" action="<?php echo base_url();?>pxl/do_save_schedule">
					<div class="heading">Add New Schedule</div>
					<div class="form-group wd100">
						<label>Name</label>
						<input type="text" name="task_name" id="task_name" required class="custom_payment_input" value="">
					</div>
					<div class="form-group wd100">
						<label>Date</label>
						<input type="date" name="task_date" id="task_date" required class="custom_payment_input" value="">
					</div>
					<div class="row_double">
						<div class="form-group wd100">
							<label>Start Time</label>
							<input type="time" name="start_time" id="start_time" required class="custom_payment_input" value="">
						</div>
						<div class="form-group wd100">
							<label>End Time</label>
							<input type="time" name="end_time" id="end_time" required class="custom_payment_input" value="">
						</div>
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

<?php include("common/footer_dashboard.php"); ?>
<script src="<?php echo $assets;?>js/jquery.simple-calendar.js?time=<?php echo time();?>"></script>
<script>
    $(document).ready(function(){
        $("#container").simpleCalendar({
            fixedStartDay: false,
             insertEvent: false,              // can insert events
	        displayEvent: false,             // display existing event
	        insertCallback : function(){
	        	
	        }   // Callback when an event is added to the calendar
        });
    });
</script>

<?php 
		$speed = $this->db->query("SELECT COUNT(*) as total_records
			FROM user_exercises
			WHERE uID = ".user_info()->id."
			AND category = 'Speed'
			AND `finished_at` >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")->result_object()[0]->total_records; 
?>
<?php 
		$power = $this->db->query("SELECT COUNT(*) as total_records
			FROM user_exercises
			WHERE uID = ".user_info()->id."
			AND category = 'Power'
			AND `finished_at` >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")->result_object()[0]->total_records; 
?>
<?php 
		$Agility = $this->db->query("SELECT COUNT(*) as total_records
			FROM user_exercises
			WHERE uID = ".user_info()->id."
			AND category = 'Agility'
			AND `finished_at` >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")->result_object()[0]->total_records; 
?>
<?php 
		$Endurance = $this->db->query("SELECT COUNT(*) as total_records
			FROM user_exercises
			WHERE uID = ".user_info()->id."
			AND category = 'Endurance'
			AND `finished_at` >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")->result_object()[0]->total_records; 
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load("current", {packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ["", "exercises", { role: "style" } ],
    ["Speed", <?php echo $speed;?>, "#F16623"],
    ["Power", <?php echo $power;?>, "#F16623"],
    ["Agility", <?php echo $Agility;?>, "#F16623"],
    ["Endurance", <?php echo $Endurance;?>, "#F16623"]
  ]);

  var view = new google.visualization.DataView(data);
  view.setColumns([0, 1,
                   { calc: "stringify",
                     type: "string",
                     role: "annotation" },
                   2]);

  var options = {
    title: "",
    'width': '100%',
   'chartArea': {'width': '90%', 'height': '80%'},
    bar: {groupWidth: "50%"},
    legend: { position: "none" },
  };
  var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
  chart.draw(view, options);
}
</script>

<link href="<?php echo $assets;?>calendar/fullcalendar.css" rel="stylesheet" />
<link href="<?php echo $assets;?>calendar/fullcalendar.print.css" rel="stylesheet" media="print" />
<script src="<?php echo $assets;?>calendar/moment.min.js"></script>
<script src="<?php echo $assets;?>calendar/fullcalendar.js"></script>
<?php 
	$all_schedules = $this->db->query("SELECT * FROM schedule WHERE uID = ".user_info()->id)->result_object();
?>
<script type="text/javascript">

$(function() {
  $("#calendar_full").fullCalendar({
  				header:{
	                left: 'prev,next,today ',
	                center: 'title',
	                right: 'agendaDay,agendaWeek,month'
	            },
	            defaultView: 'agendaDay',
	            editable: false,
	            selectable: true,
	            allDaySlot: false,
               events: [
               		<?php foreach ($all_schedules as $key => $row) { ?>
	                   {
	                     title: '<?php echo $row->title;?>',
	                     start: '<?php echo $row->task_date;?> <?php echo $row->start_time;?>',
	                     end: '<?php echo $row->task_date;?> <?php echo $row->end_time;?>'
	                   },
	               <?php } ?>
                   // {
                   //   title: 'Jummah',
                   //   start: '2023-03-10 12:00:00',
                   //   end: '2023-03-10 14:00:00'
                   // },
                 ],
               // eventClick:  function(arg) {
		       //       console.log(arg);
		       //   },
        });

});

function show_details(){
	$("#show_task").show();
}
$(".close_popup").on("click", function(){
		$("#show_task").hide();
	})
</script>
