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
					<h1 class="dt-page__title">Detail of Order</h1>
				</div>
				</div>
			</div>
			
			<div class="row">
			<div class="col-xl-12">
					<div class="dt-card">
						<div class="dt-card__body">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>User Name</th>
											<th>Kind</th>
											<th>Status</th>
											<th>Date</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?php echo $order_main['user_name'];?></td>
											<td>
												<?php if($order_main['is_group_order'] == 1):?>
													<span class="badge badge-pill badge-primary mb-1 mr-1">Group</span>
												<?php else:?>
													<span class="badge badge-pill badge-danger mb-1 mr-1">Individual</span>
												<?php endif;?>
											</td>
											<td>
												<?php if($order_main['checkout_status'] == 1):?>
													<span class="badge badge-pill badge-primary mb-1 mr-1">Completed</span>
												<?php else:?>
													<span class="badge badge-pill badge-danger mb-1 mr-1">Pending</span>
												<?php endif;?>
											</td>
											<td><?php echo $order_main['created_at'];?></td>
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
											<th>No</th>
											<th>Category</th>
											<th>Name</th>
											<th>Price</th>
											<th>Count</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<?php for($i=0;$i<count($order_list);$i++):?>
										<tr class="gradeX">
											<td><?php echo $i+1;?></td>
											<td> <?php echo $order_list[$i]['category_name'];?> </td>
											<td> <?php echo $order_list[$i]['product_name'];?> </td>
											<td> <?php echo $order_list[$i]['product_price'];?>(&#163;) </td>
											<td> <?php echo $order_list[$i]['product_count'];?> </td>
											<td> <?php echo $order_list[$i]['total_price'];?>(&#163;) </td>
										</tr>
										<?php endfor;?>
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
