
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
            <h3 class="text-themecolor m-b-0 m-t-0">Pages Management</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=$url;?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?=$url;?>admin/pages">Pages</a></li>
                <li class="breadcrumb-item active">Edit Page</li>
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
            <div class="card ">
                <?php
                 $sub_ids = "listing";
                    require ("./application/views/backend/common/lang_select.php");
                ?>
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Edit Page</h4>
                </div>
                <?php foreach($languages as $language){
                    $data = $this->page->get_page_by_lang($language->id,$the_id);
                 ?>
                <div class="card-body lang_bodieslisting" id="lang-<?php echo $language->id; ?>listing"
                    style="display: <?php echo $language->id==$active?"":"none"; ?>;"
                    >
                    <?php $input = $language->slug."[title]"; ?>
                    <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                        <label>Title <span class="text-danger">*</span></label>
                        <div class="controls">
                            <input type="text" name="<?php echo $input; ?>" class="form-control form-control-line" placeholder="Title" value="<?php if(set_value($input) != ''){ echo set_value($input);} else echo $data->title; ?>" >
                            <div class="text-danger"><?php echo form_error($input);?></div>
                        </div>
                    </div>

                    <?php $input = $language->slug."[descriptions]"; ?>

                    <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                        <label>Content </label>
                        <div class="controls">
                            <textarea class="mymce form-control form-control-line" id="mymce" name="<?php echo $input; ?>" ><?php echo $data->descriptions; ?></textarea>
                            <div class="text-danger"><?php echo form_error($input);?></div>
                        </div>
                    </div>
                    <?php $input = $language->slug."_image"; ?>

                     <input type="hidden" name="<?php echo $language->slug."[row_id]"; ?>" value="<?php echo $data->id; ?>">

                </div>
                <?php } ?>
            </div>
            <div class="mb-3">
                <div class="text-xs-right">
                    <button type="submit" class="btn btn-info">Submit</button>
                    <a href="<?=$url;?>admin/pages" class="btn btn-inverse">Cancel</a>
                </div>
            </div>
            <?=form_close();?>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>