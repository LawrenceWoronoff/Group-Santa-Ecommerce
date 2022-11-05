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
					<h1 class="page-name">My Groups</h1>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('user/group/view_my_group');?>">Groups</a></li>
						<li class="active">List</li>
					</ol>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
			
				<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Group Name</th>
									<th>Group Budget</th>
									<th>Date</th>
									<th>Total Member</th>
									<th>Membership</th>
									<th>View</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php for($i = 0 ; $i < count($groups); $i++):?>
								<tr>
									<td><?php echo $groups[$i]['group_name'];?></td>
									<td>&#163;<?php echo $groups[$i]['budget'];?></td>
									<td><?php echo $groups[$i]['created_at'];?></td>
									<td><?php echo $groups[$i]['member_count'];?></td>
									<?php if($groups[$i]['is_my_group']):?>
									<td><span class="label label-danger">Leader</span></td>
									<?php else:?>
									<td><span class="label label-primary">Member</span></td>
									<?php endif;?>
									<td>
										<a href="<?php echo base_url('user/group/view_group_detail/').$groups[$i]['id'];?>" class="btn btn-default">View Detail</a>
									</td>
									<td>
									<?php if($groups[$i]['is_my_group']):?>
										<!-- <a href="<?php echo base_url('user/group/view_group_detail/').$groups[$i]['id'];?>" class="btn btn-danger">Clone Group</a> -->
									<?php else:?>
										<?php if($groups[$i]['accepted'] == '0'):?>
											<a href="<?php echo base_url('user/group/accept/').$groups[$i]['id'];?>" class="btn btn-danger">Accept</a>
										<?php else:?>
											<span class="label label-primary">Accepted</span>
										<?php endif;?>

									<?php endif;?>
									</td>
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

