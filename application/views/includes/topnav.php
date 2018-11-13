<div class="top-menu">
    <ul class="nav navbar-nav pull-right">
        <li class="separator hide"> </li>
        <!-- BEGIN NOTIFICATION DROPDOWN -->
       
    <!-- END NOTIFICATION DROPDOWN -->
    <li class="separator hide"> </li>
    <!-- BEGIN INBOX DROPDOWN -->
    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
    <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <i class="icon-envelope-open"></i>
            <span class="badge badge-danger"> 4 </span>
        </a>
        <ul class="dropdown-menu">
            <li class="external">
                <h3>You have<span class="bold">7 New</span> Messages</h3>
                <a href="app_inbox.html">view all</a>
            </li>
            <li>
                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                    <li>
                        <a href="#">
                            <span class="photo">
                                <img src="assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> 
                            </span>
                            <span class="subject">
                                <span class="from"> Lisa Wong </span>
                                <span class="time">Just Now </span>
                            </span>
                            <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="photo">
                                <img src="assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> 
                            </span>
                            <span class="subject">
                                <span class="from"> Richard Doe </span>
                                <span class="time">16 mins </span>
                            </span>
                            <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="photo">
                                <img src="assets/layouts/layout3/img/avatar1.jpg" class="img-circle" alt=""> 
                            </span>
                            <span class="subject">
                                <span class="from"> Bob Nilson </span>
                                <span class="time">2 hrs </span>
                            </span>
                            <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="photo">
                                <img src="assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> 
                            </span>
                            <span class="subject">
                                <span class="from"> Lisa Wong </span>
                                <span class="time">40 mins </span>
                            </span>
                            <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="photo">
                                <img src="assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> 
                            </span>
                            <span class="subject">
                                <span class="from"> Richard Doe </span>
                                <span class="time">46 mins </span>
                            </span>
                            <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <!-- END INBOX DROPDOWN -->
    <li class="separator hide"> </li>
    <!-- BEGIN TODO DROPDOWN -->

    <!-- BEGIN USER LOGIN DROPDOWN -->
    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
    <li class="dropdown dropdown-user dropdown-dark">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <span class="username username-hide-on-mobile"> <?php echo $this->session->userdata('fullname'); ?> </span>
            <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
            <img alt="" class="img-circle" src="assets/layouts/layout4/img/avatar9.jpg" /> 
        </a>
        <ul class="dropdown-menu dropdown-menu-default">
            <li>
                <a href="page_user_profile_1.html">
                    <i class="icon-user"></i> My Profile 
                </a>
            </li>
            <li>
                <a href="app_calendar.html">
                    <i class="icon-calendar"></i> My Calendar 
                </a>
            </li>
            <li>
                <a href="app_inbox.html">
                    <i class="icon-envelope-open"></i> My Inbox
                    <span class="badge badge-danger"> 3 </span>
                </a>
            </li>
            <li>
                <a href="app_todo_2.html">
                    <i class="icon-rocket"></i> My Tasks
                    <span class="badge badge-success"> 7 </span>
                </a>
            </li>
            <li class="divider"> </li>
            <li>
                <a href="page_user_lock_1.html">
                    <i class="icon-lock"></i> Lock Screen </a>
                </li>
                <li>
                    <a href="<?php echo base_url('Authentication/logout'); ?>">
                        <i class="icon-key"></i> Log Out </a>
                    </li>
                </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
        </ul>
    </div>