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
            <div class="dt-page__header">
				<div class="row">
                    <div class="col-sm-12 col-md-10">
                        <h1 class="dt-page__title">Change Admin Password</h1>
                    </div>
				</div>
			</div>
            <div class="dt-card">
                <div class="dt-card__body">
                    <div class="dt-login__content-inner">
                        <form action="<?php echo base_url('admin/do_reset_password');?>" method="post">
                            <?php if($this->session->flashdata('reset_password_failed')):?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo $this->session->flashdata('fail_msg');?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <?php endif;?>
                            <?php if($this->session->flashdata('reset_password_success')):?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo $this->session->flashdata('success_msg');?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <?php endif;?>
                            <div class="form-group">
                                <label class="sr-only">Old Password</label>
                                <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Old Password" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only">New Password</label>
                                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only">Old Password</label>
                                <input type="password" class="form-control" name="confirm_new_password" id="confirm_new_password" placeholder="Confirm New Password" required>
                            </div>
                            
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Reset Password</button>
                            </div>
                        <?php echo form_close();?>
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
<!-- /root -->
<?php echo $js_php;?>

</body>
</html>
