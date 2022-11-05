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
					<h1 class="page-name">Checkout</h1>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('store');?>">Home</a></li>
						<li class="active">checkout</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="page-wrapper">
   <div class="checkout shopping">
      <div class="container">
         <div class="row">
            <div class="col-md-8">
            <?php if($this->session->flashdata(CHECKOUT_FAIL)):?>
               <div class="alert alert-danger">
               <?php echo $this->session->flashdata(CHECKOUT_FAIL_MSG);?>
               </div>
            <?php endif;?>
            <?php echo form_open(base_url('user/do_check_out'), array('class' => 'checkout-form'));?>
               <div class="block billing-details">
                  <h4 class="widget-title">Billing Details</h4>
                  <?php $me = $this->session->userdata(USER_INFO);?>
                  
                  
                     <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control" name="full_name" readonly required id="full_name" value="<?php echo $me['first_name']. ' '. $me['last_name'];?>">
                     </div>
                     <div class="form-group">
                        <label for="user_address">Address</label>
                        <input type="text" class="form-control" id="user_address" required name="full_address" value=<?php echo $me['addr'];?>>
                     </div>
                     <div class="checkout-country-code clearfix">
                        <div class="form-group">
                           <label for="user_post_code">Zip Code</label>
                           <input type="text" class="form-control" id="user_post_code" required name="zipcode" value="<?php echo $me['zip'];?>">
                        </div>
                        <div class="form-group" >
                           <label for="user_city">City</label>
                           <input type="text" class="form-control" id="user_city" name="city" required value="<?php echo $me['city'];?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="user_country">Country</label>
                        <input type="text" class="form-control" id="user_country" name="country" required value="<?php echo $me['country'];?>">
                     </div>
                  
               </div>
               <div class="block">
                  <h4 class="widget-title">Payment Method</h4>
                  <p>Credit Cart Details (Secure payment)</p>
                  <div class="checkout-product-details">
                     <div class="payment">
                        <div class="card-details">
                           <form  class="checkout-form">
                              <div class="form-group">
                                 <label for="card-number">Card Number <span class="required">*</span></label>
                                 <input  id="card-number" name="card_number" class="form-control" required  type="tel" placeholder="•••• •••• •••• ••••">
                              </div>
                              <div class="checkout-country-code clearfix">
                                 <div class="form-group">
                                    <label for="exp_month">Expiry(MM)*</label>
                                    <input type="text" class="form-control" required id="exp_month" maxlength="2" name="exp_month" placeholder="Enter 01 or 12">
                                 </div>
                                 <div class="form-group" >
                                    <label for="exp_year">Expiry(YY)*</label>
                                    <input type="text" class="form-control" required id="exp_year" maxlength="2" name="exp_year" placeholder="Enter 01 to 99">
                                 </div>
                              </div>
                              <div class="form-group half-width padding-left">
                                 <label for="card_cvc">Card Code <span class="required">*</span></label>
                                 <input id="card_cvc" class="form-control" name="card_cvc"  type="tel" required maxlength="4" placeholder="CVC" >
                              </div>
                              <?php if(count($cart_data) > 0):?>
                              <button type="submit" class="btn btn-main mt-20">Place Order</a >
                              <?php endif;?>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            </div>
            <div class="col-md-4">
               <div class="product-checkout-details">
                  <div class="block">
                     <h4 class="widget-title">Order Summary</h4>
                     <?php if(count($cart_data) == 0):?>
                        <div class="media product-card">
                           No production yet.Go <a href="<?php echo base_url('store/products');?>">Shopping!</a>
                        </div>
                     <?php else:?>
                        <?php 
                           for($i = 0 ; $i < count($cart_data); $i++):
                        ?>
                           <div class="media product-card">
                              <a class="pull-left" href="product-single.html">
                                 <img class="media-object" src="<?php echo base_url().$cart_data[$i]['img'];?>" alt="Image" />
                              </a>
                              <div class="media-body">
                                 <h4 class="media-heading"><a href="product-single.html"><?php echo $cart_data[$i]['name'];?></a></h4>
                                 <p class="price"><?php echo $cart_data[$i]['count'];?> x &#163;<?php echo $cart_data[$i]['price'];?></p>
                                 
                              </div>
                           </div>
                        <?php endfor;?>
                     <?php endif;?>
                     <div class="discount-code">
                        <p>Group check out ? <a href="<?php echo base_url('user/group_check_out');?>">click here</a></p>
                     </div>
                     <ul class="summary-prices">
                        <li>
                           <span>Subtotal:</span>
                           <span class="price">&#163;<?php echo $total_price;?></span>
                        </li>
                        <li>
                           <span>Shipping:</span>
                           <span>Free</span>
                        </li>
                     </ul>
                     <div class="summary-total">
                        <span>Total</span>
                        <span>&#163;<?php echo $total_price;?></span>
                     </div>
                     <div class="verified-icon">
                        <img src="<?php echo base_url('assets/front/images/shop/verified.png');?>">
                     </div>
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
