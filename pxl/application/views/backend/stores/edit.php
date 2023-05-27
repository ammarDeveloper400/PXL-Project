<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Coaches Management</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url."admin";?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url."admin/service/providers";?>">Coaches</a></li>
                <li class="breadcrumb-item active">Edit</li>
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
            <?=form_open_multipart('',array('class'=>''));?>
            <div class="card">
                
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Update Information
                    </h4>
                </div>

               <div class="card-body lang_bodieslisting">
                    
                <div class="row">
                    
                    <div class="col-lg-6 col-md-6">
                        <?php $input = "title"; ?>
                        <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                            <label>Coach Name <span class="text-danger">*</span></label>
                            <div class="controls">
                                <input type="text" name="<?php echo $input; ?>" class="form-control form-control-line" required data-validation-required-message="This field is required" placeholder="Coach Name" value="<?php if(set_value($input) != ''){ echo set_value($input);}else echo $data->full_name;?>" >
                                <div class="text-danger"><?php echo form_error($input);?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group <?=(form_error('email') !='')?'error':'';?>">
                            <label>Email : <span class="text-danger">*</span></label>
                            <div class="controls">
                                <input type="text" class="form-control" placeholder="Email Address" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" data-validation-regex-message="Please enter the valid email address." required data-validation-required-message="This field is required" name="email" value="<?php if(set_value('email') != ''){ echo set_value('email');}else echo $data->email;?>">
                                <div class="text-danger"><?php echo form_error('email');?></div>
                            </div>
                        </div>
                    </div>
                </div>

               
               
                </div>
                
                <input type="hidden" name="<?php echo "row_id"; ?>" value="<?php echo $data->id; ?>">
            </div>
            <div class="card-bodys">
                <div class="text-xs-right">
                    <button type="submit" class="btn btn-info">Update</button>
                    <a href="<?=$url;?>admin/coaches" class="btn btn-inverse">Cancel</a>
                </div>
            </div>
            <?=form_close();?>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>