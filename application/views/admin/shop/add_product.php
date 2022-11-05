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
    <!-- Site Content Wrapper -->
    <div class="dt-content-wrapper">

      <!-- Site Content -->
      <div class="dt-content">

	  	<div class="dt-page__header">
			<div class="row">
			<div class="col-sm-12 col-md-10">
				<h1 class="dt-page__title"> Add New Product</h1>
			</div>
			<div class="col-sm-12 col-md-2 text-right">
				<a href="<?php echo base_url('admin/shop/product');?>" class="btn btn-shadow btn-danger btn-block">
					Back To List</a>
			</div>
			</div>
		</div>

        <!-- Grid -->
        <div class="row">

		<div class="col-12">

            <!-- Card -->
            <div class="dt-card">
              <!-- Card Body -->
              <div class="dt-card__body">
                <!-- Form -->
                <?php echo form_open_multipart('admin/shop/product/do_add');?>
                  
					<div class="form-row mt-4">
						<label class="col-md-2 col-sm-3 text-sm-right mb-4 mb-sm-0 pt-2">Publish</label>

						<div class="col-md-4 col-sm-9">
							<div class="btn-group btn-group-toggle " data-toggle="buttons">
								<label class="btn btn-outline-primary"> <input type="radio" name="publish_option" value="1" checked> Publish</label>
								<label class="btn btn-outline-primary active"> <input type="radio" name="publish_option" value="0"> Hide on store</label>
							</div>
						</div>

						<label class="col-md-2 col-sm-3 text-sm-right pt-2">Is Trendy Product</label>

						<div class="col-md-4 col-sm-9">
							<div class="btn-group btn-group-toggle mr-2 mb-2" data-toggle="buttons">
								<label class="btn btn-outline-secondary"> <input type="radio" name="is_trendy" value="1"> Trendy </label>
								<label class="btn btn-outline-secondary active"> <input type="radio" name="is_trendy" value="0" checked> Not Trendy</label>
							</div>
						</div>
					</div>

					<hr class="border-dashed my-8">
					<div class="form-row">
						<label class="col-md-2 col-sm-3 col-form-label text-sm-right" for="simple-select">Category</label>
						<div class="col-md-10 col-sm-9">
						<select class="form-control" name="category">
							<?php for($i=0;$i<count($category);$i++):?>
							<option value="<?php echo $category[$i]['id'];?>"><?php echo $category[$i]['name'].'('.$category[$i]['products_count'].')';?></option>
							<?php endfor;?>
						</select>
						</div>
					</div>
					<hr class="border-dashed my-8">
                  	<div class="form-row">
						<label class="col-md-2 col-sm-3 col-form-label text-sm-right">Name</label>

						<div class="col-md-10 col-sm-9">
						<input type="text" name="name" required class="form-control" placeholder="Enter product name">
						</div>
					</div>
					<div class="form-row mt-4">
						<label class="col-md-2 col-sm-3 col-form-label text-sm-right">Price</label>

						<div class="col-md-10 col-sm-9">
						<input type="number" name="price" required class="form-control" placeholder="Enter product price">
						</div>
					</div>
                  
				  
                  <hr class="border-dashed my-8">
                  <div class="form-row">
                    <label class="col-md-2 col-sm-3 col-form-label text-sm-right" for="text-area-1">Product Description</label>

                    <div class="col-md-10 col-sm-9">
                      <textarea class="form-control" name="description" id="text-area-1" rows="3" placeholder="Product description"></textarea>
                    </div>
                  </div>
                  <hr class="border-dashed my-8">
                  <div class="form-row">
                    <label class="col-md-2 col-sm-3 col-form-label text-sm-right" for="file-field">Product Image</label>
                    <div class="col-md-10 col-sm-9">
                      <div class="custom-file">
                        <input type="file" required class="custom-file-input" name="image_file">
                        <label class="custom-file-label" for="file-field">Choose file...</label>
                      </div>
                    </div>
					
                  </div>
				  <div class="form-row mt-4 ">
					<div class="offset-md-2 offset-sm-3 col-md-10 col-sm-9 text-right">
						<button type="submit" class="btn btn-primary btn-block"> Submit </button>
					</div>
					
				  </div>
                <?php echo form_close();?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /site content -->

		<!-- Footer -->
		<footer class="dt-footer">
			Copyright Company Name © 2019
		</footer>
		<!-- /footer -->

    </div>
    <!-- /site content wrapper -->
  </main>
</div>

<?php echo $js_php;?>
<script>
	$(document).ready(() => {
		<?php if($this->session->flashdata('product_add_fail')):?>
		setTimeout(()=>{
			showErrorToast(<?php echo $this->session->flashdata('product_add_fail_msg');?>);
		}, 500);
		<?php endif;?>
	});
	
</script>
</body>
</html>
