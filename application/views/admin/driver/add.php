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
                                        <span class="caption-subject font-green bold uppercase">Drivers</span>
                                    </div>
                                   

                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <?php
                                        if(isset($driver))
                                        {
                                            $method = 'updateDrivers';
                                        } 
                                        else
                                        {
                                            $method = 'submitDrivers';
                                        }
                                    ?>
                                    <form  id="drivers" action="<?php echo base_url('Drivers/').$method; ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
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
                                        
                                            <?php if(isset($driver)){ ?>
                                                <input type="hidden" name="driver_id" value="<?php echo $driver->d_id ?>">
                                                <input type="hidden" name="qb_driver_id" value="<?php echo $driver->qb_driver_id ?>">
                                            <?php }?>
                                          
                                            <div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" id="name" name="name" <?php if(isset($driver)){ echo "value='$driver->d_name'";} ?> /> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Email
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="email" class="form-control" id="email" name="email" <?php if(isset($driver)){ echo "value='$driver->d_email'";} ?> /> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Password
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="<?php echo (isset($driver)?'text':'password'); ?>" id="password" class="form-control" name="password" <?php if(isset($driver)){ echo "value='$driver->d_password'";} ?> /> </div>
                                                </div>
                                            </div>
                                            <?php if(!isset($driver)){ ?>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Confirm Password
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="password" id="confirm" class="form-control" name="confirm" /> </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Phone
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="tel" class="form-control" id="number" name="number" <?php if(isset($driver)){ echo "value='$driver->d_phone'";} ?> /> </div>
                                                </div>
                                            </div>
                                          
                                            <div class="form-group">
                                                <label class="control-label col-md-3">CNIC
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="number" id="cnic" class="form-control" name="cnic" <?php if(isset($driver)){ echo "value='$driver->d_cnic'";} ?> /> </div>
                                                    <span class="help-block"> e.g: 33000 0000000 0 </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Country
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" id="country" name="country" <?php if(isset($driver)){ echo "value='$driver->d_country'";} ?> /> 
                                                    </div>
                                                    </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">City
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" id="city" name="city" <?php if(isset($driver)){ echo "value='$driver->d_city'";} ?> /> 
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Postal Code
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" id="postalCode" name="postalCode" <?php if(isset($driver)){ echo "value='$driver->d_postalCode'";} ?> /> 
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Address
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" id="addr" name="addr" <?php if(isset($driver)){ echo "value='$driver->d_address'";} ?> /> </div>
                                                </div>
                                            </div>
                                            <?php if(isset($driver)){ ?>
                                                <input type="hidden" name="driver_image" value="<?php echo $driver->d_image ?>">
                                            <?php }?>

                                            <div class="form-group" style="margin-left: 318px;">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> 
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                        <span class="btn default btn-file">
                                                            <span class="fileinput-new"> Select image </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            <input type="file" name="image" id="image" > 
                                                        </span>
                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                    </div>
                                                </div>                 
                                            </div>
                                    </div>
                                    <input type="hidden" name="redirect_path" value="/drivers/">
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
                    
         
                    $("#drivers").validate({
                    rules: {
                    email: "required",
                    password: "required",
                    name:"required",
                    confirm :{
                        required:"please re-enter password",
                        equalTo: "#password"

                    },
                    number: "required",
                    cnic: "required",
                    addr: "required",
                    city: "required",
                    country: "required",
                    postalCode: "required",
                    <?php if(!isset($driver)){ ?>
                    image: "required",
                <?php } ?>

                    }
                    });
                 });
            </script>