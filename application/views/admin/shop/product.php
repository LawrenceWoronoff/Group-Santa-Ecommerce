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
				<h1 class="dt-page__title">Products</h1>
			</div>
			<div class="col-sm-12 col-md-2 text-right">
				<a href="<?php echo base_url('admin/shop/product/add');?>" class="btn btn-shadow compose-btn btn-primary btn-block">
					<i class="icon icon-add icon-fw mr-2"></i>Add Product</a>
			</div>
			</div>
		</div>

        <!-- Grid -->
        <div class="row">

		<?php for($i = 0 ; $i < count($products); $i++):?>
          
          <div class="col-xl-3 col-md-4 col-sm-6 col-12">

            <!-- Card -->
            <div class="card dt-card__full-height dt-card__product-vertical">

             <!-- Card top image -->
             <img class="card-img-top" src="<?php echo base_url().$products[$i]['img'];?>" alt="<?php echo $products[$i]['name'];?>">
             <!-- /card top image -->


              <!-- Card Body -->
              <div class="card-body">

                <!-- Card Title-->
                <h2 class="card-title">Name : <?php echo $products[$i]['name'];?></h2>
				<h2 class="card-title"><small class="text-light-gray">Category : <?php echo $products[$i]['category_name'];?></small></h2>
                <!-- Card Title-->
				
				<div class="d-flex">
					<h4 class="mb-2 mr-3">Price : &#163;<?php echo $products[$i]['price'];?></h4>
				</div>
				<div class="d-flex">
					<h5 class="mb-2 mr-3 text-info">Status : <?php echo $products[$i]['is_trendy']=='0'?'Not trendy':'Trendy';?> / <?php echo $products[$i]['is_publish']=='0'?'Hide on store':'Show on store';?></h5>
				</div>
                <p class="mb-1 mt-1">Description</p>
				<p class="mb-1 overflow-2-line-hidden-text"><?php echo $products[$i]['description'];?></p>
              </div>
              
			  
			  <div class="card-footer">
			  	 <a class="btn btn-outline-light text-muted btn-sm mb-4" href="<?php echo base_url('admin/shop/product/edit/'.$products[$i]['id']);?>">Edit</a>
				 <a class="btn btn-danger btn-sm ml-1 mb-4" href="<?php echo base_url('admin/shop/product/delete/'.$products[$i]['id']);?>">Delete</a>
			  </div>
            </div>
          </div>
		<?php endfor;?>
        </div>
      </div>
		<footer class="dt-footer">
			Copyright Company Name © 2019
		</footer>
    </div>
  </main>
</div>

<?php echo $js_php;?>

</body>
</html>
