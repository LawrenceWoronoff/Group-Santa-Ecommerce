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
						<li class="active">Change Password</li>
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
          <li><a href="<?php echo base_url('user/change_pass');?>" class="active">Change Password</a></li>
          <li><a href="<?php echo base_url('user/profile');?>">My Profile</a></li>
        </ul>
        <div class="dashboard-wrapper dashboard-user-profile">
        <?php if($this->session->flashdata('register_fail')):?>
          <div class="alert alert-danger">
            <?php echo $this->session->flashdata('fail_msg');?>
          </div>
          <?php endif;?>
          <?php if($this->session->flashdata('change_fail')):?>
          <div class="alert alert-danger">
            <?php echo $this->session->flashdata('fail_msg');?>
          </div>
          <?php endif;?>
          <?php if($this->session->flashdata('change_success')):?>
          <div class="alert alert-success alert-common alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="tf-ion-thumbsup"></i><span>Well done!</span> You succesfully change password.
          </div>
          <?php endif;?>
        <?php echo form_open(base_url('user/do_change_pass'), array('class' => 'checkout-form'));?>
            <!-- <form class="checkout-form"> -->
                
                <div class="form-group">
                    <label for="new_pass">Password</label>
                    <input type="password" class="form-control" id="new_pass"  name="new_password" require placeholder="New password">
                </div>
                <div class="form-group">
                    <label for="confirm_pass">Confirm</label>
                    <input type="password" class="form-control" id="confirm_pass" name="confirm_password" require placeholder="Confirm password">
                </div>
                <div class="text-center"> 
                    <button type="submit" class="btn btn-main text-center">Change</button>
                </div>
            <!-- </form> -->
            <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php echo $view_footer;?>
  </body>
  </html>