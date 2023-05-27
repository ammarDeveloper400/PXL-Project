<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Coaches Management</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo $url."admin";?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Coaches</li>
                </ol>
                <a href="<?php echo $url;?>admin/add-coach">
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
                    <h4 class="card-title">Coaches</h4>
                    
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php 
                                foreach($stores->result() as $store){
                                    
                            ?>  
                            <tr>
                                <td>
                                    <?php echo $store->full_name;?> 
                                </td>
                                
                                <td>
                                    <?php echo $store->email;?>
                                </td>
                                <td>
                                    <?php echo $store->phone;?>
                                </td>
                               
                            	<td>
                            		<?php if($store->status == 0){?>
                                       <span style="cursor: not-allowed; color: red; font-weight: bold;">Inactive</span>
                                       
                                    <?php }else{?>
                                        <span class="btn btn-success">Active</span>
                                    <?php } ?>
                            	</td>
                                <td>
                                    <!-- <a title="View Coaches details" href="<?php echo $url."admin/";?>coach/view-details/<?php echo $store->id;?>"><div class="btn btn-info btn-circle"><i class="mdi mdi-television"></i></div></a> -->
                                    <a title="Edit Coach Info" href="<?php echo $url;?>admin/edit-coach/<?php echo $store->id;?>"><div class="btn btn-info btn-circle"><i class="mdi mdi-pencil"></i></div></a>
                                    <a title="Delete Coach" class="deleted" href="javascript:void(0);" data-url="<?php echo $url;?>admin/delete-coach/<?php echo $store->id;?>"><div class="btn btn-info btn-circle"><i class="mdi mdi-delete"></i></div></a>
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
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
