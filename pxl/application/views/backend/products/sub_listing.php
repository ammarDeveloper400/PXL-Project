<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Subscription Management</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo $url."admin";?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Subscription</li>
                </ol>
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
                    <h4 class="card-title">Subscriptions Plans</h4>
                    
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach($products->result() as $category){ 
                                $plans = $this->db->query("SELECT * FROM packages_list WHERE pID = ".$category->id)->result_object();
                            ?>
                            <tr>
                                <td>
                                    <?php echo $category->title;?>
                                </td>
                               
                                 <td>
                                    $<?php echo $category->price;?>
                                </td>
                                <td>
                                    <ul>
                                    <?php 
                                        foreach($plans as $row){
                                    ?>
                                        <li><?php echo $row->title;?></li>
                                    <?php 
                                        }
                                    ?>
                                    </ul>
                                </td>
                            	<!-- <td>
                            		<?php if($category->status == 0){?>
                                        <a href="<?php echo $url.'admin/admins/subscription_status/'.$category->id.'/'.$category->status;?>" ><span class="btn btn-danger">Inactive</span></a>
                            		<?php }else{?>
                                        <a href="<?php echo $url.'admin/admins/subscription_status/'.$category->id.'/'.$category->status;?>" ><span class="btn btn-success">Active</span></a>
                            		<?php } ?>
                            	</td> -->

                                <td>
                                    <a href="<?php echo $url."admin/admins/";?>edit_subscription/<?php echo $category->id;?>"><div class="btn btn-info btn-circle"><i class="mdi mdi-pencil"></i></div></a>
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