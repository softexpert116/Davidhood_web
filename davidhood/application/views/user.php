<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Users</span></h4>
						</div>
						<div class="heading-elements">						
							<img src="<?php echo base_url().LOGO_URL;?>" alt="" style="width:50px; height:50px; margin-right:20px;">	
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><i class="icon-home2 position-left"></i> Manage</li>
							<li>Users</li>
							
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Page length options -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Users</h5>
							<?php if ($error != "") { ?>
								<div class="alert alert-primary no-border">
									<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
									<span class="text-semibold"><?php echo $error; ?></span>
						    	</div>
							<?php } ?>
							
							
						</div>

						<table class="table datatable-show-all">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Email</th>
									<th>Birth Date</th>
									<th>Address</th>
									<th>Postal Code</th>
									<th>IBAN</th>
									<th>Gained CHF</th>
									<th>Paid CHF</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                                	for($i = 0; $i < count($data); $i++) {
										?><tr>
										<td ><?php echo $i+1; ?></td>	
										<td >
											<?php if ($data[$i]['lang'] == 'french') {?>
											<img src="<?php echo base_url().'uploadImages/admin/french.png';?>" style="width:17px; height: 17px;" />
											<?php } else { ?>
											<img src="<?php echo base_url().'uploadImages/admin/deutsch.png';?>" style="width:17px; height: 17px;" />
											<?php } ?>
											<?php echo $data[$i]['first_name'].' '.$data[$i]['last_name']; ?>
										</td>	
										<td><?php echo $data[$i]['email']; ?></td>
										<td><?php echo $data[$i]['birth_date']; ?></td>
										<td><?php echo $data[$i]['address']; ?></td>
										<td><?php echo $data[$i]['postal_code']; ?></td>
										<td><?php echo $data[$i]['iban']; ?></td>
										<td style="text-align: center;"><?php echo $data[$i]['price']; ?></td>
										<td style="text-align: center;"><?php echo $data[$i]['paid']; ?></td>
										<td><a href="<?php echo base_url().'main/delete/tbl_user/'.$data[$i]['id']; ?>" class="btn btn-default" >Remove <i class="icon-cancel-circle2 position-right"></i></a></td>
										</tr>
										<?php
									} 
                            	?>
								
							</tbody>
						</table>
					</div>
					<!-- /page length options -->
				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>

</html>
