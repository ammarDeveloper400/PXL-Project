<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Sports Management</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url."admin";?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url."admin/categories";?>">Sports</a></li>
                <li class="breadcrumb-item active">Add New Sport</li>
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
                    <h4 class="m-b-0 text-white">Sports
                    </h4>
                </div>
                <div class="card-body lang_bodieslisting">
                    <?php $input = "title"; ?>
                    <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                        <label>Title <span class="text-danger">*</span></label>
                        <div class="controls">
                            <input type="text" required name="<?php echo $input; ?>" class="form-control form-control-line" placeholder="Sport Name" value="<?php if(set_value($input) != ''){ echo set_value($input);} ?>">
                            <div class="text-danger"><?php echo form_error($input);?></div>
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
