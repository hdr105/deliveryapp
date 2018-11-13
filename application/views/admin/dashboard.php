


<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Admin Dashboard   </h1>
            </div>
            <!-- END PAGE TITLE -->

        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">Dashboard</span>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->

        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject bold uppercase font-dark">Incomplete Deliveries</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                Delivery Informantion </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="form-body">

                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th> Customer Name </th>
                                                <th> Customer Phone </th>
                                                <th> Drop Address </th>
                                                <th> Driver Name </th>   
                                                <th> Status </th>
                                                <th> Date </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!empty($incomplete_deliveries))
                                            {

                                                foreach ($incomplete_deliveries as $delivery) 
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

                                                        <td width="150px"> <?php echo $delivery['u_fullname']; ?> </td>
                                                        <td><?php echo $delivery['u_phone']; ?> </td>
                                                        <td><?php echo $delivery['dvl_drop']; ?></td>
                                                        <td><?php echo $delivery['d_name']; ?></td>
                                                        <td><?php echo $mark; ?></td>
                                                        <td class="center"> <?php echo $formatted_date; ?> </td>

                                                    </tr>
                                                    <?php
                                                } 
                                            }
                                            else
                                                { ?>
                                                    <div class="alert alert-danger">
                                                        <strong>Danger!</strong> No InComplete Deliveries.
                                                    </div>
                                                <?php } ?>


                                            </tbody>
                                        </table>

                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xs-12 col-sm-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption ">
                                <span class="caption-subject font-dark bold uppercase">Complete Deliveries</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                    Delivery Informantion </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="form-body">
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th> Customer Name </th>
                                                    <th> Customer Phone </th>
                                                    <th> Drop Address </th>
                                                    <th> Driver Name </th>   
                                                    <th> Status </th>
                                                    <th> Date </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if(!empty($complete_deliveries))
                                                {

                                                    foreach ($complete_deliveries as $delivery) 
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

                                                            <td width="150px"> <?php echo $delivery['u_fullname']; ?> </td>
                                                            <td><?php echo $delivery['u_phone']; ?> </td>
                                                            <td><?php echo $delivery['dvl_drop']; ?></td>
                                                            <td><?php echo $delivery['d_name']; ?></td>
                                                            <td><?php echo $mark; ?></td>
                                                            <td class="center"> <?php echo $formatted_date; ?> </td>

                                                        </tr>
                                                        <?php

                                                    } 
                                                }

                                                ?>


                                            </tbody>
                                        </table>

                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

</div>    


<script type="text/javascript">
    $(".table-checkable").DataTable();

</script>