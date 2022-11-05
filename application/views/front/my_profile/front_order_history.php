<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<?php echo $view_header;?>

<body id="body">

<?php echo $top_header;?>


<!-- Main Menu Section -->
<?php echo $top_menu;?>


<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Dashboard</h1>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('store');?>">Home</a></li>
						<li class="active">Order History</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="user-dashboard page-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="list-inline dashboard-menu text-center">
		  <li><a class="active" href="<?php echo base_url('user/order_history');?>">History</a></li>
          <li><a href="<?php echo base_url('user/change_pass');?>">Change Password</a></li>
          <li><a href="<?php echo base_url('user/profile');?>">My Profile</a></li>
        </ul>
        <div class="dashboard-wrapper dashboard-user-profile">
          <div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Order ID</th>
									<th>Date</th>
									<th>Items</th>
									<th>Price</th>
									<th>Group Order</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
                				<?php for($i=0;$i<count($orders);$i++):?>
								<tr>
									<td><?php echo $orders[$i]['uniq_id'];?></td>
									<td><?php echo $orders[$i]['created_at'];?></td>
									<td><?php echo $orders[$i]['items_count'];?></td>
									<td>&#163;<?php echo $orders[$i]['total_price'];?></td>
									<?php if($orders[$i]['is_group_order'] == '1'):?>
										<td><span class="label label-danger">Yes</span></td>
									<?php else:?>
										<td><span class="label label-warning">No</span></td>
									<?php endif;?>
									<?php if($orders[$i]['checkout_status'] == '1'):?>
										<td><span class="label label-primary">Completed</span></td>
									<?php else:?>
										<td><span class="label label-info">Processing</span></td>
									<?php endif;?>
									<td><a href="<?php echo base_url('user/order_history/detail/'.$orders[$i]['id']);?>" class="btn btn-default">View</a></td>
								</tr>
								<?php endfor;?>
							</tbody>
						</table>
					</div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php echo $view_footer;?>
  </body>
  </html>