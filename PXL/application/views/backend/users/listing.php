<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Athletes Management</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo $url."admin";?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Athletes</li>
                </ol>
                <a href="<?php echo $url;?>admin/add-user">
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
                    <h4 class="card-title">Athletes</h4>
                    
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered compact " cellspacing="0" style="width: 100%" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Data & Time</th>
                                    <th>Orders</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Data & Time</th>
                                    <th>Orders</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php 

                            $users = $this->db->query("SELECT * FROM users WHERE user_type = 1 ORDER BY id DESC");
                                foreach($users->result() as $user){
                            ?>
                            <tr>
                                <td>
                                    #<?php echo $user->id;?>
                                </td>
                                <td>
                                    <?php echo $user->full_name;?>
                                </td>
                                <td>
                                    <?php echo $user->email;?>
                                </td>
                                <td>
                                    <?php echo $user->phone;?>
                                </td>
                                <td>
                                    <?php echo $user->username;?>
                                </td>
                                <td>
                                    <?php if($user->status == 0){?>
                                       <span style="cursor: not-allowed; color: red; font-weight: bold;">Profile Not setup</span>
                                      <!--  <br>
                                       <a href="<?php echo $url.'admin/user-status/'.$user->id.'/0';?>" >
                                            <button type="button" class="btn btn-primary d-lg-block">Active </button>
                                        </a> -->
                                    <?php }else{?>
                                        <span class="btn btn-success">Active</span>
                                    <?php } ?>
                                </td>
                                
                                <td >
                                    <?php echo date('d M, Y',strtotime($user->created_at));?>
                                </td>
                                <td>
                                    <a title="Orders" href="<?php echo $url."admin/orders?user_id=".$user->id;?>">
                                        <div class="btn btn-sm btn-primary"><i class="fa fa-tv"></i></div> 
                                    </a>
                                    <?php
                                        echo $count = $this->db->where("uID",$user->id)->count_all_results("orders");
                                     ?>
                                </td>
                                <td>
                                     <a title="View Details" href="<?php echo $url;?>admin/user-detail/<?php echo $user->id;?>"><div class="btn btn-info btn-circle"><i class="fa fa-tv"></i></div></a>
                                    <a title="Edit User Info" href="<?php echo $url;?>admin/edit-user/<?php echo $user->id;?>"><div class="btn btn-info btn-circle"><i class="mdi mdi-pencil"></i></div></a>
                                    <a title="Delete User" class="deleted" href="javascript:void(0);" data-url="<?php echo $url;?>admin/delete-user/<?php echo $user->id;?>"><div class="btn btn-info btn-circle"><i class="mdi mdi-delete"></i></div></a>
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