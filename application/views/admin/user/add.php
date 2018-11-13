           <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">Customer</span>
                                    </div>
                                   

                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <?php
                                        if(isset($user))
                                        {
                                            $method = 'updateUser';
                                        } 
                                        else
                                        {
                                            $method = 'submitUser';
                                        }
                                    ?>
                                    <form  id="users" action="<?php echo base_url('Users/').$method; ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="form-body">
                                           <?php
                                           if($this->session->flashdata('success'))
                                            { ?>
                                                <div class="alert alert-success" role="alert">
                                                 Successfully <?php echo $this->session->userdata('success'); ?>
                                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true" class="fas fa-times"></span>
                                                </button>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                         <?php
                                           if($this->session->flashdata('error'))
                                            { ?>
                                                <div class="alert alert-danger" role="alert">
                                                 Error:  <?php echo $this->session->userdata('error'); ?>
                                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true" class="fas fa-times"></span>
                                                </button>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        
                                            <?php if(isset($user)){ ?>
                                                <input type="hidden" name="user_id" value="<?php echo $user->u_id ?>">
                                                <input type="hidden" name="user_qb_id" value="<?php echo $user->user_qb_id ?>">
                                            <?php }?>
                                          
                                            <div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" id="name" name="name" <?php if(isset($user)){ echo "value='$user->u_fullname'";} ?> /> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Email
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="email" class="form-control" id="email" name="email" <?php if(isset($user)){ echo "value='$user->u_email'";} ?> /> </div>
                                                </div>
                                            </div>
                                           
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Phone
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="tel" class="form-control" id="number" name="number" <?php if(isset($user)){ echo "value='$user->u_phone'";} ?> /> </div>
                                                </div>
                                            </div>
                                          
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Country
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" id="country" name="country" <?php if(isset($user)){ echo "value='$user->u_country'";} ?> /> </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">City
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" id="city" name="city" <?php if(isset($user)){ echo "value='$user->u_city'";} ?> /> </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Postal Code
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="number" class="form-control" id="postalCode" name="postalCode" <?php if(isset($user)){ echo "value='$user->u_postal_code'";} ?> /> </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Address
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" id="addr" name="addr" <?php if(isset($user)){ echo "value='$user->u_address'";} ?> /> </div>
                                                </div>
                                            </div>

                                    </div>
                                     <input type="hidden" name="redirect_path" value="/users/">
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <button type="button" class="btn default">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                            <!-- END VALIDATION STATES-->
                        </div>
                    </div>
                   
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>


            <script type="text/javascript">
                $(document).ready(function() {
                    
         
                    $("#users").validate({
                    rules: {
                    email: "required",
                    name:"required",
                    number: "required",
                    postalCode: "required",
                    city: "required",
                    country :"required",
                    addr: "required",
                    },
                    });
                 });
            </script>