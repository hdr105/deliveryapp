 <style type="text/css">

 </style>
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
                                        <span class="caption-subject bold uppercase"> Customer </span>
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
                                                 Successfully <?php echo $this->session->userdata('error'); ?>
                                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true" class="fas fa-times"></span>
                                                </button>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <a id="sample_editable_1_new" href="<?php echo base_url('Users/add'); ?>" class="btn sbold green"> Add New
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
                                                <th> Name </th>
                                                <th> Email </th>
                                                <th> Phone </th>   
                                                <th> Joined </th>
                                                <th> Status </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php

                                        		foreach ($users as $user) 
                                        		{
                                        		 	$date = $user['u_created_at'];
                                        		 	$id = $user['u_id'];
                                        		 	$format = date_create($date);
 													$formatted_date = date_format($format,'l jS F Y');
 													$status = $user['u_status'];
 													if($status == 1)
 													{
 														$mark = ' <span class="label label-sm label-success"> Active </span> ';
 													}
 													else
 													{
 														$mark = '<span class="label label-sm label-success"> De - active </span> ';
 													}


 													?>
 												<tr class="odd gradeX">
                                               
	                                                <td width="250px;"> <?php echo $user['u_fullname']; ?> </td>
	                                                <td>
	                                                    <a href="mailto:<?php echo $user['u_email']; ?>"> <?php echo $user['u_email']; ?> </a>
	                                                </td>
	                                                <td><?php echo $user['u_phone']; ?></td>
	                                                <td class="center"> <?php echo $formatted_date; ?> </td>
	                                                <td><?php echo $mark; ?></td>
	                                                <td>
	                                                    <div class="btn-group">
	                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
	                                                            <i class="fa fa-angle-down"></i>
	                                                        </button>
	                                                        <ul class="dropdown-menu pull-left" role="menu">
	                                                            <li>
	                                                                <a href="<?php echo base_url('users/add/').$id; ?>">
	                                                                    <i class="icon-docs"></i> Edit </a>
	                                                            </li>
	                                                            <li>
	                                                                <a href="<?php echo base_url('users/delete/').$id; ?>" onclick="return confirm('Are you sure?')">
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