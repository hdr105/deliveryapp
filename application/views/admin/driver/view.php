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
                                        <span class="caption-subject bold uppercase"> Drivers </span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                        </div>
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
                                                    <a id="sample_editable_1_new" href="<?php echo base_url('Drivers/add'); ?>" class="btn sbold green"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="btn-group pull-right">
                                                    <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-print"></i> Print </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
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

                                        		foreach ($drivers as $driver) 
                                        		{
                                        		 	$date = $driver['d_created_at'];
                                        		 	$id = $driver['d_id'];
                                        		 	$format = date_create($date);
 													$formatted_date = date_format($format,'l jS F Y');
 													$status = $driver['d_status'];
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
                                               
	                                                <td> <?php echo $driver['d_name']; ?> </td>
	                                                <td>
	                                                    <a href="mailto:<?php echo $driver['d_email']; ?>"> <?php echo $driver['d_email']; ?> </a>
	                                                </td>
	                                                <td><?php echo $driver['d_phone']; ?></td>
	                                                <td class="center"> <?php echo $formatted_date; ?> </td>
	                                                <td><?php echo $mark; ?></td>
	                                                <td>
	                                                    <div class="btn-group">
	                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
	                                                            <i class="fa fa-angle-down"></i>
	                                                        </button>
	                                                        <ul class="dropdown-menu pull-left" role="menu">
	                                                            <li>
	                                                                <a href="<?php echo base_url('Drivers/add/').$id; ?>">
	                                                                    <i class="icon-docs"></i> Edit </a>
	                                                            </li>
	                                                            <li>
	                                                                <a href="<?php echo base_url('Drivers/delete/').$id; ?>" onclick="return confirm('Are you sure?')">
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