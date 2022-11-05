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
					<h1 class="dt-page__title">Users</h1>
				</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12">
					<div class="dt-card">
						<div class="dt-card__body">
							<div class="table-responsive">
								<table id="data-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Name</th>
											<th>Email</th>
											<th>Address</th>
											<th>Zip Code</th>
											<th>City</th>
											<th>Country</th>
											<th>Join By</th>
										</tr>
									</thead>
									<tbody>
										<?php for($i=0;$i<count($users);$i++):?>
										<tr class="gradeX">
											<td><?php echo $i+1;?></td>
											<td><?php echo $users[$i]['first_name'].' '.$users[$i]['last_name'];?></td>
											<td><?php echo $users[$i]['email'];?></td>
											<td><?php echo $users[$i]['addr'];?></td>
											<td><?php echo $users[$i]['zip'];?></td>
											<td><?php echo $users[$i]['city'];?></td>
											<td><?php echo $users[$i]['country'];?></td>
											<td><?php echo $users[$i]['joined_at'];?></td>
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
