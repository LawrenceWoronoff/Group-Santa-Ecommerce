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



<section class="user-dashboard page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Group Manage</h1>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('user/group/view_my_group');?>">Groups</a></li>
						<li class="active"><?php echo $group_info['name'];?></li>
					</ol>
				</div>
			</div>
		</div>

		<div class="row">
		<div class="col-md-12">
				<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
						<table class="table">
							<h3>Group Detail Information</h3>
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

			<div class="col-md-12 mt-50">
				<div class="alert alert-success alert-common alert-solid" role="alert">
					You will buy present for <strong><?php echo $whom_name;?></strong>
				</div>
			</div>

			<?php if($is_owner):?>
			<div class="col-md-12">
				<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>User Name</th>
									<th>Email</th>
									<th>Accept status</th>
									<th>Order status</th>
								</tr>
							</thead>
							<tbody>
								<?php $all_ready = true;
								$hide_checkout = true;
								for($i = 0 ; $i < count($group_member_info); $i++){
									if($all_ready) 
									{
										$all_ready = $group_member_info[$i]['order_status'] == '1';
									}

									if($hide_checkout)
									{
										$hide_checkout = $group_member_info[$i]['checkout_status'] == '1';
									}
									?>
								<tr>
									<td><?php echo $group_member_info[$i]['first_name'].' '.$group_member_info[$i]['last_name'];?></td>
									<td><?php echo $group_member_info[$i]['email'];?></td>
									<?php if($group_member_info[$i]['accept_status'] == '1'):?>
										<td><span class="label label-primary">Accept</span></td>
									<?php elseif($group_member_info[$i]['accept_status'] == '0'):?>
										<td><span class="label label-info">No reply yet</span></td>
									<?php else:?>
										<td><span class="label label-danger">Reject</span></td>
									<?php endif;?>

									<?php if($group_member_info[$i]['order_status'] == '1'):?>
										<td><span class="label label-primary">Ordered</span></td>
									<?php else:?>
										<td><span class="label label-danger">Not ordered yet</span></td>
									<?php endif;?>
								</tr>
								<?php } ?>
							</tbody>
						</table>

						<?php if($hide_checkout && $all_ready):?>
						<div class="text-center">
							<a href="<?php echo base_url('user/do_group_check_out_by_admin').'/'.$group_info['id'];?>" class="btn btn-main"> Check out </a>
						</div>
						<?php endif;?>
					</div>
				</div>
			</div>
			<?php endif;?>
		</div>
	</div>
</section>


<?php echo $view_footer;?>

 </body>
 </html>

