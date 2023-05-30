<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Coupon Code Management</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url."admin";?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url."admin/promo";?>">Coupon Code</a></li>
                <li class="breadcrumb-item active">Edit Coupon Code</li>
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
            <?=form_open_multipart('',array('class'=>'myForm','novalidate'=>""));?>
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Update Coupon Code
                    </h4>
                </div>
                <div class="card-body lang_bodieslisting">

                    <?php $input = "title"; ?>
                    <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                        <label>Promo Code <span class="text-danger">*</span></label>
                        <div class="controls">
                            <input type="text" name="<?php echo $input; ?>" class="form-control form-control-line" placeholder="Promo Code" value="<?php if(set_value($input) != ''){ echo set_value($input);} else echo $data->coupoun; ?>" >
                            <div class="text-danger"><?php echo form_error($input);?></div>
                        </div>
                    </div>

                    
                    <?php $input = "discount"; ?>
                    <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                        <label>Discount <span class="text-danger">*</span></label>
                        <div class="controls">
                            <input type="number" step="0.01" min="0" required name="<?php echo $input; ?>" class="form-control form-control-line" placeholder="Discount" value="<?php if(set_value($input) != ''){ echo set_value($input);} else echo $data->disocunt; ?>">
                            <div class="text-danger"><?php echo form_error($input);?></div>
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

