<style>
	  .dropify-wrapper .dropify-message p{
		  text-align: center;
	  }
 </style>
   <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Site Settings</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=$url;?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Site Settings</li>
            </ol>
        </div>
        
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <?=form_open_multipart('',array('class'=>'m-t-40','novalidate'=>""));?>

            <div class="card card-outline-info">
               <div class="card-header">
                    <h4 class="m-b-0 text-white">Site Settings</h4>
                </div>
                <div class="card-body">

                       	<div class="form-group">
    						<div class="card">
    							<div class="card-bodys">
    								<label class="card-title">Logo</label>
    								
    								<input type="file" id="input-file-disable-remove" class="dropify" data-show-remove="false" name="logo" data-default-file="<?=$root;?>resources/uploads/logo/<?php echo $data->site_logo;?>" />
    								
    							</div>
    						</div>
						</div>

                        <div class="form-group">
                            <div class="card">
                                <div class="card-bodys">
                                    <label class="card-title">Site Favicon</label>
                                    
                                    <input type="file" id="input-file-disable-remove" class="dropify" data-show-remove="false" name="favicon" data-default-file="<?=$root;?>resources/uploads/favicon/<?php echo $data->site_favicon;?>" />
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Title <span class="text-danger">*</span></label>
                            <div class="controls">
                                <input type="text" name="title" class="form-control" required data-validation-required-message="This field is required" placeholder="Title" value="<?php if(set_value('title') != ''){ echo set_value('title');}else{ echo $data->site_title;}?>"> 
                                <div class="text-danger"><?php echo form_error('title');?></div>
                                </div>
                            
                        </div>
                      
                        <div class="form-group">
                            <label>Email Address </label>
                            <div class="controls">
                                <input type="text" class="form-control" placeholder="Email Address" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" data-validation-regex-message="Please enter the valid email address." name="email" value="<?php if(set_value('email') != ''){ echo set_value('email');}else{ echo $data->email;}?>"> 
                                <div class="text-danger"><?php echo form_error('email');?></div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <div class="controls">
                                <input type="text" name="mobile" class="form-control" required data-validation-required-message="This field is required" placeholder="Mobile Number" value="<?php if(set_value('mobile') != ''){ echo set_value('mobile');}else{ echo $data->mobile;}?>"> 
                                <div class="text-danger"><?php echo form_error('mobile');?></div>
                                </div>
                            
                        </div>
                        
                        
                </div>
            </div>

            <div class="text-xs-right mb-5">
                <button type="submit" class="btn btn-info">Submit</button>
            </div>
         <?=form_close();?>

         <div class="col-md-12" style="margin-bottom: 20px;"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>
