<?php if(isset($_SESSION['valid'])){?>
	<div class="validation_success">
		<p>
			<?php echo $_SESSION['valid']; ?>
		</p>
	</div>
<?php unset($_SESSION['valid']);} ?>

<?php if(isset($_SESSION['invalid'])){?>
	<div class="validation_error">
		<p>
			<?php echo $_SESSION['invalid']; ?>
		</p>
	</div>
<?php unset($_SESSION['invalid']);} ?>

<?php if(validation_errors()){?>
	<div class="validation_error">
		<p>
			<?php echo validation_errors(); ?>
		</p>
	</div>
<?php } ?>