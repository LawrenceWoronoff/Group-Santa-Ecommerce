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
          <li><a href="dashboard.html">Dashboard</a></li>
          <li><a href="order.html">Orders</a></li>
          <li><a href="address.html">Address</a></li>
          <li><a class="active"  href="profile-details.html">Profile Details</a></li>
        </ul>
        <div class="dashboard-wrapper dashboard-user-profile">
          <div class="media">
            <div class="pull-left text-center" href="#!">
              <img class="media-object user-img" src="images/avater.jpg" alt="Image">
              <a href="#x" class="btn btn-transparent mt-20">Change Image</a>
            </div>
            <div class="media-body">
              <ul class="user-profile-list">
                <li><span>Full Name:</span>Johanna Doe</li>
                <li><span>Country:</span>USA</li>
                <li><span>Email:</span>mail@gmail.com</li>
                <li><span>Phone:</span>+880123123</li>
                <li><span>Date of Birth:</span>Dec , 22 ,1991</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php echo $view_footer;?>

<script>
    $(document).ready(function () {
        $('.repeater').repeater({
            initEmpty: true,
            defaultValues: {
                
            },
            show: function () {
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function (setIndexes) {
                // $dragAndDrop.on('drop', setIndexes);
            },
            isFirstItemUndeletable: true
        })
    });
</script>

 </body>
 </html>

