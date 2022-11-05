<!-- Start Top Header Bar -->
<section class="top-header">
   <div class="container">
       <div class="row">
           <div class="col-md-4 col-xs-12 col-sm-4">
               <div class="contact-number">
                   <i class="tf-ion-ios-telephone"></i>
                   <span>0129- 12323-123123</span>
               </div>
           </div>
           <div class="col-md-4 col-xs-12 col-sm-4">
               <!-- Site Logo -->
               <div class="logo text-center">
                   <a href="<?php echo base_url('store');?>">
                       <!-- replace logo here -->
                       <img style="margin-top: 0px" width="135px" height="30px" src = "<?php echo base_url('assets/front/images/logoimg.png');?>" alt="logoimage" />
                   </a>
               </div>
           </div>
           <div class="col-md-4 col-xs-12 col-sm-4">
               <ul class="top-menu text-right list-inline" id="cart_dropdown">
                   <li class="dropdown cart-nav dropdown-slide">
                       <a href="#!" id="" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                        <i class="tf-ion-android-cart"></i>Cart</a>
                        <div class="dropdown-menu cart-dropdown">
                            
                        </div>
                   </li>
                   <?php if(!$this->session->userdata(IS_LOGGED_IN)):?>
                   <li class="dropdown dropdown-slide">
                       <a href="<?php echo base_url('user/login');?>" class="dropdown-toggle"> Log In</a>
                   </li>
                   <?php endif;?>
                   <?php if(!$this->session->userdata(IS_LOGGED_IN)):?>
                   <li class="dropdown dropdown-slide">
                       <a href="<?php echo base_url('user/register');?>" class="dropdown-toggle"> Register </a>
                   </li>
                   <?php endif;?>
                   <?php if($this->session->userdata(IS_LOGGED_IN)):?>
                   <li class="dropdown dropdown-slide">
                       <a href="<?php echo base_url('user/log_out');?>" class="dropdown-toggle"> Logout </a>
                   </li>
                    <?php endif;?>
               </ul>
           </div>
       </div>
   </div>
</section>