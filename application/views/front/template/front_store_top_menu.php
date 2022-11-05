<section class="menu">
   <nav class="navbar navigation">
       <div class="container">
           <div class="navbar-header">
               <h2 class="menu-title">Main Menu</h2>
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                   aria-expanded="false" aria-controls="navbar">
                   <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </button>

           </div><!-- / .navbar-header -->

           <!-- Navbar Links -->
           <div id="navbar" class="navbar-collapse collapse text-center">
               <ul class="nav navbar-nav">
                   <li class="dropdown ">
                       <a href="<?php echo base_url('store');?>">Home</a>
                   </li>
                   <li class="dropdown ">
                       <a href="<?php echo base_url('store/products');?>">Products</a>
                   </li>
                   <li class="dropdown ">
                       <a href="<?php echo base_url('store/howitworks');?>">How it works</a>
                   </li>
                   <li class="dropdown ">
                       <a href="<?php echo base_url('store/faq');?>">FAQ</a>
                   </li>
                   <?php if($this->session->userdata(IS_LOGGED_IN)):?>
                   <li class="dropdown ">
                       <a href="<?php echo base_url('user/profile');?>">My Profile</a>
                   </li>
                   <?php endif;?>
                   <?php if($this->session->userdata(IS_LOGGED_IN)):?>
                   <li class="dropdown ">
                       <a href="<?php echo base_url('user/group/create');?>">Create Group</a>
                   </li>
                   <?php endif;?>
                   <?php if($this->session->userdata(IS_LOGGED_IN)):?>
                   <li class="dropdown ">
                       <a href="<?php echo base_url('user/group/view_my_group');?>">My Group</a>
                   </li>
                   <?php endif;?>
                   <li class="dropdown ">
                       <a href="<?php echo base_url('user/contact_us');?>">Contact Us</a>
                   </li>
               </ul>
           </div>
       </div>
   </nav>
</section>