<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Workouts Management</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url."admin";?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url."admin/workouts";?>">Workouts</a></li>
                <li class="breadcrumb-item active">Add New Workout</li>
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

                <div class="row">
                    <div class="col-md-6">
                        <?php $input = "title"; ?>
                        <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                            <label>Title <span class="text-danger">*</span></label>
                            <div class="controls">
                                <input type="text" required name="<?php echo $input; ?>" class="form-control form-control-line" placeholder="Title" value="<?php if(set_value($input) != ''){ echo set_value($input);} ?>">
                                <div class="text-danger"><?php echo form_error($input);?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?php $input = "category"; ?>
                        <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                            <label>Category <span class="text-danger">*</span></label>
                            <div class="controls">
                                <?php $array_cat = array("Speed","Power","Agility","Endurance"); ?>
                                <select name="<?php echo $input; ?>" required class="form-control form-control-line">
                                    <option value="">--Select Category--</option>
                                    <?php foreach ($array_cat as $key => $cat) { ?>
                                        <option value="<?php echo $cat; ?>"><?php echo $cat; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="text-danger"><?php echo form_error($input);?></div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-md-6">
                            <?php $input = "title_1"; ?>
                            <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                                <label>Training <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="text" required name="<?php echo $input; ?>" class="form-control form-control-line" placeholder="Training" value="<?php if(set_value($input) != ''){ echo set_value($input);} ?>">
                                    <div class="text-danger"><?php echo form_error($input);?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php $input = "sub_head"; ?>
                            <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                                <label>Equipment <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="text" required name="<?php echo $input; ?>" class="form-control form-control-line" placeholder="Equipment" value="<?php if(set_value($input) != ''){ echo set_value($input);} ?>">
                                    <div class="text-danger"><?php echo form_error($input);?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <?php $input = "strength"; ?>
                            <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                                <label>Strength <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="text" required name="<?php echo $input; ?>" class="form-control form-control-line" placeholder="Strength" value="<?php if(set_value($input) != ''){ echo set_value($input);} ?>">
                                    <div class="text-danger"><?php echo form_error($input);?></div>
                                </div>
                            </div>
                        </div>
                        <?php /* ?>
                        <div class="col-md-6">
                            <?php $input = "time"; ?>
                            <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                                <label>Time <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="number" min="0" max="60" required name="<?php echo $input; ?>" class="form-control form-control-line" placeholder="Time" value="<?php if(set_value($input) != ''){ echo set_value($input);} ?>">
                                    <div class="text-danger"><?php echo form_error($input);?></div>
                                </div>
                            </div>
                        </div>
                        <?php */ ?>
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
