<!-- Meta tags -->
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Group Santa E-commerce">
	<meta name="keywords" content="Responsive, HTML5, business, professional, jQuery, web design, CSS3, sass">
	<!-- /meta tags -->
	<title>Admin Dashboard</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico');?>" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/node_modules/flag-icon-css/css/flag-icon.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/vendors/gaxon-icon/style.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/node_modules/perfect-scrollbar/css/perfect-scrollbar.css');?>">
    <?php for($i=0;$i< count($additional_css);$i++):?>
        <link rel="stylesheet" href="<?php echo base_url().$additional_css[$i];?>">
    <?php endfor?>
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/lite-style-1.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/css/custom.css');?>">
  