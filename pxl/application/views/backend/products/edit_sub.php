<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Subscription Management</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url."admin";?>">Dashboard</a></li>
                <li class="breadcrumb-item">Subscription</li>
                <li class="breadcrumb-item active">Edit Subscription</li>
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
                <div class="card-body lang_bodieslisting">

                <div class="row">
                    <div class="col-md-6">
                        <?php $input = "title"; ?>
                        <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                            <label>Title <span class="text-danger">*</span></label>
                            <div class="controls">
                                <input type="text" required name="<?php echo $input; ?>" class="form-control form-control-line" placeholder="Title" value="<?php if(set_value($input) != ''){ echo set_value($input);} else{ echo $data->title; } ?>">
                                <div class="text-danger"><?php echo form_error($input);?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?php $input = "price"; ?>
                        <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                            <label>Price <span class="text-danger">*</span></label>
                            <div class="controls">
                                <input type="number" step="0.01" min="0" required name="<?php echo $input; ?>" class="form-control form-control-line" value="<?php if(set_value($input) != ''){ echo set_value($input);} else{ echo $data->price; } ?>">
                                <div class="text-danger"><?php echo form_error($input);?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php 
                    $plans = $this->db->query("SELECT * FROM packages_list WHERE pID = ".$data->id)->result_object();
                ?>

                    <?php $input = "description"; ?>
                    <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                        <label>Plans Description <span class="text-danger">*</span></label>
                        <div class="controls">
                            <?php foreach ($plans as $key => $row) { ?>
                            <input type="text" required name="<?php echo $input; ?>[]" class="form-control form-control-line" value="<?php echo $row->title; ?>" style="margin-bottom: 5px;">
                            <?php } ?>
                        </div>
                    </div>
                  
                   
                </div>
                <input type="hidden" name="<?php echo "row_id"; ?>" value="<?php echo $data->id; ?>">
            </div>
            <div class="mb-3">
                <div class="text-xs-right">
                    <button type="submit" class="btn btn-info">Submit</button>
                    <a href="<?=$url;?>admin/categories" class="btn btn-inverse">Cancel</a>
                </div>
            </div>
            <?=form_close();?>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>

