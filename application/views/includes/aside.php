            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start active open">
                            <a href="<?php echo base_url('admin_dashboard/'); ?>" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">Features</h3>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                 <i class="fa fa-cab"></i>
                                <span class="title">Drivers</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="<?php echo base_url('Drivers/add'); ?>" class="nav-link ">
                                       
                                        <span class="title">Add Drivers</span>
                                    </a>
                                </li>

                                <li class="nav-item  ">
                                    <a href="<?php echo base_url('Drivers'); ?>" class="nav-link ">
                                        <span class="title">View Drivers</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-users"></i>
                                <span class="title">Customer</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="<?php echo base_url('Users/add'); ?>" class="nav-link ">
                                        <span class="title">Add Customer</span>
                                    </a>
                                </li>

                                <li class="nav-item  ">
                                    <a href="<?php echo base_url('Users/'); ?>" class="nav-link ">
                                        <span class="title">View Customers</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-dropbox"></i>
                                <span class="title">Deliveries</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="<?php echo base_url('delivery/add'); ?>" class="nav-link ">
                                        <span class="title">Add Delivery</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="<?php echo base_url('delivery/'); ?>" class="nav-link ">
                                        <span class="title">View Delivery</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->