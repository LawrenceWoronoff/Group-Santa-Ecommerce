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
					<h1 class="dt-page__title">Coupon</h1>
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
											<th>Code</th>
											<th>Group</th>
											<th>Create</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php for($i=0;$i<20;$i++):?>
										<tr class="gradeX">
											<td><?php echo $i+1;?></td>
											<td>gef8237</td>
											<td>Group 1</td>
											<td>2000-05-07 05:08:09</td>
											<td>Consumed</td>
											<td><a class="btn btn-primary mr-2 mb-2 text-white">Detail</a></td>
										</tr>
										<?php endfor;?>
									</tbody>
									<tfoot>
										<tr>
											<th>No</th>
											<th>Code</th>
											<th>Group</th>
											<th>Create</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</tfoot>
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

<!-- Modal -->
<div class="modal fade contact-modal" id="composeModal" tabindex="-1" role="dialog" aria-hidden="true">

  
  	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">
				Add Category
				</h4>
				<a href="javascript:void(0)" class="close" data-dismiss="modal" aria-label="Close">
				<i class="icon icon-close icon-fw icon-xl"></i> </a>
			</div>
		<div class="modal-body">
			<div class="row no-gutters">
				<div class="col-lg-12 order-lg-1">
					<form>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Category Name">
					</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal-footer justify-content-start">
			<a class="btn btn-primary" href="javascript:void(0)" data-dismiss="modal">
			<i class="icon icon-add icon-fw"></i> <span>Add Category</span> </a>
		</div>
		</div>
  	</div>
</div>


<?php echo $js_php;?>

</body>
</html>
