<?php include("common/header_dashboard.php"); ?>
	
<?php
	$testing = $this->db->query("SELECT * FROM testing WHERE uID = ".user_info()->id)->num_rows();
	$athlete = $this->db->query("SELECT * FROM athlete_evaluation WHERE uID = ".user_info()->id)->num_rows();
	
?>

<div class="evaluation_middle_div">
	<h3>Choose Evaluation Type</h3>
	<div class="flex_space_evaluation">
		<div class="dashboard_card eval_div">
			<div class="evaluation_image">
				<img src="<?php echo $assets;?>images/eva_1.svg">
				<div class="com_no_com">
					<?php if($athlete > 0){?>
						<img src="<?php echo $assets;?>images/completed.png">
					<?php } else { ?>
						<img src="<?php echo $assets;?>images/not_completed.png">
					<?php } ?>
				</div>
			</div>
			<div class="heading">Athletic Evaluation</div>
			<div class="count_task">
				<?php if($athlete > 0){?>
					<span style="color:#68D000">Completed</span>
				<?php } else { ?>
					<span style="color:#DA0000">Not Completed</span>
				<?php } ?>
				
			</div>

			<a href="<?php echo base_url();?>athletic/evaluation">
				<button class="button_badge"><?php echo $athlete == 0?"Complete":"Edit";?> Evaluation</button>
			</a>
		</div>
		<div class="dashboard_card eval_div">
			<div class="evaluation_image">
				<img src="<?php echo $assets;?>images/eva_2.svg">
				<div class="com_no_com">
					<?php if($testing > 0){?>
						<img src="<?php echo $assets;?>images/completed.png">
					<?php } else { ?>
						<img src="<?php echo $assets;?>images/not_completed.png">
					<?php } ?>
				</div>
			</div>
			<div class="heading">Biological Evaluation</div>
			<div class="count_task">
				<?php if($testing > 0){?>
					<span style="color:#68D000">Completed</span>
				<?php } else { ?>
					<span style="color:#DA0000">Not Completed</span>
				<?php } ?>
			</div>
			<a href="<?php echo base_url();?>biological/evaluation">
				<button class="button_badge"><?php echo $testing == 0?"Complete":"Edit";?> Evaluation</button>
			</a>
		</div>
	</div>
</div>
<?php include("common/footer_dashboard.php"); ?>