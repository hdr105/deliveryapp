           <style type="text/css">

           </style>
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
                                    <span class="caption-subject font-green bold uppercase">Delivery</span>
                                </div>


                            </div>
                            <div class="portlet-body">
                                <!-- BEGIN FORM-->
                                <?php

                                      $p_lat = "";
                                        $p_lng = "";
                                        $d_lat = "";
                                        $d_lng = "";
                                if(isset($deliveri))
                                {
                                    $method = 'updateDelivery';
                                } 
                                else
                                {
                                    $method = 'submitDelivery';
                                }
                                ?>
                                <form  id="delivery" action="<?php echo base_url('Delivery/').$method; ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
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

                                    <?php if(isset($deliveri)){ 

                                        $p_lat = $deliveri->dvl_pick_lat;
                                        $p_lng = $deliveri->dvl_pick_long;
                                        $d_lat = $deliveri->dvl_drop_lat;
                                        $d_lng = $deliveri->dvl_drop_long;

                                        ?>
                                        <input type="hidden" name="delivery_id" value="<?php echo $deliveri->dvl_id ?>">
                    
                                    <?php }?>

                                    <div class="form-group  margin-top-20">
                                        <label class="control-label col-md-3">Drivers
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-3 p-r0">
                                            <div class="input-icon right">
                                                <select class="form-control js-example-basic-single" name="driver" id="driver">

                                                    <?php

                                                    foreach ($drivers as $driver) 
                                                    {
                                                     ?>
                                                     <option value="<?php echo $driver['d_id']; ?>" 
                                                        <?php if(isset($deliveri))
                                                        {
                                                            if($driver['d_id'] == $deliveri->dvl_driver_id)
                                                            {
                                                                echo "selected";
                                                            }
                                                        } ?>
                                                        >
                                                        <?php echo $driver['d_name']; ?>

                                                    </option>
                                                    <?php 
                                                }
                                                ?>

                                            </select>

                                       
                                        </div>
                                    </div>
                                    <div class="col-md-1 p-l0">
                                        <!--<a href="<?php echo base_url('drivers/add'); ?>"  class='btn btn-sm btn-success'><i class='fa fa-plus-circle  fa-2x'></i></a>-->

                                        <a class="btn green btn-hover" data-toggle="modal" data-target="#myModal">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Users
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-3 p-r0">
                                        <div class="input-icon right ">
                                           
                                            <select class="form-control js-example-basic-single" name="user" id="user">
                                                <?php
                                                foreach ($users as $user) 
                                                {
                                                 ?>
                                                 <option value="<?php echo $user['u_id']; ?>"
                                                    <?php if(isset($deliveri))
                                                    {
                                                        if($user['u_id'] == $deliveri->dvl_user_id)
                                                        {
                                                            echo "selected";
                                                        }
                                                    } ?>
                                                    ><?php echo $user['u_fullname']; ?></option>
                                                    <?php 
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-1 p-l0">
                                    <!-- <a  href="<?php echo base_url('users/add'); ?>" class='btn btn-sm btn-success'><i class='fa fa-plus-circle  fa-2x'></i></a> -->
                                         <a class="btn green btn-hover" data-toggle="modal" href="#basic">
                                             <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Package Width
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <input type="text" class="form-control" id="width" name="width" <?php if(isset($deliveri)){ echo "value='$deliveri->dvl_width'";} ?>  /> </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Package Weight
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="number" class="form-control" id="weight" name="weight" <?php if(isset($deliveri)){ echo "value='$deliveri->dvl_weight'";} ?> /> </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-md-3">Package Charges
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="number" class="form-control" id="charges" name="charges" <?php if(isset($deliveri)){ echo "value='$deliveri->dvl_charges'";} ?> /> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Pickup Location
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" id="pickup" name="pickup" <?php if(isset($deliveri)){ echo "value='$deliveri->dvl_pickup'";} ?> /> </div>
                                                        <input type="hidden" name="p_lat" id="plat" value="<?=$p_lat?>">
                                                        <input type="hidden" name="p_long" id="plng" value="<?=$p_lng?>">

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Drop Location
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="drop" name="drop" <?php if(isset($deliveri)){ echo "value='$deliveri->dvl_drop'";} ?>  /> 
                                                            <input type="hidden" name="d_lat" id="dlat" value="<?=$d_lat?>">
                                                            <input type="hidden" name="d_long" id="dlng" value="<?=$d_lng?>">

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
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


               <!--  MODAL ADD Driver -->
               <div class="modal fade" id="myModal" tabindex="-1" role="driver" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Add Driver</h4>
                            </div>
                            <div class="modal-body"> 
                                <form id="drivers" action="<?php echo base_url('Drivers/submitDrivers'); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group  margin-top-20">
                                            <label class="control-label col-md-3">Name
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" class="form-control" id="name" name="name" /> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Email
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="email" class="form-control" id="email" name="email"  /> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Password
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="password" id="password" class="form-control" name="password"/> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Phone
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="tel" class="form-control" id="number" name="number" /> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">CNIC
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="number" id="cnic" class="form-control" name="cnic" /> 
                                                </div>
                                                <span class="help-block"> e.g: 33000 0000000 0 </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Address
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" class="form-control" id="addr" name="addr"  /> 
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group" style="margin-left: 149px;">
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
                                    <input type="hidden" name="redirect_path" value="/delivery/add">
                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn green">Add</button>
                                </div>
                            </form>
                        </div>
                                    
                    </div>
                                  
                </div>

               <!-- End Add Model Driver -->



               <!-- MODAL ADD USER -->
               <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Add User</h4>
                            </div>
                            <div class="modal-body">
                                <form  id="users" action="<?php echo base_url('Users/submitUser'); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group  margin-top-20">
                                            <label class="control-label col-md-3">Name
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" class="form-control" id="name" name="name" /> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Email
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="email" class="form-control" id="email" name="email"/> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Password
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="password" id="password" class="form-control" name="password"/> 
                                                </div>
                                            </div>
                                        </div>
                                           
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Phone
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="tel" class="form-control" id="number" name="number" /> 
                                                </div>
                                            </div>
                                        </div>
                                          

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Address
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" class="form-control" id="addr" name="addr" /> 
                                                </div>
                                            </div>
                                        </div>
                                         <input type="hidden" name="redirect_path" value="/delivery/add">
                                    </div>   
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn green">Add</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

               <!-- End ADD User  -->


               <script type="text/javascript">
                $(document).ready(function() {


                    $("#delivery").validate({
                        rules: {
                            driver: "required",
                            user: "required",
                            width:"required",
                            weight: "required",
                            charges: "required",
                            pickup: "required",
                            drop: "required",

                        },
                    });




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
                            <?php if(!isset($driver)){ ?>
                                image: "required",
                            <?php } ?>

                        }
                    });





                    $("#users").validate({
                        rules: {
                            email: "required",
                            password: "required",
                            name:"required",
                            confirm :{
                                required:"please re-enter password",
                                equalTo: "#password"

                            },
                            number: "required",
                            addr: "required",
                        },
                    });
                });
            </script>