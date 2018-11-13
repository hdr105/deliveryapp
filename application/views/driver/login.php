<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("includes/login_head"); ?>
<!-- END HEAD -->
<style type="text/css">
    label .error{
        color: red;
    }
</style>
<body class=" login">
    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="index.html">
            <img src="assets/pages/img/logo-big.png" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form id="login-form" action="<?php echo base_url("authentication/driver_auth"); ?>" method="post">
                <h3 class="form-title">Login to your account</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any email and password. </span>
                </div>
                <div class="form-group">
                 <?php if($this->session->flashdata('error'))
                 { ?>
                    <div class="alert alert-danger animated fadeIn">
                        <strong>Opps! </strong> <?php echo $this->session->userdata('error'); ?>
                        </div><?php
                    }
                    ?>
                    <?php if($this->session->flashdata('successMessage'))
                    { ?>
                        <div class="alert alert-success animated fadeIn">
                            <strong><?php echo $this->session->userdata('successMessage'); ?></strong>
                            </div><?php
                        }
                        ?>
                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                        <label class="control-label visible-ie8 visible-ie9">Email</label>
                        <div class="input-icon">
                            <i class="fa fa-user"></i>
                            <input class="form-control placeholder-no-fix" type="email" id="email" autocomplete="off" placeholder="Email" name="email" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Password</label>
                        <div class="input-icon">
                            <i class="fa fa-lock"></i>
                            <input class="form-control placeholder-no-fix" type="password" id="password" autocomplete="off" placeholder="Password" name="password" /> 
                        </div>
                    </div>

                    <div class="form-actions">
                        <label class="rememberme mt-checkbox mt-checkbox-outline">
                            <input type="checkbox" name="remember" value="1" /> Remember me
                            <span></span>
                        </label>
                        <button type="submit" class="btn green pull-right"> Login </button>
                    </div>


                </form>
                <!-- END LOGIN FORM -->
            </div>
            <!-- END LOGIN -->
            <!-- BEGIN COPYRIGHT -->
            <div class="copyright"> <?php echo date("Y"); ?> &copy; DeliveryApp - Bitsclan.com </div>
            <!-- END COPYRIGHT -->

            <?php $this->load->view("includes/login_scripts"); ?>

        </body>

        </html>