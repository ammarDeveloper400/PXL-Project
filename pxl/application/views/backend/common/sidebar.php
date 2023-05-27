
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->
                <div class="user-profile">
                    <div class="user-pro-body">
                        <?php 
                            $admin = $this->db->query("SELECT * FROM admin WHERE id = ".$this->session->userdata("admin_id"))->result_object()[0];
                        ?>
                        <div><img src="<?php echo base_url(); ?>resources/uploads/profiles/<?php echo $admin->admin_profile_pic; ?>" alt="user-img" class="img-circle"></div>
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php if($this->session->userdata("admin_name")!="")

                            { echo $this->session->userdata("admin_name"); }

                            else { echo is_vendor()?"Vendor":"Admin"; } ?> <span class="caret"></span></a>
                            <div class="dropdown-menu animated flipInY">
                                <!-- text-->
                                <a href="<?php echo base_url();  if(is_vendor()){ echo "admin/vendor-profile"; } else echo "admin/my-profile"; ?>" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                <!-- text-->
                               

                               
                                <!-- text-->
                                <?php if(check_role(2)){ ?>
                                 <div class="dropdown-divider"></div>
                                <a href="<?php echo base_url()."admin/settings"; ?>" class="dropdown-item"><i class="ti-settings"></i> Setting</a>
                                <?php } ?>
                                <!-- text-->
                                <div class="dropdown-divider"></div>

                                
                                <!-- text-->
                                <a href="<?php echo base_url().'admin/logout'; ?>" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                <!-- text-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
					<li class="<?=($active == 'dashboard')?'active':'';?>"> <a class="waves-effect waves-dark" href="<?php echo base_url().'admin/dashboard';?>" aria-expanded="false"><i class="fa fa-dashboard"></i><span class="hide-menu">Dashboard</span></a>
					</li>

                     <?php if(check_role(1)){ ?>
                        <li class="<?=($active == 'products')?'active':'';?>"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-diamond"></i><span class="hide-menu">Products</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?=($sub == 'products')?'active':'';?>"><a class="<?=($sub == 'categories')?'active':'';?>" href="<?php echo $url."admin/";?>products">Products <span class="badge badge-pill badge-cyan ml-auto">
                                    <?php echo count_listing("products",false); ?>
                                </span></a></li>
                                <li class="<?=($sub == 'add-product')?'active':'';?>"><a class="<?=($sub == 'add-product')?'active':'';?>" href="<?php echo $url."admin/";?>add-product">Add New Product</a></li>
                                <li class="<?=($sub == 'import-products')?'active':'';?>"><a class="<?=($sub == 'import-products')?'active':'';?>" href="<?php echo $url."admin/";?>import-products">Import products</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if(check_role(150)){ ?>
                        <li class="<?=($active == 'promo')?'active':'';?>"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-minus-square"></i><span class="hide-menu">Coupon Codes</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?=($sub == 'promo')?'active':'';?>"><a class="<?=($sub == 'categories')?'active':'';?>" href="<?php echo $url."admin/";?>promo"> Coupon Code <span class="badge badge-pill badge-cyan ml-auto">
                                     <?php echo $this->db->query("SELECT * FROM coupons")->num_rows(); ?>
                                </span></a></li>
                                <li class="<?=($sub == 'add-promo')?'active':'';?>"><a class="<?=($sub == 'add-category')?'active':'';?>" href="<?php echo $url."admin/";?>add-promo">Add New Coupon Code</a></li>
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if(check_role(155)){ ?>
                        <li class="<?=($active == 'sports')?'active':'';?>"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-futbol-o"></i><span class="hide-menu">Sports</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?=($sub == 'sports')?'active':'';?>"><a class="<?=($sub == 'sport')?'active':'';?>" href="<?php echo $url."admin/";?>sports"> Sports <span class="badge badge-pill badge-cyan ml-auto">
                                     <?php echo $this->db->query("SELECT * FROM sports")->num_rows(); ?>
                                </span></a></li>
                                <li class="<?=($sub == 'add-sport')?'active':'';?>"><a class="<?=($sub == 'add-sport')?'active':'';?>" href="<?php echo $url."admin/";?>add-sport">Add New Sport</a></li>
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if(check_role(14)){ ?>
                        <li class="<?=($active == 'orders')?'active':'';?>"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-shopping-cart"></i><span class="hide-menu">Orders</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?=($sub == 'orders')?'active':'';?>"><a class="<?=($sub == 'orders')?'active':'';?>" href="<?php echo $url."admin/";?>orders">Orders <span class="badge badge-pill badge-cyan ml-auto">
                                    <?php 
                                    echo $this->db->count_all_results("orders"); ?>
                                </span></a></li>
                        
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if(check_role(19)){ ?>
                        <li class="<?=($active == 'restaurant')?'active':'';?>"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Coaches</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?=($sub == 'restaurant')?'active':'';?>"><a class="<?=($sub == 'restaurant')?'active':'';?>" href="<?php echo $url."admin/";?>coaches">Coaches <span class="badge badge-pill badge-cyan ml-auto">
                                    <?php echo $this->db->query("SELECT * FROM users WHERE user_type=2")->num_rows(); ?>
                                </span></a></li>
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if(check_role(13)){ ?>
                        <li class="<?=($active == 'users')?'active':'';?>"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Athletes</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?=($sub == 'users')?'active':'';?>"><a class="<?=($sub == 'users')?'active':'';?>" href="<?php echo $url."admin/";?>users">Athletes <span class="badge badge-pill badge-cyan ml-auto">
                                   <?php echo $this->db->query("SELECT * FROM users WHERE user_type=1")->num_rows(); ?>
                                </span></a></li>
                                <li class="<?=($sub == 'add-user')?'active':'';?>"><a class="<?=($sub == 'add-user')?'active':'';?>" href="<?php echo $url."admin/";?>add-user">Add New Athlete</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    

                    <?php if(check_role(11)){ ?>
                        <li class="<?=($active == 'location')?'active':'';?>"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-deviantart"></i><span class="hide-menu">Workouts</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?=($sub == 'location')?'active':'';?>"><a class="<?=($sub == 'categories')?'active':'';?>" href="<?php echo $url."admin/";?>workouts">Workouts <span class="badge badge-pill badge-cyan ml-auto">
                                    <?php echo count_listing("workouts",false); ?>
                                </span></a></li>
                                <li class="<?=($sub == 'add-location')?'active':'';?>"><a class="<?=($sub == 'add-location')?'active':'';?>" href="<?php echo $url."admin/";?>add-workout">Add New Workout</a></li>
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if(check_role(12)){ ?>
                        <li class="<?=($active == 'category')?'active':'';?>"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-apple-keyboard-command"></i><span class="hide-menu">Affiliates</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?=($sub == 'category')?'active':'';?>"><a class="<?=($sub == 'categories')?'active':'';?>" href="<?php echo $url."admin/";?>affiliates">Affiliates <span class="badge badge-pill badge-cyan ml-auto">
                                    <?php echo count_listing("events_affiliates",false); ?>
                                </span></a></li>
                                <li class="<?=($sub == 'add-category')?'active':'';?>"><a class="<?=($sub == 'add-category')?'active':'';?>" href="<?php echo $url."admin/";?>add-affiliate">Add New Affiliate</a></li>
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if(check_role(100)){ ?>
                        <li class="<?=($active == 'withdrawals')?'active':'';?>"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">Withdrawals</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?=($sub == 'withdrawals')?'active':'';?>"><a class="<?=($sub == 'withdrawals')?'active':'';?>" href="<?php echo $url."admin/";?>withdrawals">Withdrawal  <span class="badge badge-pill badge-cyan ml-auto">
                                    <?php echo $this->db->query("SELECT * FROM withdrawal")->num_rows(); ?>
                                </span></a></li>
                                
                            </ul>
                        </li>
                    <?php } ?>
                   
                    <?php if(check_role(18)){ ?>
                        <li class="<?=($active == 'subscriptions')?'active':'';?>"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">Subscription Plans</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?=($sub == 'subscriptions')?'active':'';?>"><a class="<?=($sub == 'subscriptions')?'active':'';?>" href="<?php echo $url."admin/admins/";?>subscriptions">Subscription </a></li>
                        
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if(check_role(3)){
                        $result_adm_count = $this->db->query('
                            SELECT *
                            FROM admin
                            WHERE is_deleted  = 0
                            '
                        )->num_rows(); 
                    ?>
                        <li class="<?=($active == 'admins')?'active':'';?>"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-lock"></i><span class="hide-menu">Admins</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?=($sub == 'admins')?'active':'';?>"><a class="<?=($sub == 'admins')?'active':'';?>" href="<?php echo $url."admin/";?>admins">Admins <span class="badge badge-pill badge-cyan ml-auto">
                                    <?php echo $result_adm_count; ?>
                                </span></a></li>
                                <li class="<?=($sub == 'add-admin')?'active':'';?>"><a class="<?=($sub == 'add-admin')?'active':'';?>" href="<?php echo $url."admin/";?>add-admin">Add New Admin</a></li>
                            </ul>
                        </li>
                    <?php } ?>

                    


                        <li class="nav-small-cap">--- Other</li>
                        
                        <li> <a class="waves-effect waves-dark" href="<?php echo $url.'admin/change-password'; ?>" aria-expanded="false"><i class="fa fa-circle-o text-success"></i><span class="hide-menu">Change Password</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo $url.'admin/logout'; ?>" aria-expanded="false"><i class="fa fa-circle-o text-success"></i><span class="hide-menu">Log Out</span></a></li>
                       
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ==============================================================