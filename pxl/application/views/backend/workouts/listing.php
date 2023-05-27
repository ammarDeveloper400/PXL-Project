<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Workouts Management</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo $url."admin";?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Workouts</li>
                </ol>
                <a href="<?php echo $url;?>admin/add-workout">
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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Workouts</h4>
                    
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Training</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Exercises</th>
                                    <th>Data & Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Training</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Exercises</th>
                                    <th>Data & Time</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php 
                            $workouts = $this->db->query("SELECT * FROM workouts ORDER BY id DESC");
                            foreach($workouts->result() as $category){ ?>
                            <tr>
                                <td>
                                    <?php echo $category->title_1;?>
                                    <br>
                                    <b>Equipment:</b> <?php echo $category->sub_head;?>
                                    <br>
                                    <b>Strenght:</b> <?php echo $category->strength;?>
                                    <br>
                                    <b>Time:</b> <?php echo $category->time;?> minutes
                                </td>
                                <td>
                                    <?php echo $category->category;?>
                                </td>
                                <td>
                                    <?php echo $category->title;?>
                                </td>
                                <td>
                                    <img height="40" src="<?php echo $url."resources/";?>uploads/workout/<?php echo $category->image!=""?$category->image:'dummy_image.png';?>">
                                </td>
                               
                            	<td>
                            		<?php if($category->status == 0){?>
                                        <a href="<?php echo $url.'admin/workout-status/'.$category->id.'/'.$category->status;?>" ><span class="btn btn-danger">Inactive</span></a>
                            		<?php }else{?>
                                        <a href="<?php echo $url.'admin/workout-status/'.$category->id.'/'.$category->status;?>" ><span class="btn btn-success">Active</span></a>
                            		<?php } ?>
                            	</td>

                                <td>
                                    <a href="<?php echo $url.'admin/workout/exercise/'.$category->id;?>" ><span class="btn btn-primary">+ Exercise</span></a>

                                    (<?php echo $this->db->query("SELECT * FROM workout_exercises WHERE wID = ".$category->id)->num_rows();?>)
                                </td>

                            	<td >
                            		<?php echo date('d M, Y',strtotime($category->created_at));?>
                            	</td>
                                <td>
                                    <a href="<?php echo $url."admin/";?>edit-workout/<?php echo $category->id;?>"><div class="btn btn-info btn-circle"><i class="mdi mdi-pencil"></i></div></a>
                                    <a class="deleted" href="javascript:void(0);" data-url="<?php echo $url;?>admin/delete-workout/<?php echo $category->id;?>"><div class="btn btn-info btn-circle"><i class="mdi mdi-delete"></i></div></a>
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