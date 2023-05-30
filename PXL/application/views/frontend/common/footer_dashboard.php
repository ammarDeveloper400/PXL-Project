</div>
</div>
</body>
<?php if($this->uri->segment==""){ ?>
<script src="https://unpkg.com/jquery@3.4.1/dist/jquery.min.js"></script>
<?php } else {?>
<script type="text/javascript" src="<?php echo $assets;?>js/jquery.min.js"></script>
<?php } ?>
<script src="<?php echo $assets; ?>dropify/dist/js/dropify.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
        $('.dropify').dropify();
        $("#mirror_loader").delay(500).fadeOut();
    });

    function show_profile_option(){
    	$(".notification_panel").hide();
    	$("#profile_dropdown").slideToggle();
    }
	function show_left_navbar(){
		if ($("#sidebarMenu").hasClass("sidebarMenu_click")) {
			$("#sidebarMenu").removeClass('sidebarMenu_click');
		} else {
			$("#sidebarMenu").addClass('sidebarMenu_click');
		}
	}
	$("#eye_icon_show").on("click", function(){
		if($(this).hasClass( "fa fa-eye-slash" )){
			$("#eye_icon_show").removeClass('fa-eye-slash');
			$("#eye_icon_show").addClass('fa-eye');
			$("#password").attr('type', 'text'); 	
		} else {
			$("#eye_icon_show").removeClass('fa-eye');
			$("#eye_icon_show").addClass('fa-eye-slash');
			$("#password").attr('type', 'password');
		}
		
	});

	$(".bars_mobile").on("click", function(){
		
		// $(".left_side_bar").show();
		// if($(".left_side_bar").is(':visible')){
			// $(".left_side_bar").show();
		// } else {
			// $(".left_side_bar").hide();
		// }
	})

	$(document).ready(function() {
	    setTimeout(function() { 
	       $(".validation_success, .validation_error, .result_success").fadeOut('slow');
	    }, 5000);
	} );

	$(".notifcation").on("click", function(){
		$("#notification_panel").slideToggle('slow');
		$("#profile_dropdown").hide();
	})


	function do_update_task_info(val){
		$.ajax({
				url: '<?php echo base_url()."pxl/do_update_task/";?>'+val,
				cache: false,
				contentType: false,
				type: 'post',
				success: function(response){
					window.location.href = "<?php echo base_url();?>tasks";
					// if(response==1){
					// 	$("#icon_check_"+val).addClass('active_complete');
					// 	$("#result").show().html('Task Completed successfully!');
					// } else if(response==2){
					// 	$("#icon_check_"+val).removeClass('active_complete');
					// 	$("#result").show().html('Task has been marked as incomplete!');
					// }
				}
			});
	}


	
</script>
</html>