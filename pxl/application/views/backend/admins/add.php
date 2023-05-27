<?php

 ?>

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Admins Management</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=$url;?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?=$url;?>admin/admins">Admins</a></li>
                <li class="breadcrumb-item active">Add New Admin</li>
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
            <?=form_open_multipart('',array('class'=>'','novalidate'=>""));?>
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Add New Admin
                       
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group <?=(form_error('fname') !='')?'error':'';?>">
                                <label>Name : <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="text" name="fname" class="form-control form-control-line" required data-validation-required-message="This field is required" placeholder="Name" value="<?php if(set_value('fname') != ''){ echo set_value('fname');}else echo $prev->name;?>" >
                                    <div class="text-danger"><?php echo form_error('fname');?></div>
                                </div>

                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                       
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group <?=(form_error('email') !='')?'error':'';?>">
                                <label>Email : <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="text" class="form-control form-control-line" placeholder="Email Address" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" data-validation-regex-message="Please enter the valid email address." required data-validation-required-message="This field is required" name="email" value="<?php if(set_value('email') != ''){ echo set_value('email');}else echo $prev->email; ?>">
                                    <div class="text-danger"><?php echo form_error('email');?></div>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-6 col-md-6">
                            <div class="form-group <?=(form_error('password') !='')?'error':'';?>">
                                <label>Password : <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="password" class="form-control form-control-line" placeholder="*****"  required data-validation-required-message="This field is required" name="password" >
                                    <div class="text-danger"><?php echo form_error('password');?></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            <div class="mb-3">
                <div class="text-xs-right">
                    <button type="submit" class="btn btn-info">Submit</button>
                    <a href="<?=$url;?>admin/admins" class="btn btn-inverse">Cancel</a>
                </div>
            </div>
            <?=form_close();?>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>
<script>
    var country = '<?php echo $this->input->post('country');?>';
    var state = '<?php echo $this->input->post('state');?>';
    var city = '<?php echo $this->input->post('city');?>';
</script>