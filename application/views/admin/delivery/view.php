           <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE BASE CONTENT -->
                        <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase"> Deliveries </span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
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
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <a id="sample_editable_1_new" href="<?php echo base_url('delivery/add'); ?>" class="btn sbold green"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th> Delivery Name </th>
                                                <th> Customer Name </th>
                                                <th> Customer Phone </th>
                                                <th> Pickup Location </th>
                                                <th> Drop Address </th>
                                                <th> Driver Name </th>   
                                                <th> Status </th>
                                                <th> Date </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php

                                        		foreach ($deliveries as $delivery) 
                                        		{
                                        		 	$date = $delivery['dvl_created_at'];
                                        		 	$id = $delivery['dvl_id'];
                                        		 	$format = date_create($date);
 													$formatted_date = date_format($format,'l jS F Y');
 													$status = $delivery['dvl_status'];
 													if($status == 1)
 													{
 														$mark = ' <span class="label label-sm label-success"> Complete </span> ';
 													}
 													else
 													{
 														$mark = '<span class="label label-sm label-success"> Incomplete </span> ';
 													}


 													?>
 												<tr class="odd gradeX">
                                                    <td width="150px"> <?php echo $delivery['dvl_name']; ?> </td>
	                                                <td width="150px"> <?php echo $delivery['u_fullname']; ?> </td>
	                                                <td><?php echo $delivery['u_phone']; ?> </td>
	                                                <td><?php echo $delivery['dvl_pickup']; ?></td>
                                                    <td><?php echo $delivery['dvl_drop']; ?></td>
                                                    <td><?php echo $delivery['d_name']; ?></td>
                                                    <td><?php echo $mark; ?></td>
	                                                <td class="center" width="180px"> <?php echo $formatted_date; ?> </td>
	                                                
	                                                <td>
	                                                    <div class="btn-group">
                                                 
                                                                 <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                     <i class="fa fa-angle-down"></i>
                                                                 </button>
                                                           
	                                                        <ul class="dropdown-menu pull-left" role="menu">
	                                                            <li>
	                                                                <a href="<?php echo base_url('delivery/add/').$id; ?>">
	                                                                    <i class="icon-docs"></i> Edit </a>
	                                                            </li>
	                                                            <li>
                                                                   
                                                                        <a href="<?php echo base_url('delivery/delete/').$id; ?>" onclick="return confirm('Are you sure?')">
                                                                        <i class="icon-tag"></i> Delete </a> 
                                                                      
	                                                            </li>
	                                                        </ul>
	                                                    </div>
	                                                </td>
                                            </tr>
                                            <?php

                                        		} 
                                        	?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>

                    <script type="text/javascript">
                    	$("#sample_1").DataTable();
                    </script>