<!DOCTYPE html>
<html lang="en">
<head>

	<?php echo $css_php;?>

</head>
<body class="dt-sidebar--fixed dt-header--fixed">

<!-- Loader -->
<div class="dt-loader-container">
	<div class="dt-loader">
		<svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
		</svg>
	</div>
</div>
<!-- /loader -->

<!-- Root -->
<div class="dt-root">
    <?php echo $header_php;?>
  <main class="dt-main">
	<?php echo $sidebar_php;?>
    <div class="dt-content-wrapper">
		<div class="dt-content">
			<div class="dt-page__header">
				<div class="row">
				<div class="col-sm-12 col-md-10">
					<h1 class="dt-page__title">Detail of Group</h1>
				</div>
				</div>
			</div>
			
			<div class="row">
			<div class="col-xl-12">
					<div class="dt-card">
						<div class="dt-card__body">
							<div class="table-responsive">
								<table class="table">
									<tbody>
										<tr>
											<td>Group Name</td>
											<td><?php echo $group_info['name'];?></td>
										</tr>
										<tr>
											<td>Group Budget</td>
											<td><?php echo $group_info['budget'];?> GBP</td>
										</tr>
										<tr>
											<td>Group Address</td>
											<td><?php echo $group_info['bill_addr'];?></td>
										</tr>
										<tr>
											<td>Group Postcode</td>
											<td><?php echo $group_info['bill_zip'];?></td>
										</tr>
										<tr>
											<td>Group City</td>
											<td><?php echo $group_info['bill_city'];?></td>
										</tr>
										<tr>
											<td>Group Country</td>
											<td><?php echo $group_info['bill_country'];?></td>
										</tr>
										<tr>
											<td>Group Code</td>
											<td><?php echo $group_info['group_code'];?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-12">
					<div class="dt-card">
						<div class="dt-card__header">
							<h5>Purchased Productions</h5>
						</div>
						<div class="dt-card__body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>User Name</th>
											<th>Email</th>
											<th>Accept status</th>
											<th>Order status</th>
											<th>Will Buy For</th>
										</tr>
									</thead>
									<tbody>
									<?php for($i = 0 ; $i < count($group_member_info); $i++){ ?>
										<tr>
											<td><?php echo $group_member_info[$i]['first_name'].' '.$group_member_info[$i]['last_name'];?></td>
											<td><?php echo $group_member_info[$i]['email'];?></td>
											<?php if($group_member_info[$i]['accept_status'] == '1'):?>
												<td><span class="badge badge-primary">Accept</span></td>
											<?php elseif($group_member_info[$i]['accept_status'] == '0'):?>
												<td><span class="badge badge-info">No reply yet</span></td>
											<?php else:?>
												<td><span class="badge badge-danger">Reject</span></td>
											<?php endif;?>

											<?php if($group_member_info[$i]['order_status'] == '1'):?>
												<td><span class="badge badge-primary">Ordered</span></td>
											<?php else:?>
												<td><span class="badge badge-danger">Not ordered yet</span></td>
											<?php endif;?>

											<td><?php echo $group_member_info[$i]['whom_name'];?></td>
										</tr>
										<?php } ?>
									</tbody>
									
								</table>
							</div>
						</div>
					</div>
				</div>
				


				

				<!-- Footer -->
				<footer class="dt-footer">
					Copyright Company Name © 2019
				</footer>
				<!-- /footer -->
			</div>
		</div>
	</div>
  </main>
</div>

<?php echo $js_php;?>

</body>
</html>
