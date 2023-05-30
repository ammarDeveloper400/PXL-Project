<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Orders Management</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo $url."admin";?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Orders</li>
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
                    <h4 class="card-title">Orders</h4>

                    <div class="col-12">
                        <div class="right " style="float: right;">
                            <form>
                                <div style="flex-direction: row;">
                                    
                                    <label style="margin-left: 10px;">From Date</label>
                                    <input type="text" class="publish2 required" name="start_date" 
                                    value="<?php echo $_GET["start_date"]; ?>" 
                                    />

                                    <label style="margin-left: 10px;">To Date</label>
                                    <input type="text" class="publish2 required" name="to_date" 
                                    value="<?php echo $_GET["to_date"]; ?>" 
                                    />

                                    <?php if($_GET["start_date"]!=""){ ?>
                                        <a href="<?php echo current_url(); ?>">
                                            <button type="button" class="btn btn-danger btn-sm">
                                                Clear Filter
                                            </button>
                                        </a>
                                    <?php } ?>

                                    <button class="btn btn-sm btn-primary">Filter</button>

                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Service Provider</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Data & Time</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Service Provider</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Data & Time</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach($orders->result() as $order){

                                $product = $this->db->where('id',$order->product_id)
                                ->get('products')
                                ->result_object()[0];

                                $store = $this->db->query("SELECT * FROM stores WHERE id = ".$order->vendor_id)->result_object()[0];

                                $categories = $this->db->where('id',$store->cID)
                                ->get('categories')
                                ->result_object()[0];

                                $customer = $this->db->where('id',$order->user_id)
                                ->get('users')
                                ->result_object()[0];

                            ?>
                            <tr>
                                <td>
                                    #00H<?php echo $order->id;?>
                                </td>

                                <td>
                                    <?php echo ('#'.$customer->id.', ' .$customer->first_name." ".$customer->last_name);?>
                                    <?php echo $order->address_text!=""?'<br><b>Address:</b>'.$order->address_text:""; ?>
                                </td>
                                <td>
                                    <?php
                                        
                                        if(!empty($store)){
                                            echo $store->business_name;
                                            echo "(".$categories->title.")";
                                        }
                                    ?>
                                </td>
                               
                                <td> 
                                    <?php if($order->status == 0){
                                        echo "<span style='font-size:12px'>Waiting for Offer <br> from service provider</span>";
                                    } else if($order->status != 0) { ?>
                                        $<?php echo $order->total; ?>
                                    <?php } ?>
                                   
                                </td>
                               
                            	<td>
                                   <?php  if($order->status == 0){?>
                                    <?php } 
                                    if($order->status == 1){?>
                                        <span class="btn btn-secondary" style="color:orange">Offer Sent</span>
                                    <?php } if($order->status == 2){?>
                                        <span class="btn btn-primary">Offer Accepted</span>
                                    <?php } if($order->status == 3){?>
                                     <span class="btn btn-success">Order Completed</span>
                                    <?php }if($order->status == 4){?>
                                     <span class="btn btn-danger">Offer Rejected</span>
                                    <?php }if($order->status == 9){?>
                                     <span class="btn btn-danger">Offer Rejected by user</span>
                                    <?php } if($order->status == 7){?>
                                      <span class="btn btn-danger">Order Cancelled</span>
                                    <span style="color:red;">
                                    <?php if($order->cancelled_by=="USER") echo "By User, Reason: " .$order->reason; ?>
                                    </span>
                                    <?php } ?>
                            	</td>
                            	<td >
                            		<?php echo date('d M, Y, h:i A',strtotime($order->created_at));?>
                            	</td>
                                <td >
                                    <?php if($order->chat ==1){?>
                                        <a href="<?php echo $url.'admin/orders/conversation/'.$order->id;?>" ><span class="btn btn-success">View Chat</span></a>
                                    <?php } ?>
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