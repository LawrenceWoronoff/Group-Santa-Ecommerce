<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Wieldy - A fully responsive, HTML5 based admin template">
	<meta name="keywords" content="Responsive, HTML5, admin theme, business, professional, jQuery, web design, CSS3, sass">
	<title>Wieldy - Admin Dashboard</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/favicon.ico');?>" type="image/x-icon">	
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/node_modules/flag-icon-css/css/flag-icon.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/vendors/gaxon-icon/style.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/node_modules/perfect-scrollbar/css/perfect-scrollbar.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/lite-style-1.min.css');?>">
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

  <!-- Site Main -->
  <main class="dt-main">
    <!-- Site Content Wrapper -->
    <div class="dt-content-wrapper">

      <!-- Site Content -->
      <div class="dt-content">

        <!-- Login Container -->
 		 <div class="dt-login--container">

			<!-- Login Content -->
			<div class="dt-login__content-wrapper">
		
				<!-- Login Content Inner -->
				<div class="dt-login__content-inner">
				
				  <div class="text-center mb-8">
				  	 <h1>Sign In</h1>
				  </div>
				  <?php echo form_open('admin/do_login');?>
					<?php if($this->session->flashdata('login_failed')):?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?php echo $this->session->flashdata('fail_msg');?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<?php endif;?>
					
				  <form action="<?php echo base_url('admin/do_login');?>" method="post">
					<div class="form-group">
					  <label class="sr-only">Email address</label>
					  <input type="email" class="form-control" id="email" name="email" required aria-describedby="email" placeholder="Enter email">
					</div>
					
					<div class="form-group">
					  <label class="sr-only">Password</label>
					  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
					</div>
					
					<!-- <div class="custom-control custom-checkbox mt-9 mb-8">
					  <input class="custom-control-input" type="checkbox" id="checkbox-1" checked="checked">
					  <label class="custom-control-label" for="checkbox-1">Remember me <a href="page-forgot-password.html">Forgot password</a></label>
					</div> -->
					
					<div class="form-group text-center">
					  <button type="submit" class="btn btn-primary">Log in</button>
					</span>
					</div>
				  <?php echo form_close();?>
				</div>
			</div>
		  </div>
      </div>
		<!-- Footer -->
		<?php echo $footer;?>
		<!-- /footer -->

    </div>
    <!-- /site content wrapper -->

	  
  </main>
  <!-- /site main -->
  
</div>
<!-- /root -->

<!-- Optional JavaScript -->
<script src="<?php echo base_url('assets/admin/node_modules/jquery/dist/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/admin/node_modules/moment/moment.js');?>"></script>
<script src="<?php echo base_url('assets/admin/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js');?>"></script>
<!-- Perfect Scrollbar jQuery -->
<script src="<?php echo base_url('assets/admin/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js');?>"></script>
<!-- /perfect scrollbar jQuery -->

<!-- masonry script -->
<script src="<?php echo base_url('assets/admin/node_modules/masonry-layout/dist/masonry.pkgd.min.js');?>"></script>
<script src="<?php echo base_url('assets/admin/node_modules/sweetalert2/dist/sweetalert2.js');?>"></script>

<!-- Custom JavaScript -->
<script src="<?php echo base_url('assets/admin/js/script.js');?>"></script>

</body>
</html>
