       <div class="page-content-wrapper">
<div class="page-content">

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
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<b class="col-md-4">Customer Name:</b>
							<div class="col-md-8">
								<p> <?php echo $delivery->u_fullname ?> </p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<b class="col-md-4">Customer Phone:</b>
							<div class="col-md-8">
								<p> <?php echo $delivery->u_phone ?> </p>
							</div>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<b class=" col-md-4">Package Width:</b>
							<div class="col-md-8">
								<p > <?php echo $delivery->dvl_width ?> </p>
							</div>
						</div>
					</div>
					
						<div class="col-md-6">
							<div class="form-group">
								<b class="col-md-4">Package Weight:</b>
								<div class="col-md-8">
									<p> <?php echo $delivery->dvl_weight ?> </p>
								</div>
							</div>
						</div>
						
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row">

					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<b class="col-md-4">Package Pickup:</b>
							<div class="col-md-8">
								<p> <?php echo $delivery->dvl_pickup ?> </p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<b class="col-md-4">Package Drop:</b>
							<div class="col-md-8">
								<p> <?php echo $delivery->dvl_drop ?> </p>
							</div>
						</div>
					</div>
				</div>
				
					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<b class="col-md-4">Package Charges:</b>
								<div class="col-md-8">
									<p> <?php echo "$".$delivery->dvl_charges ?> </p>
								</div>
							</div>
						</div>
					

						<div class="col-md-6">
							<div class="form-group">
								<b class="col-md-4">Package Date:</b>
								<div class="col-md-8">
									<p> <?php  
									$date = $delivery->u_created_at;
									$format = date_create($date);
 									$formatted_date = date_format($format,'l jS F Y'); 
 												echo $formatted_date; ?> </p>
								</div>
							</div>
						</div>
					</div>
				
				<hr>
				<?php 
				// href='$redirect'
				$id = $delivery->dvl_id;
				$driver_name = $delivery->d_name;
				$path = base_url("driver_dashboard/enquire_location/").$id."/".$delivery->dvl_drop_lat."/".$delivery->dvl_drop_long;
				?>

				<input type="hidden" value="<?php echo $path ?>" id="path" >
				<input type="hidden" value="<?php echo $driver_name ?>" id="driver" >

				<center><a class='btn btn-info start_ride' href="<?php echo base_url('driver_dashboard/start_ride/').$id; ?>">Start Ride</a></center>

				
			</div>	



		</div>
	</div>







</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		


	});
</script>
