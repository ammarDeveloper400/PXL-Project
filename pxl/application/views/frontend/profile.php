<?php include("common/header_dashboard.php"); ?>

<?php 
if($row->country != null){
	$country = $this->db->query("SELECT * FROM countries WHERE id = ".$row->country)->result_object()[0]; 
}
?>


<div class="dahboard_boxes">
<?php if(user_info()->user_type == 1){?>
	<style>
		.image_header_ img {
			width: 55px;
			height: 55px;
			border-radius: 100px;
		}
		
	</style>
	<div class="dashboard_card wd100">
			<div class="text-center">
				<div class="image_header_">
					<img src="<?php echo $uploads;?>profiles/<?php echo user_info()->profile_pic;?>">
				</div>
			</div>

			<div class="text-center flex_cent">
					<div class="box_pro">
						<div class="top_point">
								<span><?php echo user_info()->weight==null?"N/A":user_info()->weight;?></span>kg
						</div>
						<div class="low_point">
							Weight
						</div>
					</div>
					<div class="box_pro">
						<div class="top_point">
								<span><?php echo user_info()->height==null?"N/A":user_info()->height;?></span>cm
						</div>
						<div class="low_point">
							Height
						</div>
					</div>
					<div class="box_pro">
						<div class="top_point">
								<span><?php echo user_info()->dob;?></span>yrs
						</div>
						<div class="low_point">
							Age
						</div>
					</div>
			</div>

			<div class="bottom_flex prog_cent">
				<div class="left_progress">
					<div class="heading_prog">
						Progress
					</div>
					<div class="color_prog wd100">

						<div class="inner_progress">
							<div id="donutchart" style=""></div>
						</div>
					</div>
				</div>

				<div class="center_progress">
					<div class="heading_prog">
						Monthly Progress
					</div>
					<div class="color_prog wd100 min_height_c_prog">
								<div class="circle-big">
									<div class="text">
										80%
									</div>
									<svg>
										<circle class="bg" cx="57" cy="57" r="52"></circle>
										<circle class="progress" cx="57" cy="57" r="52"></circle>
									</svg>
								</div>
							
						<div class="text_month">
							You have achieved <span>80%</span> of your<br>
							goal this month
						</div>
					</div>
				</div>

				<div class="right_progress">
					<div class="heading_prog">
						Your Goals
					</div>
					<div class="three_lines">
						<div class="color_prog wd100">
							<div class="flex_right_goal">
								<div class="flex_inner_section">
									<img src="<?php echo $assets;?>images/running.png">
									<div class="goal_flex">
										<b>Running</b>
										<span>70km/80km</span>
									</div>
								</div>
								<div class="relative prol_flex">
									<div class="count_percentage">
										79%
									</div>
									<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
											<circle cx="23" cy="23" r="21" stroke="#F5F5F5" stroke-width="3"/>
											<path d="M23 2C27.2005 2 31.3044 3.25967 34.7816 5.61624C38.2587 7.97282 40.9492 11.318 42.5055 15.2195C44.0618 19.1211 44.4122 23.3996 43.5117 27.5024C42.6111 31.6052 40.5008 35.3437 37.4535 38.2347C34.4062 41.1257 30.562 43.0365 26.4175 43.72C22.2731 44.4036 18.0188 43.8286 14.2045 42.0693C10.3902 40.31 7.19118 37.4473 5.02073 33.851C2.85027 30.2548 1.80817 26.0903 2.02907 21.8956" stroke="#1AB0B0" stroke-width="3" stroke-linecap="round"/>
											<circle cx="23" cy="2" r="1" fill="white"/>
									</svg>
								</div>
							</div>
						</div>
						<div class="color_prog wd100">
							<div class="flex_right_goal">
								<div class="flex_inner_section">
									<img src="<?php echo $assets;?>images/sleeping.png">
									<div class="goal_flex">
										<b>Sleeping</b>
										<span>50hrs/60hrs</span>
									</div>
								</div>
								<div class="relative prol_flex">
									<div class="count_percentage">
										79%
									</div>
									<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
											<circle cx="23" cy="23" r="21" stroke="#F5F5F5" stroke-width="3"/>
											<path d="M23 2C27.2005 2 31.3044 3.25967 34.7816 5.61624C38.2587 7.97282 40.9492 11.318 42.5055 15.2195C44.0618 19.1211 44.4122 23.3996 43.5117 27.5024C42.6111 31.6052 40.5008 35.3437 37.4535 38.2347C34.4062 41.1257 30.562 43.0365 26.4175 43.72C22.2731 44.4036 18.0188 43.8286 14.2045 42.0693C10.3902 40.31 7.19118 37.4473 5.02073 33.851C2.85027 30.2548 1.80817 26.0903 2.02907 21.8956" stroke="#FF7443" stroke-width="3" stroke-linecap="round"/>
											<circle cx="23" cy="2" r="1" fill="white"/>
									</svg>
								</div>
							</div>
						</div>
						<div class="color_prog wd100">
							<div class="flex_right_goal">
								<div class="flex_inner_section">
									<img src="<?php echo $assets;?>images/loss.png">
									<div class="goal_flex">
										<b>Wight Loss</b>
										<span>70kg/100kg</span>
									</div>
								</div>
								<div class="relative prol_flex">
									<div class="count_percentage">
										79%
									</div>
									<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
											<circle cx="23" cy="23" r="21" stroke="#F5F5F5" stroke-width="3"/>
											<path d="M23 2C27.2005 2 31.3044 3.25967 34.7816 5.61624C38.2587 7.97282 40.9492 11.318 42.5055 15.2195C44.0618 19.1211 44.4122 23.3996 43.5117 27.5024C42.6111 31.6052 40.5008 35.3437 37.4535 38.2347C34.4062 41.1257 30.562 43.0365 26.4175 43.72C22.2731 44.4036 18.0188 43.8286 14.2045 42.0693C10.3902 40.31 7.19118 37.4473 5.02073 33.851C2.85027 30.2548 1.80817 26.0903 2.02907 21.8956" stroke="#8676FE" stroke-width="3" stroke-linecap="round"/>
											<circle cx="23" cy="2" r="1" fill="white"/>
									</svg>
								</div>
							</div>
						</div>
					</div>
				</div>



			</div>

	</div>
<?php } else { ?>
	<div class="dashboard_card wd100 text-center">
			<div class="coach_wrap">

				<?php 
					
				?>
				
				<div class="coach_image_info">
					<img src="<?php echo $uploads;?>profiles/<?php echo $row->profile_pic;?>">
					<div class="right_info_coach">
						<b><?php echo $row->full_name; ?></b>
						<p class="coach_certificate"><?php echo $row->current_sport;?></p>
						<p class="coach_certificates">Hourly Rate: $<?php echo $row->dob;?></p>
						<?php if($row->country != null){ ?>
						<p class="address_coach"><i class="fa fa-map-marker"></i><?php echo $row->address;?>, <?php echo $country->name;?></p>
						<?php } ?>
					</div>
				</div>
				<div class="button_profile_edit">
					<?php if($id == 0){ ?>
						<a href="<?php echo base_url();?>public/profile">
						<button class="profile_coach_edit">Edit Profile</button>
						</a>
					<?php } else {?>
						<a href="<?php echo base_url();?>conversation/<?php echo $user_id;?>">
							<button class="profile_coach_edit">Contact</button>
						</a>
					<?php } ?>
				</div>
			</div>

			<div class="overview_div">
				<h5>Overview</h5>
				<div class="overview_text">
					<p>
						<?php echo $row->overview;?>
					</p>
				</div>
			</div>

			<div class="overview_div">
				<h5>Experience</h5>
				<div class="overview_text">
					<p>
						<?php echo $row->experience;?>
					</p>
				</div>
			</div>


	</div>
<?php } ?>

</div>

<style type="text/css">
	.donutchart svg rect {
		fill: transparent !important;
	}
</style>

<?php include("common/footer_dashboard.php"); ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Cardio',     25],
      ['Stretching',      25],
      ['Treadmill',  25],
      ['Strength', 25],
    ]);

    var options = {
    	legend: 'show',
      title: '',
      'width': '100%',
       'chartArea': {'width': '90%', 'height': '80%'},
       colors: ['#1AB0B0', '#FF844B', '#F85C7F', '#8676FE'],
      pieHole: 0.5,
      backgroundColor:"transparent"
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
  }
</script>