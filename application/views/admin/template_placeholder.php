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
