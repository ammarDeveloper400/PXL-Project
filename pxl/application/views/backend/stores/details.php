<?php 
    $provider = $this->db->query("SELECT * FROM stores WHERE id = ".$uid)->result_object()[0];
    $user = $this->db->query("SELECT * FROM users WHERE id = ".$provider->uID)->result_object()[0];
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
                    <h4 class="m-b-0 text-white">Information -::- <?php echo $provider->business_name; ?> (Service provider)</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-lg-9 col-md-9 col-sm-6">
                            <h4 class="box-title m-t-40">About Me</h4>
                            <p><?php echo $provider->about_self; ?></p>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Business Name</th>
                                            <td> <?php echo $provider->business_name; ?> </td>
                                        </tr>
                                         <tr>
                                            <th>Associate (with user)</th>
                                            <td> #<?php echo $user->id; ?> / <?php echo $user->first_name;?> <?php echo $user->last_name;?> </td>
                                        </tr>
                                        <tr>
                                            <th>Email Address</th>
                                            <td> <?php echo $user->email; ?> </td>
                                        </tr>
                                        <tr>
                                            <th>Phone #</th>
                                            <td> <?php echo $user->mobile; ?> <?php echo $user->verified == 1?'<i title="Mobile Number Approved" class="fa fa-check-circle" style="color:green"></i>':'';?> </td>
                                        </tr>
                                        <tr>
                                            <th>Category</th>
                                            <td> <?php
                                            echo $this->db->where('id',$provider->cID)->get('categories')->result_object()[0]->title;
                                             ?> </td>
                                        </tr>
                                        <tr>
                                            <th>Price (Per Hour)</th>
                                            <td> $<?php echo $provider->price_hour; ?> </td>
                                        </tr>
                                        <tr>
                                            <th>Price (Per Dat)</th>
                                            <td> $<?php echo $provider->price_day; ?> </td>
                                        </tr>

                                        <tr>
                                            <th>Promo Offer </th>
                                            <td>
                                                <?php if($provider->promo_code=="")
                                                {
                                                    echo "N/A";
                                                } else {
                                                    echo "On ".$provider->promo_purchase." purchases";
                                                } 
                                                ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Registration Date</th>
                                            <td>
                                                <?php echo date("F, d Y",strtotime($provider->registration_date)); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Gender</th>
                                            <td><?php echo $provider->gender; ?></td>
                                        </tr>

                                        <tr>
                                            <th>French Level</th>
                                            <td><?php echo $provider->french_level; ?></td>
                                        </tr>
                                        <tr>
                                            <th>English Level</th>
                                            <td><?php echo $provider->english_level; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                <?php if($provider->status == 0){?>
                                                   <span style="cursor: not-allowed; color: red; font-weight: bold;">Inactive</span>
                                                   <br>
                                                   <a title="Click here to approve this service providers" href="<?php echo $url.'admin/providers-status/'.$provider->id.'/0';?>" >
                                                        <button type="button" class="btn btn-primary d-lg-block"><i class="fa fa-check"></i> Approve Account </button>
                                                    </a>
                                                <?php }else{?>
                                                    <span class="btn btn-success">Account Approved</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>

                    <h4>Service Provider Documents </h4>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered compact " cellspacing="0" style="width: 100%" width="100%">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Document</th>
                                    <th>Status</th>
                                    <th>Submitted Date</th>
                                    <th>Accept/Reject Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $documents = $this->db->query("SELECT * FROM user_documents WHERE uID = ".$uid." AND user_type = 2")->result_object();
                                foreach($documents as $user){
                            ?>
                            <tr>
                                <td>
                                    <?php echo strtoupper(str_replace("_"," ",$user->doc_type));?>
                                </td>
                                <td>
                                    <img height="40" src="<?php echo base_url();?>resources/uploads/media/<?php echo $user->doc_media;?>"> <a title="View Image" href="<?php echo base_url();?>resources/uploads/media/<?php echo $user->doc_media;?>" target="_blank"><div class="btn btn-info btn-circle"><i class="mdi mdi-eye"></i></div></a>
                                </td>
                                <td>
                                    <?php if($user->status == 0){?>
                                       <span class="btn btn-primary" style="cursor: not-allowed;">Pending</span>
                                    <?php } else if($user->status == 1){?>
                                        <span class="btn btn-success">Approved</span>
                                    <?php } else if($user->status == 2) { ?>
                                        <span class="btn btn-danger" style="cursor: not-allowed;">Rejected</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php echo date('d M, Y',strtotime($user->submitted_at));?>
                                </td>
                                <td >
                                    <?php 
                                        if($user->status==2){
                                    ?>
                                        <span style="color:#f00;">
                                            <b>Reject Reason</b><br>
                                            <?php echo $user->reason;?> <br>- <?php  echo $user->accepted_at!=""?date('d M, Y',strtotime($user->accepted_at)):""; ?>
                                        </span>
                                    <?php
                                        } else {
                                            echo $user->accepted_at!=""?date('d M, Y',strtotime($user->accepted_at)):"";
                                        }
                                    ?>
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


            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Reviews (Service provider)</h4>
                </div>
                <div class="card-body">
                    
                    <div class="m-t-40">
                        <table id="example23" class="display wrap table table-hover table-striped table-bordered compact " cellspacing="0" style="width: 100%" width="100%">
                            <thead>
                                <tr>
                                    <th  width="150px">Review By</th>
                                    <th  width="150px">Rating</th>
                                    <th width="150px">Review</th>
                                    <th  width="150px">Submitted Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $reviews = $this->db->query("SELECT * FROM reviews WHERE service_id = ".$uid."")->result_object();
                                foreach($reviews as $user){

                                    $user_review = $this->db->query("SELECT * FROM users WHERE id = ".$user->user_id)->result_object()[0];
                            ?>
                            <tr>
                                <td  width="150px">
                                    <?php echo $user_review->first_name." ".$user_review->last_name;?>
                                </td>
                                <td  width="150px">
                                    <?php $total = 5;
                                          $rate = $user->rating;
                                          $remaining = $total - $rate;
                                    ?>

                                    <?php for($i=1;$i<=$rate;$i++){?>
                                        <i class="fa fa-star" style="color:gold"></i>
                                    <?php } ?>
                                    <?php for($j=1;$j<=$remaining;$j++){?>
                                        <i class="fa fa-star"></i>
                                    <?php } ?>
                                </td>
                                <td  width="150px">
                                    <?php echo $user->review;?>
                                </td>
                                <td  width="150px">
                                    <?php echo date('d M, Y',strtotime($user->created_at));?>
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

            <div class="mb-3">
                <div class="text-xs-right">
                    <a href="<?=$url;?>admin/service/providers" class="btn btn-info">Done</a>
                </div>
            </div>
            <?=form_close();?>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>