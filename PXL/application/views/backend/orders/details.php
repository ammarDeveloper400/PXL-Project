<?php 
    $order = $this->db->query("SELECT * FROM orders WHERE id = ".$id)->result_object()[0];
    $user = $this->db->query("SELECT * FROM users WHERE id = ".$order->uID)->result_object()[0];
    $product = $this->db->where('id',$order->product_id)
                                ->get('products')
                                ->result_object()[0];
?>
<style type="text/css">
    .table {
        border: 1px solid #ccc;
    }
    .table th {
        width: 20%;
        background: #f0f0f0;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 12px;
    }
    .lesspad  th {
    }
    .lesspad  td {
        padding: 5px 20px;
        border: 1px solid #f0f0f0;
        font-size: 13px;
    }
</style>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        
    </div>
   
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <?=form_open_multipart('',array('class'=>'form-material','novalidate'=>""));?>
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Information -::- #PXL00<?php echo $order->id; ?></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                       
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Order #</th>
                                            <td> #PXL00<?php echo $order->id; ?> <?php echo $order->customize==1?"<span style='color:orange'><b>(Customize Offer)</b></span>":"";?></td>
                                        </tr>
                                        <tr>
                                            <th>User</th>
                                            <td> #<?php echo $user->id; ?> / <?php echo $user->full_name;?>  </td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Address</th>
                                            <td> <?php echo $order->address; ?>, <?php echo $order->street; ?> <?php echo $order->zipcode; ?> </td>
                                        </tr>

                                        <tr>
                                            <th>Product Name</th>
                                            <td><?php echo $product->title; ?></td>
                                        </tr>
                                       
                                        <tr>
                                            <th>Tax</th>
                                            <td> $<?php echo $order->tax; ?> </td>
                                        </tr>
                                    

                                        <?php if($order->discount != 0) {?>
                                        <tr>
                                            <th>Discount </th>
                                            <td style="color: red"> - $<?php echo $order->discount; ?> </td>
                                        </tr>
                                        <?php } ?>

                                        <tr>
                                            <th>Total </th>
                                            <td> 
                                                $<?php echo $order->price; ?> 
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Transaction # </th>
                                            <td> 
                                                <?php echo $order->transaction_id; ?> 
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Payment</th>
                                            <td> 
                                                <?php  if($order->payment_done == 1){?>
                                                    <span style="font-weight: bold; color: green;">Payment Done</span>
                                                <?php } else { ?>
                                                 <span class="btn btn-danger">PENDING</span>
                                                <?php } ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Order Date </th>
                                            <td> 
                                                <?php echo date("F, d Y", strtotime($order->created_at)); ?> 
                                            </td>
                                        </tr>


                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                <?php  if($order->status == 1){?>
                                                    <span style="color:orange">Order Received</span><br>
                                                    <a title="Click to complete this order" href="<?php echo $url.'admin/order-status/'.$order->id.'/2';?>">
                                                        <span class="btn btn-primary">Order Completed</span>
                                                    </a>
                                                <?php } if($order->status == 2){?>
                                                    <span class="btn btn-primary">Order Completed</span>
                                                <?php } if($order->status == 3){?>
                                                 <span class="btn btn-danger">Order Rejected</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>


                           
                </div>

                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="text-xs-right">
                    <a href="<?=$url;?>admin/orders" class="btn btn-info">Done</a>
                </div>
            </div>
            <?=form_close();?>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>