<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url()."admin"; ?>">
               <span>
                 <!-- dark Logo text -->
                 <img src="<?php echo base_url(); ?>resources/uploads/logo/<?php echo $settings->site_logo; ?>" alt="<?php echo $settings->site_title; ?>" class="dark-logo" style="height: 31px;" />
             </span> 
             </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item" style="display: none;">
                    <form class="app-search d-none d-md-block d-lg-block">
                        <input type="text" class="form-control" placeholder="Search & enter">
                    </form>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->
                <?php /* ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                        <ul>
                            <li>
                                <div class="drop-title">Notifications</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <?php foreach($notifications->result() as $notification){?>
                                        <a <?php if($notification->read_it == 0){?> class="new-notification" <?php } ?> href="<?php echo $url.$notification->url;?>">
                                            <div class="btn btn-success btn-circle"><i class="mdi mdi-account-location"></i></div>
                                            <div class="mail-contnet">
                                                <h5><?php echo $notification->title;?></h5> <span class="mail-desc"><?php echo $notification->content;?></span></div>
                                        </a>
                                    <?php } ?>


                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center link" href="<?php echo $url;?>admin/all-notifications"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php */ ?>
                
                <!-- ============================================================== -->
                <!-- End Comment -->
                <!-- ============================================================== -->
                
               
                <!-- <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li> -->
            </ul>
        </div>
    </nav>
</header>