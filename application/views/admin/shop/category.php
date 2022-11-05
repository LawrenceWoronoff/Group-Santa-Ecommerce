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
					<h1 class="dt-page__title">Categories</h1>
				</div>
				<div class="col-sm-12 col-md-2 text-right">
					<a href="javascript:void(0)" class="btn btn-shadow compose-btn btn-primary btn-block"
                       data-toggle="modal" data-target="#createModal">
                      <i class="icon icon-add icon-fw mr-2"></i>Add Category</a>
				</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12">

					<div class="alert alert-danger" role="alert">
						When you delete the category, the products which belongs to the category will be deleted together.
					</div>

					<div class="dt-card">
						<div class="dt-card__body">
							<div class="table-responsive">
								<table id="data-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Name</th>
											<th>Products</th>
											<th>Created On</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php for($i=0 ; $i<count($category);$i++):?>
										<tr class="gradeX">
											<td><?php echo $i+1;?></td>
											<td><?php echo $category[$i]['name'];?></td>
											<td><span class="badge badge-pill badge-primary mb-1 mr-1"><?php echo $category[$i]['products_count'];?></span></td>
											<td><?php echo $category[$i]['created_at'];?></td>
											<td>
												<button type="button" onclick="onClickOpenEditDlg(<?php echo $category[$i]['id'];?>, <?php echo "'".$category[$i]['name']."'";?>)" class="btn btn-success mr-2 mb-2 text-white">Edit</button>
												<button type="button" onclick="onClickDeleteDlg(<?php echo $category[$i]['id'];?>, <?php echo "'".$category[$i]['name']."'";?>)" class="btn btn-danger mr-2 mb-2 text-white">Delete</button>
												
											</td>
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

<!-- Modal -->
<div class="modal fade contact-modal" id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
  	<div class="modal-dialog modal-lg" role="document">
		<form action="<?php echo base_url('admin/shop/category/do_create');?>" method="post">
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
						<div class="form-group">
							<input type="text" name="category_name" class="form-control" placeholder="Category Name" required>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer justify-content-start">
				<button type="submit" class="btn btn-primary">
				<i class="icon icon-add icon-fw"></i> <span>Add</span> </button>
			</div>
		</div>
		</form>
  	</div>
</div>


<div class="modal fade contact-modal" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
	  <form action="<?php echo base_url('admin/shop/category/do_update');?>" method="post">
	  <div class="modal-content">
		  <div class="modal-header">
			  <h4 class="modal-title">
			  Edit Category
			  </h4>
			  <a href="javascript:void(0)" class="close" data-dismiss="modal" aria-label="Close">
			  <i class="icon icon-close icon-fw icon-xl"></i> </a>
		  </div>
		  <div class="modal-body">
			  <div class="row no-gutters">
				  <div class="col-lg-12 order-lg-1">
					  <div class="form-group">
						<input type="hidden" name="category_id" id="category_id">
						<input type="text" name="category_name" id="category_name" class="form-control" placeholder="Category Name" required>
					  </div>
				  </div>
			  </div>
		  </div>
		  <div class="modal-footer justify-content-start">
			  <button type="submit" class="btn btn-primary">Update</button>
		  </div>
	  </div>
	  </form>
	</div>
</div>

<div class="modal fade contact-modal" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
	  <form action="<?php echo base_url('admin/shop/category/do_delete');?>" method="post">
	  <div class="modal-content">
		  <div class="modal-header">
			  <h4 class="modal-title">
			  Delete Category
			  </h4>
			  <a href="javascript:void(0)" class="close" data-dismiss="modal" aria-label="Close">
			  <i class="icon icon-close icon-fw icon-xl"></i> </a>
		  </div>
		  <div class="modal-body">
			  <div class="row no-gutters">
				  <div class="col-lg-12 order-lg-1">
					  <div class="form-group">
						<input type="hidden" name="category_id_delete" id="category_id_delete">
						Would you like to delete the <span class="text-danger" id="category_name_delete"></span>?
					  </div>
				  </div>
			  </div>
		  </div>
		  <div class="modal-footer justify-content-start">
			  <button type="submit" class="btn btn-primary">Delete</button>
		  </div>
	  </div>
	  </form>
	</div>
</div>


<?php echo $js_php;?>
<script>
	function onClickOpenEditDlg(category_id, category_name)
	{
		$('#category_name').val(category_name);
		$('#category_id').val(category_id);
		$('#editModal').modal();
	}

	function onClickDeleteDlg(category_id, category_name)
	{
		$('#category_name_delete').html(category_name);
		$('#category_id_delete').val(category_id);
		$('#deleteModal').modal();
	}
</script>
</body>
</html>
