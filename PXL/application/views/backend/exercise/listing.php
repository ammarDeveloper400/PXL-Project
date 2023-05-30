<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Exercises Workout Management</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo $url."admin";?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Exercises Workout</li>
                </ol>
                <a href="<?php echo $url;?>admin/add-exercise/<?php echo $id;?>">
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
                </a>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->

    <?php $work = $this->db->query("SELECT * FROM workouts WHERE id = ".$id)->result_object()[0]; ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Exercises Workout -::- <?php echo $work->title_1;?></h4>
                    
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Workout Name</th>
                                    <th>Time</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Data & Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Workout Name</th>
                                    <th>Time</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Data & Time</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php 
                            $workouts = $this->db->query("SELECT * FROM workout_exercises WHERE wID = ".$id." ORDER BY id ASC");
                            foreach($workouts->result() as $category){ ?>
                            <tr>
                                <td>
                                    <?php echo $category->title;?>
                                    
                                </td>
                                <td>
                                    <?php echo $work->title_1;?>
                                </td>
                                <td>
                                    <?php echo round($category->time,0);?> Minutes
                                </td>
                                <td>
                                    <img height="40" src="<?php echo $url."resources/";?>uploads/workout/<?php echo $category->image!=""?$category->image:'dummy_image.png';?>">
                                </td>
                               
                            	<td>
                            		<?php if($category->status == 0){?>
                                        <a href="<?php echo $url.'admin/exercise-status/'.$category->id.'/'.$category->status;?>" ><span class="btn btn-danger">Inactive</span></a>
                            		<?php }else{?>
                                        <a href="<?php echo $url.'admin/exercise-status/'.$category->id.'/'.$category->status;?>" ><span class="btn btn-success">Active</span></a>
                            		<?php } ?>
                            	</td>

                            	<td >
                            		<?php echo date('d M, Y',strtotime($category->created_at));?>
                            	</td>
                                <td>
                                    <a href="<?php echo $url."admin/";?>edit-exercise/<?php echo $category->id;?>/<?php echo $id;?>"><div class="btn btn-info btn-circle"><i class="mdi mdi-pencil"></i></div></a>
                                    <a class="deleted" href="javascript:void(0);" data-url="<?php echo $url;?>admin/delete-exercise/<?php echo $category->id;?>"><div class="btn btn-info btn-circle"><i class="mdi mdi-delete"></i></div></a>
                                </td>
                            </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
</div>