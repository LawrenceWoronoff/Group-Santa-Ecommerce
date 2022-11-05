<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<?php echo $view_header;?>

<body id="body">

<?php echo $top_header;?>
<?php echo $top_menu;?>

<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Cart</h1>
					<ol class="breadcrumb">
						<li><a href="index.html">Home</a></li>
						<li class="active">cart</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>



<div class="page-wrapper">
  <div class="cart shopping">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="block">
            <div class="product-list">
              <?php echo form_open(base_url('user/do_update_cart'));?>
              <form method="post">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="">Item Name</th>
                      <th class="">Item Price</th>
                      <th class="">Count</th>
                      <th class="">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $cart_data = $this->session->userdata(USER_SESSION_CART_KEY);
                    for($i=0;$i<count($cart_data);$i++):?>
                    <tr class="">

                      <td class="">
                      <input type="hidden" name="product_id[]" value="<?php echo $cart_data[$i]['id'];?>">
                        <div class="product-info">
                          <img width="80" src="<?php echo base_url($cart_data[$i]['img']);?>" alt="" />
                          <a href="#!"><?php echo $cart_data[$i]['name'];?></a>
                        </div>
                      </td>
                      <td class="">&#163;<?php echo $cart_data[$i]['price'];?></td>
                      <td> 
                        <div class="single-product-details">
                            <div class="product-quantity">
                                <div class="product-quantity-slider">
                                    <input id="product-quantity" name="product-quantity[]" type="text" value="<?php echo $cart_data[$i]['count'];?>">
                                </div>
                            </div>       
                        </div>
                      </td>
                      <td class="">
                        <a class="product-remove" href="<?php echo base_url('user/do_remove_from_view/').$cart_data[$i]['id'];?>">Remove</a>
                      </td>
                    </tr>
                    <?php endfor;?>
                  </tbody>
                </table>
                
                <?php if($this->session->userdata(IS_LOGGED_IN)):?>
                <a href="<?php echo base_url('user/check_out');?>" class="btn btn-main pull-right">Checkout</a>
                <?php else:?>
                  <div class="alert alert-danger">
                    In order to check out the cart, you need to log in.
                  </div>
                  <a href="<?php echo base_url('user/login');?>" class="btn btn-main pull-right">Go To Login</a>
                <?php endif;?>
                <button  href="<?php echo base_url('user/do_update_cart');?>" style="margin-left:8px; margin-right:8px;" class="btn btn-main pull-right">Update Cart</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php echo $view_footer;?>

  </body>
  </html>
