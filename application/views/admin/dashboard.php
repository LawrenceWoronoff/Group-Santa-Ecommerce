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

  <!-- Site Main -->
  <main class="dt-main">


	  <?php echo $sidebar_php;?>

    <!-- Site Content Wrapper -->
    <div class="dt-content-wrapper">
        <div class="dt-content">        
            <div class="row">
                <div class="col-md-3 col-6">
                    <!-- Card -->
                    <div class="dt-card text-white bg-cyan">
                        <div class="dt-card__body p-4">
                        <div class="media">
                            <i class="icon icon-inbuilt-apps icon-4x mr-2 align-self-center"></i>
                            <div class="media-body">
                            <h2 class="mb-1 h1 font-weight-semibold text-white"><?php echo $product_count;?></h2>
                            <p class="mb-0">Products</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="dt-card text-white bg-warning">
                        <div class="dt-card__body p-4">
                            <div class="media">
            
                                <i class="icon icon-all-contacts icon-4x mr-2 align-self-center"></i>
            
                                <!-- Media Body -->
                                <div class="media-body">
                                <h2 class="mb-1 h1 font-weight-semibold text-white"><?php echo $category_count;?></h2>
                                <p class="mb-0">Categories</p>
                                </div>
                                <!-- /media body -->
            
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="dt-card text-white bg-teal">
                        <div class="dt-card__body p-4">
                        <div class="media">
                            <i class="icon icon-team icon-4x mr-2 align-self-center"></i>
                            <div class="media-body">
                            <h2 class="mb-1 h1 font-weight-semibold text-white"><?php echo $group_count;?></h2>
                            <p class="mb-0">Groups</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="dt-card text-white bg-danger">
                        <div class="dt-card__body p-4">
                            <div class="media">
                                <i class="icon icon-user icon-4x mr-2 align-self-center"></i>
                                <div class="media-body">
                                <h2 class="mb-1 h1 font-weight-semibold text-white"><?php echo $user_count;?></h2>
                                <p class="mb-0">Users</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   

            <div class="row">
                
                <div class="col-12">

                    <!-- Card -->
                    <div class="dt-card pb-4">
        
                        <!-- Card Header -->
                        <div class="dt-card__header mb-3">
        
                        <!-- Card Heading -->
                        <div class="dt-card__heading">
                            <h3 class="dt-card__title">Recent Orders</h3>
                        </div>
                        <!-- /card heading -->
        
                        <!-- Card Tools -->
                        <div class="dt-card__tools">
                            <a href="javascript:void(0)" class="dt-card__more">See all orders <i class="icon icon-long-arrow-right icon-xl ml-2"></i></a>
                        </div>
                        <!-- /card tools -->
        
                        </div>
                        <!-- /card header -->
        
                        <!-- Card Body -->
                        <div class="dt-card__body p-0">
                        <table id="data-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Name</th>
											<th>Kind</th>
											<th>Products</th>
											<th>Price</th>
											<th>Status</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php for($i=0;$i<count($order_list);$i++):?>
										<tr class="gradeX">
											<td><?php echo $i+1;?></td>
											<td><?php echo $order_list[$i]['user_name'];?></td>
											<td>
												<?php if($order_list[$i]['is_group_order'] == 1):?>
													<span class="badge badge-pill badge-primary mb-1 mr-1">Group</span>
												<?php else:?>
													<span class="badge badge-pill badge-warning mb-1 mr-1">Individual</span>
												<?php endif;?>
											</td>
											<td><?php echo $order_list[$i]['items_count'];?></td>
											<td><?php echo $order_list[$i]['total_price'];?>(&#163;)</td>
											<td>
												<?php if($order_list[$i]['checkout_status'] == 1):?>
													<span class="badge badge-pill badge-primary mb-1 mr-1">Completed</span>
												<?php else:?>
													<span class="badge badge-pill badge-danger mb-1 mr-1">Pending</span>
												<?php endif;?>
											</td>
											<td><?php echo $order_list[$i]['created_at'];?></td>
											<td><a href="<?php echo base_url('admin/shop/order/'.$order_list[$i]['uniq_id']);?>" class="btn btn-primary mr-2 mb-2 text-white">Detail</a></td>
										</tr>
										<?php endfor;?>
									</tbody>
									
								</table>
                        </div>
                    </div>
                </div>
            </div>
        <div class="row">
        
            <!-- Grid Item -->
            <div class="col-md-4">
            
                <!-- Card -->
                <div class="dt-card">
                    
                    <!-- Card Body -->
                    <div class="dt-card__body">
                        
                        <h5 class="text-uppercase mb-3">Total Revenue</h5>
                        
                        <!-- Grid -->
                        <div class="row no-gutters">
        
                        <!-- Grid Item -->
                        <div class="col-xl-5">
                            <h2 class="mb-1 display-3 font-weight-medium">$2,167</h2>
                            <p class="mb-0 text-light-gray">YTD revenue</p>
                        </div>
                        <!-- /grid item -->
        
                        <!-- Grid Item -->
                        <div class="col-xl-7">
        
                            <!-- Chart Body -->
                            <div class="dt-chart__body">
                                <canvas id="chart-total-revenue" width="160" height="53"></canvas>
                            </div>
                            <!-- /chart body -->
        
                        </div>
                        <!-- /grid item -->
        
                        </div>
                        <!-- /grid -->
                        
                    </div>
                    <!-- /card Body -->
                    
                </div>
                <!-- /card -->
            
            </div>
            <!-- /grid item -->
            
            <!-- Grid Item -->
            <div class="col-md-4">
            
                <!-- Card -->
                <div class="dt-card">
                    
                    <!-- Card Body -->
                    <div class="dt-card__body">
                        
                        <h5 class="text-uppercase mb-3">Sale Products</h5>
                        
                        <ul class="dt-team-list">
                            <li class="mb-1"><img class="dt-avatar size-50" src="https://via.placeholder.com/150x150" alt="User"></li>
                            <li class="mb-1"><img class="dt-avatar size-50" src="https://via.placeholder.com/150x150" alt="User"></li>
                            <li class="mb-1"><img class="dt-avatar size-50" src="https://via.placeholder.com/150x150" alt="User"></li>
                            <li class="mb-1"><img class="dt-avatar size-50" src="https://via.placeholder.com/150x150" alt="User"></li>
                        </ul>
                        
                    </div>
                    <!-- /card Body -->
                    
                </div>
                <!-- /card -->
            
            </div>
            <!-- /grid item -->
            
            <!-- Grid Item -->
            <div class="col-md-4">
            
                <!-- Card -->
                <div class="dt-card overflow-hidden">
                    
                    <!-- Card Body -->
                    <div class="dt-card__body">
                        
                        <h5 class="text-uppercase mb-3">Growth</h5>
                        
                        <!-- Grid -->
                        <div class="row no-gutters">
        
                        <!-- Grid Item -->
                        <div class="col-xl-5">
                            <h2 class="mb-0 display-3 font-weight-medium text-success">37% <i class="icon icon-xl icon-menu-up"></i></h2>
                            <p class="mb-0 text-light-gray">This year</p>
                        </div>
                        <!-- /grid item -->
        
                        <!-- Grid Item -->
                        <div class="col-xl-7">
        
                            <!-- Chart Body -->
                            <div class="dt-chart__body mb-n6 mr-n6">
                                <canvas width="187" height="75" id="chart-growth" data-shadow="yes" data-type="line"></canvas>
                            </div>
                            <!-- /chart body -->
        
                        </div>
                        <!-- /grid item -->
        
                        </div>
                        <!-- /grid -->
                        
                    </div>
                    <!-- /card Body -->
                    
                </div>
                <!-- /card -->
            
            </div>
            <!-- /grid item -->
            
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
<!-- /root -->
<?php echo $js_php;?>

</body>
</html>
