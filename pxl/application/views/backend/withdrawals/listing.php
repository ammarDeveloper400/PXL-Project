<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Withdrawals Management</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo $url."admin";?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Withdrawals</li>
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
                    <h4 class="card-title">Withdrawals</h4>
                    
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Service Provider</th>
                                    <th>Amount</th>
                                    <th>Info</th>
                                    <th>Status</th>
                                    <th>Data & Time</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Service Provider</th>
                                    <th>Amount</th>
                                    <th>Info</th>
                                    <th>Status</th>
                                    <th>Data & Time</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php 
                           $withdrawals = $this->db->query("SELECT * FROM withdrawal")->result_object();
                            foreach($withdrawals as $withdraw){
                                $user = $this->db->where('id',$withdraw->uID)
                                ->get('users')
                                ->result_object()[0];

                                $bank_info = $this->db->query("SELECT * FROM user_bank WHERE uID = '".$withdraw->uID."'")->result_object()[0];
                            ?>
                            <tr>
                                <td>
                                    <?php echo $user->full_name;?>
                                </td>
                                <td>
                                    $<?php echo $withdraw->amount;?>
                                </td>
                                <td>
                                    <?php if(empty($bank_info)){?>
                                        <span style="color:red">No Info found</span>
                                    <?php } else {?>
                                        <span><b>Bank Name:</b> <?php echo $bank_info->bank_name;?></span><br>
                                        <span><b>Account Title:</b> <?php echo $bank_info->account_name;?></span><br>
                                        <span><b>IBAN Number:</b> <?php echo $bank_info->account_number;?></span><br>
                                    <?php } ?>
                                </td>
                               
                            	<td>
                            		<?php if($withdraw->status == 0){?>
                                        <a title="Click to Complete this request" href="<?php echo $url.'admin/withdrawals-status/'.$withdraw->id.'/'.$withdraw->status;?>" ><span class="btn btn-danger">Pending</span></a>
                            		<?php }else{?>
                                        <a href="javascript:;" style="cursor: not-allowed;" ><span class="btn btn-success">Completed</span></a>
                            		<?php } ?>
                            	</td>

                            	<td >
                            		<?php echo date('d M, Y, h:i A',strtotime($withdraw->created_at));?>
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