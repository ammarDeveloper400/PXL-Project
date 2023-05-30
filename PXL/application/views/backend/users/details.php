<?php 
    $user = $this->db->query("SELECT * FROM users WHERE id = ".$id)->result_object()[0];
    $sport = $this->db->query("SELECT * FROM sports WHERE id = '".$user->current_sport."'")->result_object()[0];
    if($user->country != null){
        $country = $this->db->query("SELECT * FROM countries WHERE id = ".$user->country)->result_object()[0];
    }
    if($user->package_id != null){
        $packages = $this->db->query("SELECT * FROM packages WHERE id = ".$user->package_id)->result_object()[0];
    }
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
                    <h4 class="m-b-0 text-white">Information -::- <?php echo $user->full_name; ?></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                       
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Name</th>
                                            <td> <?php echo $user->full_name; ?></td>

                                             <th>Username</th>
                                            <td> <?php echo $user->username!=null?$user->username:"<small>Not Set</small>"; ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Current Plan</th>
                                            <td> 
                                                <?php if(!empty($packages)){ ?>
                                                    <?php echo $packages->title; ?> Plan
                                                    <?php if($user->subscription_expiry != null){?>
                                                        <br>
                                                        <b>Subscription Ends:</b> <?php echo date("F, d Y", strtotime($user->subscription_expiry)); ?>
                                                    <?php } ?>
                                                <?php } ?>
                                            </td>
                                             <th>Age</th>
                                            <td> <?php echo $user->dob; ?></td>
                                           
                                        </tr>
                                        
                                        
                                        <tr>
                                            <th>Sport</th>
                                            <td> <?php echo $sport->title; ?></td>
                                            <th>Address</th>
                                            <td><?php echo $user->address; ?></td>
                                        </tr>
                                       
                                        <tr>
                                            <th>Phone Number</th>
                                            <td><?php echo $user->phone; ?> </td>
                                            <th>Country </th>
                                            <td><?php echo $country->name; ?> </td>
                                        </tr>
                                    
                                        
                                        <tr>
                                            <th>Profile Image </th>
                                            <td> 
                                                <img style="width:80px" src="<?php echo base_url();?>resources/uploads/profiles/<?php echo $user->profile_pic;?>">
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>


                           
                </div>

                    </div>
                </div>
            </div>
           
            <?=form_close();?>
        </div>
    </div>


<?php 
    $testing = $this->db->query("SELECT * FROM testing WHERE uID = ".$id)->result_object()[0];
    if(!empty($testing)){
?>

    <div class="row">
        <div class="col-12">
            <?=form_open_multipart('',array('class'=>'form-material','novalidate'=>""));?>
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Testing Information</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                       
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                                <th>Hemoglobin</th>
                                                <td> <?php echo $testing->hemoglobin; ?></td>
                                                <th>Hematocrit</th>
                                                <td> <?php echo $testing->hematocrit; ?></td>
                                        </tr>
                                        
                                       
                                        
                                        <tr>
                                            <th>White Blood Cell Count</th>
                                            <td> <?php echo $testing->white_blood_count; ?></td>
                                            <th>Platelet Count</th>
                                            <td><?php echo $testing->platelet_count; ?></td>
                                        </tr>

                                       
                                        <tr>
                                            <th>Glucose</th>
                                            <td><?php echo $testing->glucose; ?> </td>
                                            <th>Creatine Kinase </th>
                                            <td><?php echo $testing->creatine; ?> </td>
                                        </tr>
                                    

                                        <tr>
                                            <th>Aspartate aminotransferase (AST)</th>
                                            <td> 
                                               <?php echo $testing->ast; ?>
                                            </td>
                                            <th>Alanine aminotransferase (ALT)</th>
                                            <td> 
                                               <?php echo $testing->alt; ?>
                                            </td>
                                        </tr>
                                       
                                        <tr>
                                            <th>Total protein</th>
                                            <td> 
                                               <?php echo $testing->protein; ?>
                                            </td>
                                            <th>Anion Gap</th>
                                            <td> 
                                               <?php echo $testing->anion; ?>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Test</th>
                                            <td> 
                                                <a download href="<?php echo base_url();?>resources/uploads/collection/<?php echo $testing->test_1;?>">
                                                    <button class="btn btn-primary">View Test</button>
                                                </a>
                                            </td>
                                            <td></td>
                                            <td> 
                                                
                                            </td>
                                        </tr>
                                        

                                    </tbody>
                                </table>
                            </div>


                           
                </div>

                    </div>
                </div>
            </div>
            
            <?=form_close();?>
        </div>
    </div>
<?php } ?>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>