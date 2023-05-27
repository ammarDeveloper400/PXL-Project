<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Exercise Management</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url."admin";?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url."admin/workouts";?>">Workouts</a></li>
                <li class="breadcrumb-item active">Edit Exercise</li>
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
                    <div class="col-md-12">
                        <?php $input = "title"; ?>
                        <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                            <label>Title <span class="text-danger">*</span></label>
                            <div class="controls">
                                <input type="text" required name="<?php echo $input; ?>" class="form-control form-control-line" placeholder="Exercise Name" value="<?php if(set_value($input) != ''){ echo set_value($input);} else {echo $data->title;} ?>">
                                <div class="text-danger"><?php echo form_error($input);?></div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-md-6">
                            <?php $input = "time"; ?>
                            <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                                <label>Exercise Time (In Minutes)<span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="number" min="0" max="60" required name="<?php echo $input; ?>" class="form-control form-control-line" placeholder="Exercise Time" value="<?php if(set_value($input) != ''){ echo set_value($input);} else {echo $data->time;} ?>">
                                    <div class="text-danger"><?php echo form_error($input);?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php $input = "intensity"; ?>
                            <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                                <label>Intensity <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="text" required name="<?php echo $input; ?>" class="form-control form-control-line" placeholder="Exercise Intensity" value="<?php if(set_value($input) != ''){ echo set_value($input);} else {echo $data->intensity;} ?>">
                                    <div class="text-danger"><?php echo form_error($input);?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <?php $input = "calories"; ?>
                            <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                                <label>Calories (Kcal)<span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="number" min="0" step="0.01" required name="<?php echo $input; ?>" class="form-control form-control-line" placeholder="Calories burn out with this exercise" value="<?php if(set_value($input) != ''){ echo set_value($input);} else {echo $data->calories;} ?>">
                                    <div class="text-danger"><?php echo form_error($input);?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php $input = "equipments"; ?>
                            <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                                <label>Equipments <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="text" required name="<?php echo $input; ?>" class="form-control form-control-line" placeholder="Equipments" value="<?php if(set_value($input) != ''){ echo set_value($input);} else {echo $data->equipments;} ?>">
                                    <div class="text-danger"><?php echo form_error($input);?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <?php $input = "description"; ?>
                            <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                                <label>Exercise Description <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <textarea name="<?php echo $input; ?>" rows="5" class="form-control form-control-line" required><?php if(set_value($input) != ''){ echo set_value($input);} else {echo strip_tags($data->description);} ?></textarea>
                                    <div class="text-danger"><?php echo form_error($input);?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php $input = "technique_description"; ?>
                            <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                                <label>Exercise Technique <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <textarea name="<?php echo $input; ?>" rows="5" class="form-control form-control-line" required><?php if(set_value($input) != ''){ echo set_value($input);} else {echo strip_tags($data->technique_description);} ?></textarea>
                                    <div class="text-danger"><?php echo form_error($input);?></div>
                                    <div class="text-danger"><?php echo form_error($input);?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <?php $input = "image"; ?>
                            <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                                <div class="col-lg-12 col-md-12 nopad">
                                    <div class="card">
                                        <div class="">
                                            <label>Image</label>
                                            <input type="file" id="input-file-disable-remove" class="dropify" data-show-remove="false" name="<?php echo $input; ?>" data-default-file="<?php echo base_url();?>resources/uploads/workout/<?php echo $data->image;?>" />
                                            <div class="text-danger"><?php echo form_error($input);?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <?php $input = "video"; ?>
                            <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                                <div class="col-lg-12 col-md-12 nopad">
                                    <div class="card">
                                        <div class="">
                                            <label>Exercise Video</label>
                                            <input type="file" data-allowed-file-extensions="mp4 flv" id="input-file-disable-remove" class="dropify" data-show-remove="false" name="<?php echo $input; ?>" data-default-file="<?php echo base_url();?>resources/uploads/workout/<?php echo $data->video;?>" />
                                            <div class="text-danger"><?php echo form_error($input);?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="<?php echo "row_id"; ?>" value="<?php echo $data->id; ?>">

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




