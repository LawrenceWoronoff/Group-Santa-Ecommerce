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
						<li><a href="<?php echo base_url('/store');?>">Home</a></li>
						<li class="active">My Profile</li>
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
          <div class="text-right">
            <a href="<?php echo base_url('user/order_history');?>" class="btn btn-main btn-round-full" style="margin-bottom:32px;"> Back To List</a>
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th class="">Item Name</th>
                  <th class="">Item Price</th>
                  <th class="">Count</th>
                  <th class="">Total Price</th>
                </tr>
              </thead>
              <tbody>
                <?php for($i=0;$i<count($orders);$i++):?>
                <tr class="">
                  <td class="">
                    <div class="product-info">
                      <img width="80" style="margin-right:12px;" src="<?php echo base_url().$orders[$i]['product_image'];?>" alt="" />
                      <a href="#!"><?php echo $orders[$i]['product_name'];?></a>
                    </div>
                  </td>
                  <td class="">&#163;<?php echo $orders[$i]['product_price'];?></td>
                  <td> <?php echo $orders[$i]['product_count'];?> </td>
                  <td class="">&#163;<?php echo $orders[$i]['product_count'] * $orders[$i]['product_price'];?></td>
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