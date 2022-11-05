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
          <li><a href="<?php echo base_url('user/order_history');?>">History</a></li>
          <li><a href="<?php echo base_url('user/change_pass');?>">Change Password</a></li>
          <li><a href="<?php echo base_url('user/profile');?>" class="active">My Profile</a></li>
        </ul>
        <div class="dashboard-wrapper dashboard-user-profile">
        
            <form class="checkout-form">
                <div class="checkout-country-code clearfix">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $user_data['first_name'];?>">
                    </div>
                    <div class="form-group" >
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"  value="<?php echo $user_data['last_name'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="user_email">Email</label>
                    <input type="text" class="form-control" id="user_email" placeholder="" value="<?php echo $user_data['email'];?>">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-main text-center">Submit</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php echo $view_footer;?>
    
  </body>
  </html>