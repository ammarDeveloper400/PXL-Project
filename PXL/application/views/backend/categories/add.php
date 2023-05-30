<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Affiliates Management</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url."admin";?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url."admin/affiliates";?>">Affiliates</a></li>
                <li class="breadcrumb-item active">Add New Affiliate</li>
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
            <?=form_open_multipart('',array('class'=>'myForm'));?>
            <div class="card">
                
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Information
                    </h4>
                </div>
                <div class="card-body lang_bodieslisting ">

                    <?php $input = "title"; ?>
                    <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                        <label>Title <span class="text-danger">*</span></label>
                        <div class="controls">
                            <input type="text" required name="<?php echo $input; ?>" class="form-control form-control-line" placeholder="Title" value="<?php if(set_value($input) != ''){ echo set_value($input);} ?>">
                            <div class="text-danger"><?php echo form_error($input);?></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <?php $input = "link"; ?>
                            <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                                <label>URL <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="url" required name="<?php echo $input; ?>" class="form-control form-control-line" placeholder="URL" value="<?php if(set_value($input) != ''){ echo set_value($input);} ?>">
                                    <div class="text-danger"><?php echo form_error($input);?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php $input = "type"; ?>
                            <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                                <label>Type <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <select name="<?php echo $input; ?>" required class="form-control form-control-line">
                                        <option value="">--Select Type--</option>
                                        <option value="1">Events</option>
                                        <option value="2">Affiliate</option>
                                    </select>
                                    <div class="text-danger"><?php echo form_error($input);?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $input = "description"; ?>
                    <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                        <label>Description <span class="text-danger">*</span></label>
                        <div class="controls">
                            <textarea rows="5" name="<?php echo $input; ?>" class="form-control form-control-line" required></textarea>
                            <div class="text-danger"><?php echo form_error($input);?></div>
                        </div>
                    </div>
                  
                    <?php $input = "image"; ?>
                    <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                        <div class="col-lg-12 col-md-12 nopad">
                            <div class="card">
                                <div class="">
                                    <label>Image</label>
                                    <input type="file" id="input-file-disable-remove" class="dropify" data-show-remove="false" name="<?php echo $input; ?>" data-default-file="" />
                                    <div class="text-danger"><?php echo form_error($input);?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>

            </div>
            <div class="mb-3">
                <div class="text-xs-right">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </div>
            <?=form_close();?>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>
